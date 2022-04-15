<?php

namespace App\Http\Controllers\admin\blog_management;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::where('type','blog')->orderby('created_at','desc')->get();

        return view('admin.blog_management.category.all',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where([['status',1],['type','blog']])->get();

        return view('admin.blog_management.category.add',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = new Category;
        
        $category->image = $request->image;
        
        $category->parent_id = $request->parent_category;
        $category->name = $request->name;
        if($request->parent_slug){
        $slug = $request->parent_slug.'-'.$request->slug;
        }
        else{
            $slug = $request->slug;
        }
        $category->slug = $slug;
        $category->status = $request->status;

        $category->save();
        return redirect(route('category.index'))->with('message', 'Successfully Added!');
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
        $cat = Category::where('id',$id)->first();
        $categories = Category::where([['status',1],['type','blog']])->get();
        $parent_category = Category::where('parent_id',0)->get();
        return view('admin.blog_management.category.edit',compact('cat','categories','parent_category'));
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
        //return $request;
        $category = Category::find($id);
        // var_dump( (int) $request->parent_category);
        // var_dump($category->parent_id);

        $category->image = $request->image;
        
        $category->name = $request->name;
        
        if((int)$request->parent_category != $category->parent_id){
            //return "hi";
            if($request->parent_category == 0){
                $category->slug = slugify($request->name);
            }
            else{
                $parent_cat = Category::find($request->parent_category);
                $category->slug = $parent_cat->slug.'-'.slugify($request->name);
            }
            //$category->slug = $slug;
        }
        $category->parent_id = $request->parent_category;
        $category->status = $request->status;

        $category->save();
        return redirect(route('category.index'))->with('message', 'Successfully Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::where('id',$id)->delete();
        return redirect(route('category.index'))->with('msg', 'Successfully Deleted!');
    }

    public function alldelete(Request $request)
    {
        //return $request;
        $ids = $request->ids;
        Category::whereIn('id',explode(",",$ids))->delete();
        return response()->json(['success'=>"Category Deleted successfully."]);
    }
}
