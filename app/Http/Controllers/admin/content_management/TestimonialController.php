<?php

namespace App\Http\Controllers\admin\content_management;

use App\Models\admin\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimonials = Post::where('post_type','testimonial')->orderBy('sorting_no','ASC')->get();
        
        return view('admin.content_management.testimonial.all',compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sorting_no = Post::where('post_type','testimonial')->count();
        $sorting_no = $sorting_no+1;
        return view('admin.content_management.testimonial.add',compact('sorting_no'));
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
        $testimonial = Post::where([['id',$id],['post_type','testimonial']])->first();
        return view('admin.content_management.testimonial.edit', compact('testimonial'));
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
        return redirect(route('testimonial'))->with('msg', 'Successfully Deleted!');
    }
    public function alldelete(Request $request)
    {
        //return $request;
        $ids = $request->ids;
        Post::whereIn('id',explode(",",$ids))->delete();
        return response()->json(['success'=>"Testimonial Deleted successfully."]);
    }
    public function sortTestimonial(Request $request)
    {
        //return $request;
        $testimonials = Post::where('post_type','testimonial')->get();
        
        foreach ($testimonials as $testimonial) {
            foreach ($request->bnr_list as $bnr) {
                //return $bnr['id'];
                if ($bnr['id'] == $testimonial->id) {
                    $testimonial->update(['sorting_no' => $bnr['position']]);
                }
            }
        }
        return response('Update Successfully.', 200);
    }
}
