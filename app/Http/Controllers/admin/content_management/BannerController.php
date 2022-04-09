<?php

namespace App\Http\Controllers\admin\content_management;

use App\Models\admin\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners = Post::where('post_type','banner')->orderBy('sorting_no','ASC')->get();
        
        return view('admin.content_management.banner.all',compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {        
        $sorting_no = Post::where('post_type','banner')->count();
        $sorting_no = $sorting_no+1;
        return view('admin.content_management.banner.add',compact('sorting_no'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $banner = Post::where([['id',$id],['post_type','banner']])->first();
        return view('admin.content_management.banner.edit', compact('banner'));
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::where('id',$id)->delete();
        return redirect(route('banner'))->with('msg', 'Successfully Deleted!');
    }
    public function alldelete(Request $request)
    {
        //return $request;
        $ids = $request->ids;
        Post::whereIn('id',explode(",",$ids))->delete();
        return response()->json(['success'=>"Banner Deleted successfully."]);
    }
    
}
