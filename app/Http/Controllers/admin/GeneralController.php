<?php

namespace App\Http\Controllers\admin;

use App\Models\admin\Post;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\admin\PostMeta;
use App\Models\admin\PageContent;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class GeneralController extends Controller
{
    public function store (Request $request){
        $input = $request->all();
        $options = $request->options;
        if($options["preview_request"]){
            return $request;
        }
        $post = new Post;
        DB::transaction(function() use($request,$input,&$post) {
        $post->name = $request->Post["name"];
        $post->slug = $request->Post["slug"];
        $post->post_type = $request->Post["post_type"];
        if(isset($request->Post["content"])){
            $post->content = $request->Post["content"];
        }
        if(isset($request->Post["image"])){
            $post->featured_image = $request->Post["image"];
        }
        if(isset($request->Post["sorting_no"])){
            $post->sorting_no = $request->Post["sorting_no"];
        }
        $post->status = $request->Post["status"];
        $post->save();
        if ($request->PostMeta) {
            foreach($request->PostMeta as $key => $value){         
                if (Arr::exists($input,'section_title')) {        
                    foreach($input['section_title'] as $section_key=>$sections){
                        $page_content = New PageContent;
                        $page_content->post_id = $post->id;
                        $page_content->section_name = $sections;
                        $section_title_slug = Str::slug($sections,'-');
                        $page_content->section_slug = $section_title_slug;
                        $page_content->description = $input['section_content'][$section_key];
                        $page_content->section_image = $input['section_image'][$section_key];
                        $page_content->status = 1;
                        $page_content->save();    
                    }
                }
            $postMeta = new PostMeta;
            $postMeta->post_id = $post->id;
            $postMeta->meta_key = $key;
            if(is_array($value)){
                $postMeta->meta_value = json_encode($value);
            }else{
                $postMeta->meta_value = $value;
            }
            $postMeta->save();

            }
        }
        
        });


       if($options["redirectTo"]){

           if($options["redirectTo"] == "edit"){

            $url = $options["redirectUrl"]."$post->id";

            return redirect($url)->with($options["msg_type"],$options["msg"]);

           }

           return redirect($options["redirectTo"])->with($options["msg_type"],$options["msg"]);
           
       }
         
   

       return redirect()->back()->with($options["msg_type"],$options["msg"]);

    }
    
    
    //@desc Updates Posts  
    //@route /admin/general/update/{id}
    public function update (Request $request ,$id){
    //return $request->existimages;
        //return $request;

        $options = $request->options;

        
        if($options["preview_request"]){
            return $request;
        }

        $post =  Post::find($id);
        $post->name = $request->Post["name"];
        $post->slug = $request->Post["slug"];
        $post->post_type = $request->Post["post_type"];
        if(isset($request->Post["content"])){
            $post->content = $request->Post["content"];
        }
        if(isset($request->Post["image"])){
            $post->image = $request->Post["image"];
        }
        
        if(isset($request->Post["sort"])){
            $post->sort = $request->Post["sort"];
        }
        $post->status = $request->Post["status"];
        
        
        $post->save();


        if ($request->PostMeta) {
            foreach($request->PostMeta as $key => $value){
            
                $postMeta =  PostMeta::where("post_id",$post->id)->where("meta_key",$key)->first();

                if(empty($postMeta)) $postMeta = new PostMeta;

                $postMeta->post_id = $post->id;
                $postMeta->meta_key = $key;

                if(is_array($value)){
                    $postMeta->meta_value = json_encode($value);
                }else{
                    $postMeta->meta_value = $value;
                }

                $postMeta->save();

            }
        }

        if($request->sub_image){
            $image_array = array();
            $sub_img = json_decode($request->sub_image);
            if($request->existimages){
            $notdeleted = json_decode($request->existimages);
            }
            else{
                $notdeleted = $sub_img;
            }
            
            foreach ($notdeleted as $key => $emg) {
                array_push($image_array,$emg);
            }
            
            if(!empty($sub_img)){
                foreach ($sub_img as $img) {
                    array_push($image_array,$img);
                } 
            }
            
            $gallery = json_encode($image_array);
            
    
            $postMeta = PostMeta::where("post_id",$id)->where("meta_key","gallery")->first();
            if(!$postMeta){
                $postMeta = new PostMeta; 
            }
            //return $postMeta;
            $postMeta->post_id = $id;
            $postMeta->meta_key = "gallery";
            $postMeta->meta_value = $gallery;
            $postMeta->save();
        }
        

        if($options["redirectTo"]){

           if($options["redirectTo"] == "edit"){

            $url = $options["redirectUrl"]."$post->id";

            return redirect($url)->with($options["msg_type"],$options["msg"]);

           }

           return redirect($options["redirectTo"])->with($options["msg_type"],$options["msg"]);
           
       }
        
    }
    public function sortElement(Request $request)
    {
        //return $request;
        $elements = Post::where('post_type',$request->post_type)->get();
        
        foreach ($elements as $element) {
            foreach ($request->sort_list as $sort) {
                //return $sort['id'];
                if ($sort['id'] == $element->id) {
                    $element->update(['sorting_no' => $sort['position']]);
                }
            }
        }
        return response('Update Successfully.', 200);
    }
}
