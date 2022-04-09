<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;
    public function getImage(){
     
       if($this->type == 'mp4'){
          $asset_path = asset("media/placeholders/video_placeholder.png");
          $url = $asset_path;
       }
       elseif($this->type == 'pdf'){
          $asset_path = asset("media/placeholders/pdf_placeholder.png");
          $url = $asset_path;
       }
       else{
          $image_name = $this->name;
          $asset_path = asset("storage/media");
          $url = "$asset_path/$image_name";
       }
             
       return $url;
     
    }
}
