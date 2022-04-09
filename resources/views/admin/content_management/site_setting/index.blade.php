@extends('admin.layout.app')
@section('main-content')
@php
    $site_settings = json_decode($result->site_settings_meta);
    $meta_content = settings();
    //var_dump($meta_content->meta_title);
    //exit();
@endphp
<main role="main" class="main-content">
        <div class="container-fluid">
          <div class="row justify-content-center">
            <div class="col-12">
              <h2 class="page-title">Website Setup</h2>
              <form action="{{ route('site-settings-update') }}" id="site_setting" method="POST" enctype="multipart/form-data">
              @csrf
                <input type="hidden" name="slug" value="site_settings">
                <div class="row mb-4">
                    
                    <div class="col-md-6">
                        <div class="card shadow mb-4">
                        <div class="card-body">
                        <p class="mb-3"><strong>General Settings</strong></p>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">System Name</span>
                            </div>
                            <input type="text" class="form-control" placeholder="System Name" value="{{ $site_settings->system_name ?? '' }}" name="Meta[system_name]">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1" >Youtube Channel ID</span>
                            </div>
                            <input type="text" class="form-control" placeholder="Youtube Channel ID" value="{{ $site_settings->youtube_channel_id ?? '' }}" name="Meta[youtube_channel_id]">
                        </div>
                        
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Youtube API</span>
                            </div>
                            <input type="text" class="form-control" placeholder="Youtube API" value="{{ $site_settings->youtube_api ?? '' }}" name="Meta[youtube_api]">
                        </div>
                        <div class="form-group mb-3">
                            <label for="example-color">Dasboard Color</label>
                            <input class="form-control" id="example-color" type="color" value="{{ $site_settings->color_theme ?? '#2A3692' }}" name="Meta[color_theme]">
                        </div>
                        
                        
                        </div>
                    </div>
                    </div>
                    <div class="col-xl-3 col-lg-12 col-md-3">
                        <div class="card shadow p-4">
                            <div class="tile mb30">
                                <div class="tile-title-w-btn">
                                    <div class="title">
                                        <h3><i class="far fa-images"></i> Logo Light</h3>
                                    </div>
                                </div>
                                <div class="tile-content">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="mb-4 position-relative">
                                                    <a class="removeprev" style="display: none;" onclick="removeImageSelection('logo1','logo_preview_image1','logo_rmvbtn1')" id="logo_rmvbtn1" href="javascript:void(0);">x</a>

                                                    <img src="{{ GetImageUrl($site_settings->logo_1) }}" alt="" id="logo_preview_image1" class="img-thumbnail" style="display:{{ ($site_settings->logo_1!=null) ? 'block' : 'none' }};">
                                                    <input type="hidden" id="logo1" name="Meta[logo_1]" value="{{ $site_settings->logo_1 }}">
                                                    <a onclick="Media('logo1', 'logo_preview_image1','logo_rmvbtn1');" class="btn btn-oval btn-primary btn-block mt-2" href="#">Insert Image</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-12 col-md-3">
                        <div class="card shadow p-4">
                            <div class="tile mb30">
                                <div class="tile-title-w-btn">
                                    <div class="title">
                                        <h3><i class="far fa-images"></i> Logo Dark</h3>
                                    </div>
                                </div>
                                <div class="tile-content">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="mb-4 position-relative">
                                                    <a class="removeprev" style="display: none;" onclick="removeImageSelection('logo2','logo_preview_image2','logo_rmvbtn2')" id="logo_rmvbtn2" href="javascript:void(0);">x</a>
                                                    <img src="{{ GetImageUrl($site_settings->logo_2) }}" alt="" id="logo_preview_image2" class="img-thumbnail" style="display:{{ ($site_settings->logo_2!=null) ? 'block' : 'none' }};">
                                                    <input type="hidden" id="logo2" name="Meta[logo_2]" value="{{ $site_settings->logo_2 }}">
                                                    <a onclick="Media('logo2', 'logo_preview_image2','logo_rmvbtn2');" class="btn btn-oval btn-primary btn-block mt-2" href="#">Insert Image</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card shadow mb-4">
                        <div class="card-body">
                        <p class="mb-3"><strong>Primary Contat Info</strong></p>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Email ID</span>
                            </div>
                            <input type="email" class="form-control" value="{{ $site_settings->email_id ?? '' }}" name="Meta[email_id]">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Phone Number</span>
                            </div>
                            <input type="number" class="form-control" value="{{ $site_settings->phone_number ?? '' }}" name="Meta[phone_number]">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Whatsapp Number</span>
                            </div>
                            <input type="number" class="form-control" value="{{ $site_settings->whatsapp_number ?? '' }}" name="Meta[whatsapp_number]">
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3" for="address1">Address</label>
                            <div class="col-sm-9">
                            <textarea class="form-control" id="address1" rows="5" name="Meta[address]">{{ $site_settings->address ?? '' }}</textarea>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card shadow mb-4">
                            <div class="card-header">
                                <p class="mb-3"><strong>Social Media Settings</strong></p>
                            </div>
                            <div class="card-body">  
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">F</span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Facebook URL" value="{{ $site_settings->social_links_facebook ?? '' }}" name="Meta[social_links_facebook]">
                                </div>  
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">I</span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Instagram URL" value="{{ $site_settings->social_links_instagram ?? '' }}" name="Meta[social_links_instagram]">
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">T</span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Twitter URL" value="{{ $site_settings->social_links_twitter ?? '' }}" name="Meta[social_links_twitter]">
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Y</span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Youtube URL" value="{{ $site_settings->social_links_youtube ?? '' }}" name="Meta[social_links_youtube]">
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">P<span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Pinterest URL" value="{{ $site_settings->social_links_pinterest ?? '' }}" name="Meta[social_links_pinterest]">
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">G</span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Google MAP URL" value="{{ $site_settings->social_links_gmap ?? '' }}" name="Meta[social_links_gmap]">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card shadow mb-4">
                            <div class="card-header">
                                <p class="mb-3"><strong>Footer Settings</strong></p>
                            </div>
                            <div class="card-body">  
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Short About Us</label>
                                            <textarea class="form-control editor" id="aboutus" name="Meta[short_about_us]">{{ $site_settings->short_about_us ?? '' }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">                                             
                                            <button type="button" class="btn mb-2 btn-primary add_field_button btn-block">
                                                <span class="fe fe-24 fe-file-plus"></span>
                                                Add More Links
                                            </button>
                                            <br><br>
                                            @if (isset($site_settings->short_url_name))
                                                @php
                                                    $usefull_link_name = $site_settings->short_url_name;
                                                    $usefull_link = $site_settings->short_url;
                                                    $merge_links = array_combine($usefull_link_name,$usefull_link);
                                                    //var_dump($merge_link);
                                                @endphp
                                                <div class="input_fields_wrap2">
                                                    @foreach ($merge_links as $merge_link=>$value)
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control" placeholder="Name" value="{{ $merge_link }}" name="Meta[short_url_name][]">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-7">
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control" placeholder="URL" value="{{ $value }}" name="Meta[short_url][]">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <a href="#" class="btn btn-danger btn-block remove_fields">
                                                                    <i class="fa fa-trash"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            @else
                                            
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" placeholder="Name" name="Meta[short_url_name][]">
                                                </div>
                                            </div>
                                            <div class="col-md-7">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" placeholder="URL" name="Meta[short_url][]">
                                                </div>
                                            </div>
                                                                                   
                                            @endif
                                        
                                        
                                        <div class="input_fields_wrap"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card shadow mb-12">
                            <div class="card-header">
                                <p class="mb-3"><strong>Global SEO Settings</strong></p>
                            </div>
                            <div class="card-body">  
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group"><label for="inputSearch">Meta Title</label><input type="text" class="form-control" id="MetaTitleField" value="{{ $meta_content->meta_title ?? '' }}" name="Meta[meta_content][meta_title]" oninput="metaTitle()"></div>
                                        <div style="margin:5px 0px;" >
                                                <input type="text" class="form-control" style="width:50px; margin:5px 0px; display:inline;" id="metaTitleCharCount" value="0" disabled>   characters. Most search engines use a maximum of 57 chars for the meta title.
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group"><label for="inputSearch">Meta Description</label>
                                            <textarea name="Meta[meta_content][meta_description]" id="MetaDescField" rows=3 class="form-control" oninput="metaDesc()" data-editor="noeditor">{{ $meta_content->meta_description ?? '' }}</textarea>
                                        </div>
                                        <div style="margin:5px 0px;" >
                                                <input type="text" class="form-control" style="width:50px; margin:5px 0px; display:inline;" id="metaDescriptionCharCount" value="0" disabled>   characters. Most search engines use a maximum of 160 chars for the meta description
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="inputSearch">Meta Keywords (Comma separated)</label>
                                            <input type="text" class="form-control" value="{{ $meta_content->meta_keyword ?? '' }}" name="Meta[meta_content][meta_keyword]" placeholder="" >
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    
                </div> <!-- .row -->
                <div class="row">
                    <div class="col-md-6">
                        <button type="reset" class="btn mb-2 btn-outline-secondary btn-block"><span class="fe fe-arrow-down fe-16 mr-2"></span>Reset</button>
                        
                    </div>
                    <div class="col-md-6">
                        <button type="submit" class="btn mb-2 btn-success btn-block">Update<span class="fe fe-chevron-right fe-16 ml-2"></span></button>
                    </div>
                </div>
              </form> 
            </div>
          </div> <!-- .row -->
        </div> <!-- .container-fluid -->
      </main> <!-- main -->
@endsection
@push('scripts')
<script>
    $(document).ready(function() {
    var max_fields      = 50; //maximum input boxes allowed
    var wrapper         = $(".input_fields_wrap"); //Fields wrapper
    var wrapper2         = $(".input_fields_wrap2"); //Fields wrapper
    var add_button      = $(".add_field_button"); //Add button ID
    
    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            var rmvbtn = 'rmvbtn_'+x;
            
            //console.log(editorId);
            $(wrapper).append('<div class="row">'+
                '<div class="col-md-3" style="margin-top:20px;">'+
                    '<input type="text" class="form-control" required placeholder="Name" name="Meta[short_url_name][]" >'+
                '</div>'+
                '<div class="col-md-7" style="margin-top:20px;">'+
                    '<input type="text" class="form-control" required placeholder="URL" name="Meta[short_url][]" >'+
                '</div>'+    
                '<div class="col-md-2" style="margin-top:20px;">'+
                    '<a href="#" class="btn btn-danger btn-block remove_field">'+
                        '<i class="fa fa-trash"></i>'+
                    '</a>'+
                '</div>'+
            '</div>'); //add input box            
        }
        
    });
    
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').parent('div').remove();
    })
    $(wrapper2).on("click",".remove_fields", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').parent('div').remove();
    })
});
</script>
@endpush



