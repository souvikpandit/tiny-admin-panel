@extends('admin.layout.app')

@section('main-content')
<main role="main" class="main-content">
  <div class="row">

    <div class="col-xl-12 col-lg-12 col-md-12">
      <div class="card shadow mb-4">
        <div class="card-body">
          <div class="tile mb30">
              <div class="tile-title-w-btn">
                  <div class="title">
                      <h3><i class="far fa-file"></i> All Media</h3>
                  </div>
                  @include('includes.message')
                  <ul class="list-inline">
                      <li class="list-inline-item"><button class="btn btn-danger btn-oval delete_all" data-url="{{ route('mediaDeleteAll') }}"><i class="feather icon-trash"></i> Bulk Delete</button></li>
                      <li class="list-inline-item"><a href="{{ route('media.add') }}" class="btn btn-primary btn-oval trigger-button"><i class="lni-plus"></i> Add New</a></li>
                  </ul>
              </div>

              <div class="tile-content">
                  <table id="myTable" class="page-table table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">                        
                    <thead>
                        <tr>
                            <th style="width:5%" class="no-sort"><input type="checkbox" id="master"></th>
                            <th class="no-sort">Image</th>
                            <th>Url</th>
                            <th>Date</th>
                            <th>Alt Tag</th>
                            <th>Status</th>
                            <th style="width:15%;">Action</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($medias as $media)
                        <tr id="tr_{{$media->id}}">
                            <td><input type="checkbox" class="sub_chk" data-id="{{$media->id}}"></td>
                            <td><img style="width:50px;" src="{{ asset('storage/media/'.$media->name) }}" class="img-thumbnail"></td>
                            <td><p style="display:none;" id="td_{{$media->id}}">{{ asset('storage/media/'.$media->name) }}<p><button class="btn mb-2 btn-outline-secondary" onclick="copyToClipboard('#td_{{$media->id}}')"><span class="fe fe-arrow-down fe-16 mr-2"></span>Copy URL</button></td>
                            <td>{{GetFormatedDate($media->created_at)}}</td>
                            <td>
                            <a href="#" class="xedit" data-pk="{{$media->id}}" data-name="alt_tag">{{$media->alt_tag}}</a>
                            </td>
                            <td>
                                @if($media->status == 1)
                                    <a class="btn-sm btn-success text-white">Active</a>
                                @else
                                    <a class="btn-sm btn-danger text-white">Inactive</a>
                                @endif
                            </td>
                            <td>
                                <form id="delete-form-{{$media->id}}" method="POST" action="{{ route('media.destroy',$media->id) }}" style="display: none">
                                    @csrf                                   
                                </form>
                                <a class="btn btn-sm btn-danger" href="" onclick="if(confirm('You Want to Delete This Media?')){event.preventDefault();document.getElementById('delete-form-{{$media->id}}').submit();}else{event.preventDefault();}"><i class="feather icon-trash"></i> Delete</a>                                                               
                            </td>                        
                        </tr>
                        @endforeach
                        
                    </tbody>
                </table>
              </div>
              <div class="tile-overlay" style="display: none;">
                  <div class="m-loader mr-2"><svg class="m-circular" viewBox="25 25 50 50">
                          <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="4" stroke-miterlimit="10"></circle>
                      </svg></div>
                  <h3 class="l-text">Loading</h3>
              </div>
          </div>
        </div>
      </div>        
    </div>
  </div>
  <div id="sidePanel" class="side-panel" style="position: fixed; width: 700px; transition: all 300ms ease 0s; height: 100%; top: 0px; right: -700px; z-index: 1049;">
      <div class="side-panel-content-holder">
          <div class="side-panel-loader" id="sidePanelLoader">
              <div class="loader-ripple">
                  <div></div>
                  <div></div>
              </div>
          </div>
          <div class="side-panel-content" id="sidePanelContent"></div>
      </div>
  </div>
        
</main> <!-- main -->
@endsection
