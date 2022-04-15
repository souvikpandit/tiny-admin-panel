<?php

namespace App\Http\Controllers\admin\blog_management;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\Tag;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::all()->sortByDesc('created_at');
        
        return view('admin.blog_management.tag.all',compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blog_management.tag.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tag = new Tag;
        $tag->name = $request->name;
        $tag->slug = $request->slug;
        $tag->image = $request->image;
        $tag->status = $request->status;

        $tag->save();
        return redirect(route('tag.index'))->with('message', 'Successfully Added!');
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
        $tag = Tag::where('id',$id)->first();
        return view('admin.blog_management.tag.edit',compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $tag = Tag::find($id);
        $tag->name = $request->name;
        $tag->slug = $request->slug;
        $tag->image = $request->image;
        $tag->status = $request->status;

        $tag->save();
        return redirect(route('tag.index'))->with('message', 'Successfully Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Tag::where('id',$id)->delete();
        return redirect(route('tag.index'))->with('msg', 'Successfully Deleted!');
    }

    public function alldelete(Request $request)
    {
        //return $request;
        $ids = $request->ids;
        Tag::whereIn('id',explode(",",$ids))->delete();
        return response()->json(['success'=>"Tag Deleted successfully."]);
    }
}
