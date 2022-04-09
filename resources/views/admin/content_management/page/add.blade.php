@extends('admin.layout.app')

@section('headerSection')

@endsection

@section('main-content')
<main role="main" class="main-content">
<form action="{{ route('post.store') }}" id="page_add" method="POST" enctype="multipart/form-data">

    @csrf

<div class="row">    
    <div class="col-xl-8 col-lg-8 col-md-8">
        <div class="card shadow mb-4">
            <div class="card-body">
              <div class="col-xl-12 col-lg-12 col-md-12">
                <div class="tile mb30">
                    <div class="tile-title-w-btn">
                        <div class="title">
                            <h3><i class="far fa-file"></i> Add Page</h3>
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
                                    <input type="text" class="form-control mb-2" name="Post[name]" id="title" placeholder="Enter Title">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="inputSearch">Slug</label>
                                    <input type="text" class="form-control mb-2" name="Post[slug]" id="slug" placeholder="" >
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group"><label for="inputSearch">Content</label>
                                    <textarea name="Post[content]" id="textarea2" class="form-control mb-2 editor"></textarea>
                                </div>
                            </div>
                            
                            <div class="col-md-12 input_fields_wrap"></div>
                            
                            
                            <div class="col-md-12">
                                <div class="col-md-12" style="margin-top:20px;">
                                    <a class="btn btn-primary add_field_button " style="float: right;color:#fff">
                                        <i class='fa fa-plus'></i> Add More Section
                                    </a>
                                </div>
                            </div>
                            <div id="preview_sub_image" class="images-container"></div>  
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
                                <textarea name="PostMeta[banner_title]" id="textarea1" class="form-control editor"></textarea>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Banner Image</label>
                                        <div class="mb-4 position-relative">
                                            <a class="removeprev" style="display: none;" onclick="removeImageSelection('thumbnail','preview_image','rmvbtn')" id="rmvbtn" href="javascript:void(0);">x</a>
                                            <img src="" alt="" id="preview_image" class="img-thumbnail" style="display:none;">
                                            <input type="hidden" id="thumbnail" name="PostMeta[banner]" value="">
                                            <a onclick="Media('thumbnail', 'preview_image','rmvbtn');" class="btn btn-oval btn-primary btn-block mt-2" href="#">Insert Image</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Mobile Banner Image</label>
                                        <div class="mb-4 position-relative">
                                            <a class="removeprev" style="display: none;" onclick="removeImageSelection('mobile_thumbnail','mobile_preview_image','mobile-rmvbtn')" id="mobile-rmvbtn" href="javascript:void(0);">x</a>
                                            <img src="" alt="" id="mobile_preview_image" class="img-thumbnail" style="display:none;">
                                            <input type="hidden" id="mobile_thumbnail" name="PostMeta[mobile_banner]" value="">
                                            <a onclick="Media('mobile_thumbnail', 'mobile_preview_image','mobile-rmvbtn');" class="btn btn-oval btn-primary btn-block mt-2" href="#">Insert Image</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            
                            
                        </div>
                    </div>
                </div>
                           
                <div class="col-xl-12 col-lg-12 col-md-12">

                    <div class="tile mb30">

                        

                        <div class="tile-title-w-btn">

                            <div class="title mt-2 mb-2">

                                <h3><i class="fas fa-chart-line"></i> SEO Setting</h3>

                            </div>

                            <div class="form-group">

                                <input type="checkbox" id="metaDefaultCheck" checked> Use Default Seo Setting

                                <input type="hidden" value="1" id="metaDefaultValue" name="PostMeta[meta_content][metadefault]" />

                            </div>    

                        </div>

                        

                        

            

                        <div class="tile-content">

                                <div class="row">

                                    <div class="col-md-12">

                                        <div class="form-group"><label for="inputSearch">Meta Title</label><input type="text" class="form-control" id="MetaTitleField" name="PostMeta[meta_content][meta_title]" oninput="metaTitle()"></div>

                                        

                                        <div style="margin:5px 0px;" >

                                                <input type="text" class="form-control" style="width:50px; margin:5px 0px; display:inline;" id="metaTitleCharCount" value="0" disabled>   characters. Most search engines use a maximum of 57 chars for the meta title.

                                        </div>

                                    </div>

                                    

                                    

                                    <div class="col-md-12">

                                        <div class="form-group"><label for="inputSearch">Meta Description</label>

                                            <textarea name="PostMeta[meta_content][meta_description]" id="MetaDescField" rows=3 class="form-control" oninput="metaDesc()" data-editor="noeditor"></textarea>

                                        </div>

                                        

                                        <div style="margin:5px 0px;" >

                                                <input type="text" class="form-control" style="width:50px; margin:5px 0px; display:inline;" id="metaDescriptionCharCount" value="0" disabled>   characters. Most search engines use a maximum of 160 chars for the meta description

                                        </div>

                                    </div>

                                    <div class="col-md-12">

                                        <div class="form-group"><label for="inputSearch">Meta Keywords (Comma separated)</label><input type="text" class="form-control" name="PostMeta[meta_content][meta_keyword]" placeholder="" ></div>

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
                                            <a class="removeprev" style="display: none;" onclick="removeImageSelection('featured_thumbnail','featured_preview_image','featured_rmvbtn')" id="featured_rmvbtn" href="javascript:void(0);">x</a>
                                            <img src="" alt="" id="featured_preview_image" class="img-thumbnail" style="display:none;">
                                            <input type="hidden" id="featured_thumbnail" name="Post[image]" value="">
                                            <a onclick="Media('featured_thumbnail', 'featured_preview_image','featured_rmvbtn');" class="btn btn-oval btn-primary btn-block mt-2" href="#">Insert Image</a>
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

                                    <div class="col-md-12">

                                    <div class="form-group">

                                        <input type="hidden" id="sub_image" name="PostMeta[gallery]" value="[]">

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
<script>
    $(document).ready(function() {
    var max_fields      = 50; //maximum input boxes allowed
    var wrapper         = $(".input_fields_wrap"); //Fields wrapper
    var add_button      = $(".add_field_button"); //Add button ID
    
    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            var editorId = 'editor_' +x;
            var thumbnail = 'thumbnail_'+x;
            var preview_image = 'preview_image_'+x;
            var rmvbtn = 'rmvbtn_'+x;
            
            //console.log(editorId);
            $(wrapper).append('<div class="row"><div class="col-md-4" style="margin-top:20px;"> <label for="exampleInputTit1e">Section Title:<sup class="redstar">*</sup></label><input type="text" class="form-control" name="section_title[]" ><br>'+
            '<label>Section Image</label><a class="removeprev3" style="display: none;" onclick="removeImageSelection(\''+ thumbnail +'\',\''+ preview_image +'\',\'' +rmvbtn +'\')" id="' + rmvbtn +'" href="javascript:void(0);">x</a>'+
      		'<img src="" alt="" id="'+preview_image+'" class="img-thumbnail" style="display:none;">'+
      		'<input type="hidden" id="' + thumbnail + '" name="section_image[]" value="">'+
      		'<a onclick="Media(\''+ thumbnail +'\',\''+ preview_image +'\',\'' +rmvbtn +'\')" class="btn btn-oval btn-primary btn-block mt-2" href="#">Insert Image</a>'+
            '</div>'+
            '<div class="col-md-7" style="margin-top:20px;"> <label for="exampleInputTit1e">Section Content:<sup class="redstar">*</sup></label> <textarea id="'+ editorId +'" class="form-control editor" name="section_content[]"></textarea></div>' +
            
            '<div class="col-md-1" style="margin-top:20px;"> <label for="">&nbsp;</label><br><a href="#" class="btn btn-danger btn-block remove_field"><i class="fa fa-trash"></i></a></div></div>'); //add input box
            CKEDITOR.replace(editorId);
        }
        
    });
    
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').parent('div').remove();
    })
});
</script>
<script>
    jQuery("#page_add").validate({
        ignore: [],
        rules: {
            "Post[name]": {
                required: true,
            },
            "Post[slug]": {
                required: true,
            },
            "Post[content]" :{
                required: true,
            }
        },
        messages: {
            "Post[name]": {
                required: "Please enter Page Title.",
            },
            "Post[slug]": {
                required: "Please enter a Slug.",
            },
            "Post[content]" : {
                required: "Please enter Page Content.",
            }
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
        var fileInput = document.getElementById('image'); 
        var filePath1 = fileInput.value; 
        // Allowing file type 
        var allowedExtensions = /(\.png|\.jpg|.\jpeg)$/i; 
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
                    document.getElementById('imagePreview').innerHTML = '<img src="' + e.target.result + '"/>'; 
                }; 
                reader.readAsDataURL(fileInput.files[0]); 
            } 
        } 
    } 
</script>
@endpush
