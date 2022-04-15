@extends('admin.layout.app')

@section('headerSection')

@endsection

@section('main-content')
<main role="main" class="main-content">
<form action="{{ route('book-category.store') }}" id="category_add" method="POST" enctype="multipart/form-data">

    @csrf

<div class="row">    
    <div class="col-xl-8 col-lg-8 col-md-8">
        <div class="card shadow mb-4">
            <div class="card-body">
              <div class="col-xl-12 col-lg-12 col-md-12">
                <div class="tile mb30">
                    <div class="tile-title-w-btn">
                        <div class="title">
                            <h3><i class="fe fe-24 fe-image"></i> Add Book Category</h3>
                        </div>
                        <p>
                            <a href="{{ route('book-category.index') }}" class="btn btn-primary btn-oval trigger-button"><i class="lni-list"></i> All</a>
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
                                    <input type="text" class="form-control mb-2" name="name" id="title" placeholder="Enter Category" >
                                    <input type="hidden" name="parent_slug" id="parent_slug">
                                    <input type="hidden" name="type" value="book">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="inputSearch">Slug</label>
                                    <input type="text" class="form-control mb-2" name="slug" id="slug" placeholder="" >
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
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
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

                                        <option value="">Select</option>

                                        <option value="0">--Root Category--</option>

                                        @foreach ($categories as $category)

                                        <option value="{{ $category->id }}" data-parent="{{ $category->slug }}">{{ $category->name }}</option>

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
                                            <input type="hidden" id="featured_thumbnail" name="image" value="">
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
    $('#selCat').change(function () {

        var parent_slug = $(this).children('option:selected').data('parent');
        $("#parent_slug").val(parent_slug);
    });
</script>

@endpush
