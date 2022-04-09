<?php

namespace App\Models\admin;

use App\Models\admin\Post;
use App\Models\admin\PostMeta;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;
    /**
     * Get all of the post_meta for the Post
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    protected $fillable = ['sorting_no'];
    public function post_meta()
    {
        return $this->hasMany(PostMeta::class);
    }

    // Meta Key => Value Array
    public $metaValues = [];


    // _-_-_Static methods_-_-_

    static public function getAll($type,$orderbyKey = "id",$orderbyValue = "ASC"){
        $posts = Post::where("type",$type)->where("status","1")->orderby($orderbyKey,$orderbyValue)->get();
        return $posts;
    }

    // _-_-_Non Static methods_-_-_

    // Post Meta Values
    public function Meta($key = "" , $default = ""){
       
        if(!count($this->metaValues)){
            $this->metaValues = PostMeta::where("post_id",$this->id)->get()->pluck("meta_value","meta_key");
        }

        $value = $this->metaValues[$key] ?? $default;

     
        return $value;

    }

    // Meta Details
    public function getMetaDetails($flag = false){
       
        $value = json_decode($this->Meta("meta_content"));
    //return $this->Meta("meta_content");
        if(!empty($value)){

            if($value->metadefault){

                if($flag){
                    return $value;
                }

                return setting();
            }

            return $value;
        }

        if($flag){

            $array = array(
                "metadefault" => 1,
            );
         
            return json_decode(json_encode($array));
        }
       
        return setting();
    }

   

    // Formatted Content
    public function getFormattedContent($length){
        return strip_tags(html_entity_decode(substr($this->Meta("content"),0,$length)));
    }

    // Image
    public function getImage(){
       
        if(!empty($this->Meta("image"))){
            return $this->Meta("image");
        }else{
            return asset("/public/frontend/placeholders/placeholder.png");
        }

    }

    public function getBanner(){

        if(!empty($this->Meta("banner"))){
            return $this->Meta("banner");
        }else{
            return asset('/public/frontend/images/slide-1.jpg');
        }
    }

    // Status
    public function Status(){
   
        if ($this->status == 1) {
            return "<strong class='text-success'>Active</strong>";
        }elseif($this->status == 0){
            return "<strong class='text-danger'>Disabled</strong>";
        }
       
    }
   
    public function getPageBanner(){

        // return $this->Meta("banner");
       
        if($this->Meta("status") == 1){
            return '';
        }

        if(!empty($this->Meta("banner")) AND ($this->Meta("status") == null OR $this->Meta("status") == 0) ){
            return $this->Meta("banner");
        }else{
            return asset('/public/frontend/images/slide-1.jpg');
        }
    }
   
    public function getMobilePageBanner(){

        // return $this->Meta("banner");
       
        if($this->Meta("status") == 1){
            return '';
        }

        if(!empty($this->Meta("mobile_banner")) AND ($this->Meta("status") == null OR $this->Meta("status") == 0) ){
            return $this->Meta("mobile_banner");
        }else{
            return $this->getPageBanner();
        }
    }
   
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
