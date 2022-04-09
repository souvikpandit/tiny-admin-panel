<?php

namespace App\Http\Controllers\admin\content_management;

use Illuminate\Http\Request;
use App\Models\admin\SiteSettings;
use App\Http\Controllers\Controller;

class SiteSettingController extends Controller
{

    public function index()
    {   
        $result = SiteSettings::where('slug','site_settings')->first();
        //return $result;
        return view('admin.content_management.site_setting.index',compact('result'));
    }

    public function store(Request $request)
    {
        
        $site_setting_meta = json_encode($request->Meta);
        SiteSettings::updateOrCreate(['slug' => $request->slug],['site_settings_meta' => $site_setting_meta, 'slug'=>$request->slug]);
        $result = SiteSettings::where('slug','site_settings')->first();
        //return $result;
        return view('admin.content_management.site_setting.index',compact('result'));
    }

}
