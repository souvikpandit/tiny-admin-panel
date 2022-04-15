@extends('admin.layout.app')

@section('headerSection')

@endsection

@section('main-content')
<main role="main" class="main-content">
<form action="{{ route('blog.update',$blog->id) }}" id="blog_add" method="POST" enctype="multipart/form-data">

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
                                <h3><i class="fe fe-24 fe-image"></i> Edit Blog</h3>
                            </div>
                            <p>
                                <a href="{{ route('blog.index') }}" class="btn btn-primary btn-oval trigger-button"><i class="lni-list"></i> All</a>
                            </p>
                        </div>
                        {{-- Messages --}}
                        @include('includes.message')
                        {{-- Messages --}}
                        
                        <div class="tile-content">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="inputSearch">Blog Name</label>
                                        <input type="text" class="form-control mb-2" name="title" id="title" placeholder="Enter Blog Name" value="{{ $blog->title }}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="inputSearch">Slug</label>
                                        <input type="text" class="form-control mb-2" name="slug" id="slug" placeholder="" value="{{ $blog->slug }}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="inputSearch">Category</label>
                                        <select class="form-control mb-2 select2 select2-hidden-accessible" name="categories[]" multiple="" data-placeholder="Select Catagory" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}"
    
                                                    @foreach ($blog->categories as $blogcategory)
    
                                                    @if ($blogcategory->id == $category->id)
    
                                                        selected
    
                                                    @endif
    
                                                    @endforeach
                                                >  
                                                @php
                                                $parent = App\Models\admin\Category::where('id',$category->parent_id)->first();
                                                @endphp
                                                {{ ($category->parent_id == 0) ? 'Root Category' : $parent->name }} - 
                                                {{ $category->name }}  </option>
                                            @endforeach
    
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="inputSearch">Tag</label>
                                        <select class="form-control mb-2 select2 select2-hidden-accessible" name="tags[]" multiple="" data-placeholder="Select Tag" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                            @foreach ($tags as $tag)
                                                <option value="{{ $tag->id }}"
    
                                                    @foreach ($blog->tags as $blogTag)
    
                                                        @if ($blogTag->id == $tag->id)
    
                                                            selected
    
                                                        @endif
    
                                                    @endforeach
    
                                                >   {{ $tag->name }}  </option>
                                            @endforeach
    
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="inputSearch">Author</label>
                                        <select name="author" class="form-control">
                                            @php
                                                $aid = $blog->author_id;
                                            @endphp
                                                    
                                                @foreach ($authors as $author)
                                                    @if($author->id == $aid)
                                                        <option value="{{ $aid }}">{{ $author->name }}</option>
                                                    @endif
                                                @endforeach
                                                    
    
                                                    
                                            @foreach ($authors as $a)
                                                            
                                                <option value="{{ $a->id }}">{{ $a->name }}</option>
                                                            
                                            @endforeach
                                            
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="inputSearch">Content</label>
                                        <textarea name="body" id="textarea2" class="form-control mb-2 editor">{{ $blog->body }}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="inputSearch">Short Content</label>
                                        <textarea name="short_desc" class="form-control mb-2" rows="5">{{ $blog->short_desc }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>            
                <hr>
                @php
                    $meta_content = json_decode($blog->blog_meta);
                    //var_dump($meta_content);
                @endphp  
                <div class="col-xl-12 col-lg-12 col-md-12">
                    <div class="tile mb30">                        
                        <div class="tile-title-w-btn">
                            <div class="title mt-2 mb-2">
                                <h3><i class="fas fa-chart-line"></i> SEO Setting</h3>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" id="metaDefaultCheck" @if ($meta_content->metadefault) checked @endif> Use Default Seo Setting

                                <input type="hidden" value="{{$meta_content->metadefault ?? 0}}" id="metaDefaultValue" name="BlogSeo[metadefault]" />
                            </div>    
                        </div>
                        <div class="tile-content">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group"><label for="inputSearch">Meta Title</label><input type="text" class="form-control" id="MetaTitleField" name="BlogSeo[meta_title]" value="{{$meta_content->meta_title ?? ''}}" oninput="metaTitle()"></div>
                                    <div style="margin:5px 0px;">
                                            <input type="text" class="form-control" style="width:50px; margin:5px 0px; display:inline;" id="metaTitleCharCount" value="0" disabled>   characters. Most search engines use a maximum of 57 chars for the meta title.
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group"><label for="inputSearch">Meta Description</label>
                                        <textarea name="BlogSeo[meta_description]" id="MetaDescField" rows=3 class="form-control" oninput="metaDesc()" data-editor="noeditor">{{$meta_content->meta_description ?? ''}}</textarea>
                                    </div>
                                    <div style="margin:5px 0px;" >
                                            <input type="text" class="form-control" style="width:50px; margin:5px 0px; display:inline;" id="metaDescriptionCharCount" value="0" disabled>   characters. Most search engines use a maximum of 160 chars for the meta description
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group"><label for="inputSearch">Meta Keywords (Comma separated)</label><input type="text" class="form-control" name="BlogSeo[meta_keyword]" value="{{$meta_content->meta_keyword ?? ''}}" placeholder="" ></div>
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
                                        <option value="1" {{ ($blog->status == 1) ? 'selected' : '' }}>Active</option>
                                        <option value="0" {{ ($blog->status == 0) ? 'selected' : '' }}>Inactive</option>
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
                                    <label>Comment Visibility</label>
                                    <select id="inputUserType" name="comment_status" class="form-control">
                                        <option value="1" {{ ($blog->comment_status == 1) ? 'selected' : '' }}>Public</option>
                                        <option value="0" {{ ($blog->comment_status == 0) ? 'selected' : '' }}>Private</option>
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
                                <h4><i class="far fa-images"></i> Featured Image</h4>
                            </div>
                            
                        </div>
                        <div class="tile-content">
                            <div class="row">
                                <div class="col-md-8">
                                    <label>Do you want to show image in single page?</label>
                                </div>
                                <div class="col-md-4">
                                    <select id="inputUserType" name="show_image" class="form-control">
                                        <option value="1" {{ ($blog->show_image == 1) ? 'selected' : '' }}>Yes</option>
                                        <option value="0" {{ ($blog->show_image == 0) ? 'selected' : '' }}>No</option>
                                    </select>
                                </div>
                                <div class="col-md-12 mt-5">
                                    <div class="form-group">
                                        <div class="mb-4 position-relative">
                                            <a class="removeprev" style="display: none;" onclick="removeImageSelection('featured_thumbnail','featured_preview_image','featured_rmvbtn')" id="featured_rmvbtn" href="javascript:void(0);">x</a>
                                            <img src="{{ asset(GetImageUrl($blog->image)) }}" alt="" id="featured_preview_image" class="img-thumbnail" style="display:{{ ($blog->image) ? 'block' : 'none' }};">
                                            <input type="hidden" id="featured_thumbnail" name="image" value="{{ $blog->image }}">
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
    jQuery("#blog_add").validate({
        ignore: [],
        rules: {
            title: {
                required: true,
            },
            slug: {
                required: true,
            },
            'categories[]': {
                required: true,
            },
            'tags[]': {
                required: true,
            },
            author: {
                required: true,
            },
            image: {
                required: true,
            }
        },
        messages: {
            title: {
                required: "Please enter blog name.",
            },
            slug: {
                required: "Please enter slug.",
            },
            'categories[]': {
                required: "Please select a category.",
            },
            'tags[]': {
                required: "Please select a tag.",
            },
            author: {
                required: "Please select an author.",
            },
            image: {
                required: "Please select an image.",
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
