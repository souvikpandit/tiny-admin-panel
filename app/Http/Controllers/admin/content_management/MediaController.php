<?php

namespace App\Http\Controllers\admin\content_management;

use App\Models\admin\Media;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use phpDocumentor\Reflection\DocBlock\Tag;

class MediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medias = Media::where("status","1")->orderBy('id', 'DESC')->get();
        return view('admin.content_management.media.all', compact('medias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.content_management.media.add');
    }
    
    public function view($type = "single" ,$media_type = "image"){
        $all = Media::where("status","1")->where("type", $media_type ?? "image")->orderBy('id', 'DESC')->get();
        return view("admin.content_management.media.view",[
            "type" => $type,
            "media_type" => $media_type,
            "all"=> $all
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->hasFile('files'));
        
        if ($request->hasFile('files')) {
            //return $request;
            foreach ($request->file('files') as $image) {
                
                $realFileName = $image->getClientOriginalName();
                $time = time();
                $fileNameToStore = $time.$image->getClientOriginalName();

                $destinationPath = public_path('/storage/media');

                $extension = pathinfo($fileNameToStore, PATHINFO_EXTENSION);
                $fileNameToStore = slugify(pathinfo($fileNameToStore, PATHINFO_FILENAME));

                $fileNameToStore = $fileNameToStore.".".$extension;

                $image->move($destinationPath, $fileNameToStore);

                $media = new Media;
                $media->name = $fileNameToStore;
                $media->file_name = $realFileName;
                //$asset_path = asset("/public/media");
                $media->url = "media/$fileNameToStore";

                if($extension == 'mp4'){
                    $media->type = "video";
                }
                elseif($extension == 'pdf'){
                    $media->type = "pdf";
                }
                else{
                    $media->type = "image";
                }
                
                if($request->status){
                    $media->status = $request->status;
                }else{
                    $media->status = 1;
                }
                $media->save();
                }
        }     
        return redirect(route('media'))->with('message', 'Successfully Added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $tag = Tag::where('id',$id)->first();
        // return view('backend.tag.edit',compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //return $request;
        if($request->ajax()){
	       $media =	Media::find($request->input('pk'));
	       $media->alt_tag = $request->input('value');
	       $media->save();
	        return response()->json(['success' => true]);
    	}
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Media::where('id',$id)->delete();
        return redirect(route('media'))->with('msg', 'Successfully Deleted!');
    }
    public function alldelete(Request $request)
        {
            //return $request;
        $ids = $request->ids;
        Media::whereIn('id',explode(",",$ids))->delete();
        return response()->json(['success'=>"Media Deleted successfully."]);
        }
}

