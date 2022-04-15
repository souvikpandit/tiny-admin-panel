<?php

namespace App\Http\Controllers\admin\blog_management;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\Category;
use App\Models\admin\Tag;
use App\Models\admin\Author;
use App\Models\admin\Blog;
use App\Models\admin\Comment;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::all()->sortByDesc('created_at');
        
        $authors = Author::where('status',1)->get();

        return view('admin.blog_management.blog.all',compact('blogs','authors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where([['parent_id','!=',0],['type','blog'],['status',1]])->get();

        $tags = Tag::where('status',1)->get();

        $authors = Author::where('status',1)->get();        

        return view('admin.blog_management.blog.add',compact('categories','tags','authors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request;
        $blog = new Blog;

        $blog->image = $request->image;
        $blog->title = $request->title;
        $blog->author_id = $request->author;
        $blog->slug = $request->slug;
        $blog->short_desc = $request->short_desc;
        $blog->body = $request->body;
        $blog->status = $request->status;
        $blog->comment_status = $request->comment_status;
        $blog->show_image = $request->show_image;
        $blog->save();
        $blog->tags()->sync($request->tags);
        $blog->categories()->sync($request->categories);
        return redirect(route('blog.index'))->with('message', 'Successfully Added!');
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

    // public function showComment($id)
    // {
    //     $blog = Blog::find($id);
        
    //     return view('admin.blog_management.blog.comments',compact('blog'));
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog = Blog::with('tags','categories')->where('id',$id)->first();
        $tags = Tag::where('status',1)->get();
        $categories = Category::where([['parent_id','!=',0],['type','blog'],['status',1]])->get();
        $authors = Author::where('status',1)->get();

        return view('admin.blog_management.blog.edit',compact('blog','tags','categories','authors'));
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
        $blog = Blog::find($id);

        $blog->image = $request->image;
        $blog->title = $request->title;
        $blog->author_id = $request->author;
        $blog->slug = $request->slug;
        $blog->short_desc = $request->short_desc;
        $blog->body = $request->body;
        $blog->status = $request->status;
        $blog->show_image = $request->show_image;
        $blog->comment_status = $request->comment_status;
        $blog->tags()->sync($request->tags);
        $blog->categories()->sync($request->categories);

        $blog->save();
        
        return redirect(route('blog.index'))->with('message', 'Successfully Added!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Blog::where('id',$id)->delete();
        return redirect(route('blog.index'))->with('msg', 'Successfully Deleted!');
    }

    public function alldelete(Request $request)
    {
        //return $request;
        $ids = $request->ids;
        Blog::whereIn('id',explode(",",$ids))->delete();
        return response()->json(['success'=>"Blog Deleted successfully."]);
    }
}
