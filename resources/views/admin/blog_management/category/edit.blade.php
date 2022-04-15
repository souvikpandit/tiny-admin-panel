@extends('admin.layout.app')

@section('headerSection')

@endsection

@section('main-content')
<main role="main" class="main-content">
<form action="{{ route('category.update',$cat->id) }}" id="category_add" method="POST" enctype="multipart/form-data">

    @csrf
    @method('put')
<div class="row">    
    <div class="col-xl-8 col-lg-8 col-md-8">
        <div class="card shadow mb-4">
            <div class="card-body">
              <div class="col-xl-12 col-lg-12 col-md-12">
                <div class="tile mb30">
                    <div class="tile-title-w-btn">
                        <div class="title">
                            <h3><i class="fe fe-24 fe-image"></i> Edit Category</h3>
                        </div>
                        <p>
                            <a href="{{ route('category.index') }}" class="btn btn-primary btn-oval trigger-button"><i class="lni-list"></i> All</a>
                        </p>
                    </div>
                    {{-- Messages --}}
                    @include('includes.message')
                    {{-- Messages --}}
                    
                    <div class="tile-content">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="inputSearch">Category Name</label>
                                    <input type="text" class="form-control mb-2" name="name" id="title" placeholder="Enter Category" value="{{ $cat->name }}">
                                    <input type="hidden" name="parent_slug" id="parent_slug" value="{{ $cat->slug }}" >
                                    
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="inputSearch">Slug</label>
                                    <input type="text" class="form-control mb-2" name="slug" id="slug" placeholder="" value="{{ $cat->slug }}">
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
                                    <select id="inputUserType" class="form-control" name="status">
                                        <option value="1" {{ ($cat->status == 1) ? 'selected' : '' }}>Active</option>
                                        <option value="0" {{ ($cat->status == 0) ? 'selected' : '' }}>Inactive</option>
                                    </select>
                                </div>
                                
                            </div>
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
                                    <label>Parent Category</label>

                                    <select name="parent_category" class="form-control" id="selCat" >

                                        @php
                                            $pid = $cat->parent_id;
                                        @endphp
                                        
                                            <option value="0">--Root Category--</option>
                                        
                                            @foreach ($categories as $category)
                                                
                                                    <option value="{{ $category->id }}" data-parent="{{ $category->slug }}" {{ ($category->id == $pid) ? 'selected' : '' }}>{{ $category->name }}</option>
                                                
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
                                            <img src="{{ asset(GetImageUrl($cat->image)) }}" alt="" id="featured_preview_image" class="img-thumbnail" style="display:{{ ($cat->image) ? 'block' : 'none' }};">
                                            <input type="hidden" id="featured_thumbnail" name="image" value="{{ $cat->image }}">
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
            </div>
        </div>   
    </div>
</div>

</form>   
</main>
@endsection


@push('scripts')

<script>
    jQuery("#category_add").validate({
        ignore: [],
        rules: {
            name: {
                required: true,
            },
            slug: {
                required: true,
            },
            parent_category: {
                required: true,
            }
        },
        messages: {
            name: {
                required: "Please enter Catgory Name.",
            },
            slug: {
                required: "Please enter slug.",
            },
            parent_category: {
                required: "Please select a parent category.",
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
    {{--  $('#selCat').change(function () {
        //alert('hi');
        var parent_slug = $(this).children('option:selected').data('parent');
        console.log(parent_slug);
        $("#parent_slug").val(parent_slug);
    });  --}}
</script>

@endpush
