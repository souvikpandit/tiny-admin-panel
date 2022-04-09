@extends('admin.layout.app')



@section('main-content')
<main role="main" class="main-content">
<form action="{{ route('post.update',$page->id) }}" id="page_add" method="POST" enctype="multipart/form-data">

    @csrf

<div class="row">    
    <div class="col-xl-8 col-lg-8 col-md-8">
        <div class="card shadow mb-4">
            <div class="card-body">
              <div class="col-xl-12 col-lg-12 col-md-12">
                <div class="tile mb30">
                    <div class="tile-title-w-btn">
                        <div class="title">
                            <h3><i class="far fa-file"></i> Edit Page</h3>
                        </div>
                        <p>
                            <a href="{{ route('page') }}" class="btn btn-primary btn-oval trigger-button"><i class="lni-list"></i> All</a>
                        </p>
                    </div>
                    {{-- Messages --}}
                    @include('includes.message')
                    {{-- Messages --}}
                    @include('admin.includes.options',[
                        'redirectTo' => 'edit',
                        'redirectUrl' => '/page/edit/',
                        'msg_type' => "success",
                        'msg' =>  "Created Successfully",
                        'post_type' =>  "page"
                    ])       

                    <div class="tile-content">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="inputSearch">Title</label>
                                    <input type="text" class="form-control mb-2" name="Post[name]" id="title" value="{{ $page->name }}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label id="parmalinkLabel"> Permalink: 
                                    <a class="text-info" style="text-decoration:underline;" target="_blank" id="parmalink" href="{{URL::to("/",$page->slug)}}">{{URL::to("/")}}/
                                        <span style="text-decoration:underline;" id="slugValue">{{$page->slug}}</span>
                                    </a>
                                </label>
                                <button type="button" class="btn btn-link btn-sm" id="parmalinkBtn" onclick="EditSlug()"><i class="fas fa-edit"></i> Edit 
                                </button>
                                <input type="hidden" name="Post[slug]" id="slugInput" value="{{$page->slug}}">
                            </div>
                            <div class="col-md-12">
                                <div class="form-group"><label for="inputSearch">Content</label>
                                    <textarea name="Post[content]" id="textarea2" class="form-control mb-2 editor">{!! $page->content !!}</textarea>
                                </div>
                            </div>
                             
                        </div>
                    </div>
                </div>
                </div>              
                <div class="col-xl-12 col-lg-12 col-md-12">
                    <div class="tile mb30">
                        
                            <div class="title mt-2 mb-2">
                                <h3><i class="far fa-image"></i> Page Banner</h3>
                            </div>
                        <div class="tile-content">
                            <div class="form-group"><label for="inputSearch">Banner Title</label>
                                <textarea name="PostMeta[banner_title]" id="textarea1" class="form-control editor">{!! $page->Meta('banner_title') !!}</textarea>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Banner Image</label>
                                        <div class="mb-4 position-relative ">
                                            <a class="removeprev" onclick="removeImageSelection('thumbnail','preview_image','rmv-btn')" id="rmv-btn" href="javascript:void(0);">x</a>
                                            <img src="{{ asset(GetImageUrl($page->Meta("banner"))) }}" alt="" id="preview_image" class="img-fluid">
                                            <input type="hidden" id="thumbnail" name="PostMeta[banner]" value="{{ $page->Meta("banner") }}">
                                            <a onclick="Media('thumbnail', 'preview_image','rmv-btn');" class="btn btn-oval btn-primary btn-block mt-2" href="#">Insert Image</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Mobile Banner Image</label>
                                        <div class="mb-4 position-relative">
                                            <a class="removeprev" onclick="removeImageSelection('mobile_thumbnail','mobile_preview_image','mobile-rmv-btn')" id="mobile-rmv-btn" href="javascript:void(0);">x</a>
                                            <img src="{{ asset(GetImageUrl($page->Meta("mobile_banner"))) }}" alt="" id="mobile_preview_image" class="img-fluid">
                                            <input type="hidden" id="mobile_thumbnail" name="PostMeta[mobile_banner]" value="{{ $page->Meta("mobile_banner") }}">
                                            <a onclick="Media('mobile_thumbnail', 'mobile_preview_image','mobile-rmv-btn');" class="btn btn-oval btn-primary btn-block mt-2" href="#">Insert Image</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            
                            
                        </div>
                    </div>
                </div>
                @php
                    $meta_content = $page->getMetaDetails(true);
                @endphp        
                <div class="col-xl-12 col-lg-12 col-md-12">

                    <div class="tile mb30">

                        

                        <div class="tile-title-w-btn">

                            <div class="title mt-2 mb-2">

                                <h3><i class="fas fa-chart-line"></i> SEO Setting</h3>

                            </div>

                            <div class="form-group">

                                <input type="checkbox" id="metaDefaultCheck" @if ($meta_content->metadefault) checked @endif> Use Default Seo Setting

                                <input type="hidden" value="{{$meta_content->metadefault ?? 0}}" id="metaDefaultValue" name="PostMeta[meta_content][metadefault]" />

                            </div>    

                        </div>

                        

                        

            
                        
                        <div class="tile-content">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="inputSearch">Meta Title</label>
                                            <input type="text" class="form-control" id="MetaTitleField" name="PostMeta[meta_content][meta_title]" value="{{$meta_content->meta_title ?? ''}}" oninput="metaTitle()">
                                        </div>
                                        <div style="margin:5px 0px;" >
                                            <input type="text" class="form-control" style="width:50px; margin:5px 0px; display:inline;" id="metaTitleCharCount" value="0" disabled>   characters. Most search engines use a maximum of 57 chars for the meta title.
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group"><label for="inputSearch">Meta Description</label>
                                            <textarea name="PostMeta[meta_content][meta_description]" id="MetaDescField" rows=3 class="form-control" oninput="metaDesc()" data-editor="noeditor">{{$meta_content->meta_description ?? ''}}</textarea>
                                        </div>
                                        <div style="margin:5px 0px;" >
                                            <input type="text" class="form-control" style="width:50px; margin:5px 0px; display:inline;" id="metaDescriptionCharCount" value="0" disabled>   characters. Most search engines use a maximum of 160 chars for the meta description
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="inputSearch">Meta Keywords (Comma separated)</label>
                                            <input type="text" class="form-control" name="PostMeta[meta_content][meta_keyword]" value="{{$meta_content->meta_keyword ?? ''}}" >
                                        </div>
                                    </div>

                                    

                                    

                                </div>

                            

                        </div>

                    </div>

                </div>
            </div> <!-- .card-body -->
        </div>           
    </div>    
        
    <div class="col-xl-4 col-lg-4 col-md-4 ">
        <div class="sticky">
            <div class="card shadow mb-4">
                <div class="card-header">
                    <div class="tile-title-w-btn">
                        <div class="title">
                            <h3><i class="far fa-save"></i> Publish</h3>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            Date : {{ date("l , jS \of F Y") }} (IST) {{-- <p id="current-date"></p> --}}
                        </div>
                        <div class="form-group col-md-6">
                            <button id="saveButton" class="btn btn-outline-secondary btn-block mt-2" data-style="expand-right" data-size="xs" type="submit"><span class="ladda-label"><i class="feather icon-save"></i>Preview Changes</span><span class="ladda-spinner"></span></button>
                        </div>
                        <div class="form-group col-md-6">
                            <button id="saveButton" class="btn btn-primary btn-block mt-2" data-style="expand-right" data-size="xs" type="submit"><span class="ladda-label"><i class="feather icon-save"></i>Publish</span><span class="ladda-spinner"></span></button>
                        </div>
                    </div>
                </div>
            </div>     
            <div class="card shadow mb-4">
            <div class="card-body">   
                <div class="col-xl-12 col-lg-12 col-md-12">                
                    <div class="tile mb30">
                        
                        <div class="tile-content">
                            
                            <div class="form-group">
                                <label>Status</label>
                                <select id="inputUserType" class="form-control" name="Post[status]">
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Parent</label>
                                <select id="inputUserType" class="form-control" name="PostMeta[parent_id]">
                                    <option value="0">Root</option>
                                    @foreach ($all_pages as $page)
                                        <option value="{{ $page->id }}">{{ $page->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>  
            </div>  
            </div>
            <div class="card shadow mb-4">
                <div class="card-body"></div>
                <div class="col-xl-12 col-lg-12 col-md-12">
                    <div class="tile mb30">
                        <div class="tile-title-w-btn">
                            <div class="title">
                                <h3><i class="far fa-images"></i> Featured Image</h3>
                            </div>
                        </div>
                        <div class="tile-content">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="mb-4 position-relative">
                                            <a class="removeprev" style="display: none;" onclick="removeImageSelection('featured_thumbnail','featured_preview_image','featured_rmv-btn')" id="featured_rmv-btn" href="javascript:void(0);">x</a>
                                            <img src="{{ asset(GetImageUrl($page->featured_image)) }}" alt="" id="featured_preview_image" class="img-thumbnail">
                                            <input type="hidden" id="featured_thumbnail" name="Post[image]" value="">
                                            <a onclick="Media('featured_thumbnail', 'featured_preview_image','featured_rmv-btn');" class="btn btn-oval btn-primary btn-block mt-2" href="#">Insert Image</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div> 
            <div class="card shadow mb-4">
                <div class="card-body"></div> 
                <div class="col-xl-12 col-lg-12 col-md-12">
                    <div class="tile mb30">

                        

                        <div class="tile-title-w-btn">

                            <div class="title">

                                <h3><i class="far fa-images"></i> Image Gallery</h3>

                            </div>
                        </div>

            

                        <div class="tile-content">

                            <div class="row">
                                    <div class="col-md-12 mb-3">
                                        @php
                                            $sub_image = json_decode($page->Meta("gallery"));
                                            if(!is_array($sub_image)){
                                                $sub_image = array();
                                            }
                                        @endphp
                                        <input type="hidden" name="existimages" id="existimages" value="{{$page->Meta("gallery") ?? '[]'}}">
                                        <div class="images-container row">
                                            @foreach ($sub_image as $image)
                                            <div class="image-container col-md-4" id="box{{$loop->iteration}}">
                                                    <div class="controls">
                                                        <a href="javascript:void(0)" class=" removeprev2" onclick="sub_delete('{{$image}}',{{$loop->iteration}})"><i class="fa fa-times"></i></a>
                                                    </div>
                                                <div class="image"><img src="{{ asset(GetImageUrl($image)) }}" alt="" class="img-fluid"></div>
                                            </div>
                                            @endforeach
                                        </div>  
                                        <div id="preview_sub_image" class="images-container"></div>  
                                    </div>
                                    <div class="col-md-12">

                                    <div class="form-group">
                                        <input type="hidden" id="sub_image" name="sub_image" value="[]">
                                        <a onclick="Media('sub_image','preview_sub_image','','multiple');" class="btn btn-primary btn-block" href="#">Insert Images</a>

                                    </div>

                                </div>

                            </div>

                            

                        </div>

                    </div>
                </div> 
            </div>
            </div>
        </div>   
    </div>
</div>

</form>   
</main>
@endsection


@push('scripts')







<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>



<script>

    var subdel;



    if(document.getElementById('existimages').value){

        subdel = JSON.parse(document.getElementById('existimages').value);

    }

   

    function sub_delete(id,boxid){

        removeA(subdel,id);

        document.getElementById('existimages').value = JSON.stringify(subdel);

        $('#box'+boxid).hide();

        console.log( document.getElementById('existimages').value );

    }



</script>

<script>

    var subdel1;



    if(document.getElementById('contact_banner').value){

        subdel1 = JSON.parse(document.getElementById('contact_banner').value);

    }

   

    function sub_delete_contact(id,boxid){

        removeA(subdel1,id);

        document.getElementById('contact_banner').value = JSON.stringify(subdel1);

        $('#box'+boxid).hide();

        //console.log( document.getElementById('contact_banner').value );

    }



</script>

<script>

  

    metaTitle();

    metaDesc();



</script>



<script>

    jQuery("#dept_add").validate({

        ignore: [],

        rules: {

            department_name: {

                required: true,

            }

            // phone: {

            //     required: true,

            // },

            // email:{

            //     required: true,

            //     email: true

            // },

            // message: {

            //     required: true,

            // },

            // location: {

            //     required: true,

            // },

            // firstCaptcha: { required: true }

        },

        messages: {

            department_name: {

                required: "Please enter department name.",

            }

            // phone: {

            //     required: "Please enter your contact no.",

            // },

            // email: {

            //     required: "Please enter your email.",

            //     email: "Please enter a valid email."

            // },

            // message: {

            //     required: "Please tell us about your query.",

            // },

            // location: {

            //     required: "Please enter your location.",

            // },

            // firstCaptcha: {

            //     required: "Please validate recaptcha.",

            // }

        },

        errorClass: 'text-danger',

        errorElement: 'em',

        highlight: function (element) {

            jQuery(element).closest('.form-group').addClass('has-error');

        },

        unhighlight: function (element) {

            jQuery(element).closest('.form-group').removeClass('has-error');

        },

        errorPlacement: function (error, element) {

            error.insertAfter(element);

        }

    });

</script>



        <script> 

            function imageValidation() { 

                var fileInput =  

                    document.getElementById('image'); 

                  

                var filePath1 = fileInput.value; 

              

                // Allowing file type 

                var allowedExtensions =  

                        /(\.png|\.jpg|.\jpeg)$/i; 

                  

                if (!allowedExtensions.exec(filePath1)) { 

                    alert('Invalid file type. Please Select .png, .jpg, .jpeg file format to upload.'); 

                    fileInput.value = ''; 

                    return false; 

                }  

                else  

                { 

                  

                    // Image preview 

                    if (fileInput.files && fileInput.files[0]) { 

                        var reader = new FileReader(); 

                        reader.onload = function(e) { 

                            document.getElementById( 

                                'imagePreview').innerHTML =  

                                '<img src="' + e.target.result 

                                + '"/>'; 

                        }; 

                          

                        reader.readAsDataURL(fileInput.files[0]); 

                    } 

                } 

            } 

        </script>



@endpush
