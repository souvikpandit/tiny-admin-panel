<?php

namespace App\Http\Controllers\admin\blog_management;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\Author;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $authors = Author::all()->sortByDesc('created_at');
        
        return view('admin.blog_management.author.all',compact('authors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blog_management.author.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $author = new Author;
        
        $author->image = $request->image;        
        $author->name = $request->name;
        $author->slug = $request->slug;
        $author->designation = $request->designation;
        $author->status = $request->status;

        $author->save();
        return redirect(route('author.index'))->with('message', 'Successfully Added!');
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
        $author = Author::where('id',$id)->first();
        return view('admin.blog_management.author.edit',compact('author'));
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
        $author = Author::find($id);
        
        $author->image = $request->image;
        $author->name = $request->name;
        $author->slug = $request->slug;
        $author->designation = $request->designation;
        $author->status = $request->status;

        $author->save();
        return redirect(route('author.index'))->with('message', 'Successfully Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Author::where('id',$id)->delete();
        return redirect(route('author.index'))->with('msg', 'Successfully Deleted!');
    }

    public function alldelete(Request $request)
    {
        //return $request;
        $ids = $request->ids;
        Author::whereIn('id',explode(",",$ids))->delete();
        return response()->json(['success'=>"Author Deleted successfully."]);
    }
}
