<?php

use App\Models\admin\Media;
use App\Models\admin\SiteSettings;
use Symfony\Component\HttpFoundation\Request;
use App\Models\admin\Post;
function settings(){
  //echo "Hi";
$site_setting = SiteSettings::where('slug','site_settings')->first();
//echo $site_setting;
$metas = $site_setting->site_settings_meta;
//echo $metas;
return json_decode($metas)->meta_content ?? "";
}
 function slugify($text){
     
  // replace non letter or digits by -
  $text = preg_replace('~[^\pL\d]+~u', '-', $text);

  // transliterate
  $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

  // remove unwanted characters
  $text = preg_replace('~[^-\w]+~', '', $text);

  // trim
  $text = trim($text, '-');

  // remove duplicate -
  $text = preg_replace('~-+~', '-', $text);

  // lowercase
  $text = strtolower($text);

  if (empty($text)) {
    return 'n-a';
  }

  return $text;
}

function GetImageUrl($id = NULL){
  $url = '';
    if ($id!=NULL) {
      $relative_path = Media::find($id)->url;
      if($relative_path){
        $url = 'storage/'.$relative_path;    
      }
      else{
        $url = 'storage/media/y9DpT.jpg';  
      }
    }
    else{
        $url = 'storage/media/y9DpT.jpg';
    }
    
    
    return $url;
}

function GetImageAlt($id = NULL){
  $alt = '';
    if ($id!=NULL) {
      $alt = App\Models\Media::find($id)->alt_tag;
    }
    if($alt==NULL){
        $alt = App\Models\Media::find($id)->name;
    }
    
    return $alt;
}

function notFound(){
        return response()
                ->view('errors.404');
    }
function GetFormatedDate($date = NULL){
  $formated_date = $date->format('d-M-Y');
  return $formated_date;
}


?>