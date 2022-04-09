@extends('admin.layout.app')

@section('headerSection')

@endsection

@section('main-content')
<main role="main" class="main-content">
<form action="{{ route('post.update', $banner->id) }}" id="banner_add" method="POST" enctype="multipart/form-data">

    @csrf

<div class="row">    
    <div class="col-xl-8 col-lg-8 col-md-8">
        <div class="card shadow mb-4">
            <div class="card-body">
              <div class="col-xl-12 col-lg-12 col-md-12">
                <div class="tile mb30">
                    <div class="tile-title-w-btn">
                        <div class="title">
                            <h3><i class="fe fe-24 fe-image"></i> Edit Banner</h3>
                        </div>
                        <p>
                            <a href="{{ route('banner') }}" class="btn btn-primary btn-oval trigger-button"><i class="lni-list"></i> All</a>
                        </p>
                    </div>
                    {{-- Messages --}}
                    @include('includes.message')
                    {{-- Messages --}}
                    @include('admin.includes.options',[
                        'redirectTo' => 'edit',
                        'redirectUrl' => '/banner/edit/',
                        'msg_type' => "success",
                        'msg' =>  "Created Successfully",
                        'post_type' =>  "banner"
                    ]) 
                    <input type="hidden" name="Post[sorting_no]" value="{{ $banner->sorting_no }}">
                    <div class="tile-content">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="inputSearch">Title</label>
                                    <input type="text" class="form-control mb-2" name="Post[name]" id="title" placeholder="Enter Title" value="{{ $banner->name }}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="inputSearch">Slug</label>
                                    <input type="text" class="form-control mb-2" name="Post[slug]" id="slug" placeholder="" value="{{ $banner->slug }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>              
                <div class="col-xl-12 col-lg-12 col-md-12">
                    <div class="tile mb30">
                        
                            
                        <div class="tile-content">
                            <div class="form-group"><label for="inputSearch">Banner Content</label>
                                <textarea name="Post[content]" id="textarea1" class="form-control editor">{{ $banner->content }}</textarea>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Banner Image</label>
                                        <div class="mb-4 position-relative">
                                            <a class="removeprev" style="display: none;" onclick="removeImageSelection('thumbnail','preview_image','rmvbtn')" id="rmvbtn" href="javascript:void(0);">x</a>
                                            <img src="{{ asset(GetImageUrl($banner->Meta('banner'))) }}" alt="" id="preview_image" class="img-thumbnail" style="display:{{ ($banner->Meta('banner')) ? 'block' : 'none' }};">
                                            <input type="hidden" id="thumbnail" name="PostMeta[banner]" value="{{ $banner->Meta('banner') }}">
                                            <a onclick="Media('thumbnail', 'preview_image','rmvbtn');" class="btn btn-oval btn-primary btn-block mt-2" href="#">Insert Image</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Mobile Banner Image</label>
                                        <div class="mb-4 position-relative">
                                            <a class="removeprev" style="display: none;" onclick="removeImageSelection('mobile_thumbnail','mobile_preview_image','mobile-rmvbtn')" id="mobile-rmvbtn" href="javascript:void(0);">x</a>
                                            <img src="{{ asset(GetImageUrl($banner->Meta('mobile_banner'))) }}" alt="" id="mobile_preview_image" class="img-thumbnail" style="display:{{ ($banner->Meta('mobile_banner')) ? 'block' : 'none' }};">
                                            <input type="hidden" id="mobile_thumbnail" name="PostMeta[mobile_banner]" value="{{ $banner->Meta('mobile_banner') }}">
                                            <a onclick="Media('mobile_thumbnail', 'mobile_preview_image','mobile-rmvbtn');" class="btn btn-oval btn-primary btn-block mt-2" href="#">Insert Image</a>
                                        </div>
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
                                    <option value="1" {{ ($banner->status == 1) ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ ($banner->status == 0) ? 'selected' : '' }}>Inactive</option>
                                </select>
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
    jQuery("#banner_add").validate({
        ignore: [],
        rules: {
            "Post[name]": {
                required: true,
            },
            "Post[slug]": {
                required: true,
            }
        },
        messages: {
            "Post[name]": {
                required: "Please enter Banner Title.",
            },
            "Post[slug]": {
                required: "Please enter a Slug.",
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

@endpush
