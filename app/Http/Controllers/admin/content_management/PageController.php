<?php

namespace App\Http\Controllers\admin\content_management;

use App\Models\admin\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Post::where('post_type','page')->orderByDesc('created_at')->get();
        return view('admin.content_management.page.all',compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $all_pages = Post::where('post_type','page')->get();
        return view('admin.content_management.page.add',compact('all_pages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $all_pages = Post::where('post_type','page')->get();
        $page = Post::find($id);
        return view("admin.content_management.page.edit",[
            "title" => "Page | Edit",
            "post_id" => $id,
            "page" => $page,
            "all_pages" => $all_pages,
            "sub_div" => "",
            "option" => "",
        ]);
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
        //
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
        return redirect(route('page'))->with('msg', 'Successfully Deleted!');
    }

    public function alldelete(Request $request)
    {
        //return $request;
    $ids = $request->ids;
    Post::whereIn('id',explode(",",$ids))->delete();
    return response()->json(['success'=>"Page Deleted successfully."]);
    }

}
