@extends('admin.layout.app')

@section('headerSection')

@endsection

@section('main-content')
<main role="main" class="main-content">
  <div class="row">

    <div class="col-xl-12 col-lg-12 col-md-12">
      <div class="card shadow mb-4">
        <div class="card-body">
          <div class="tile mb30">
              <div class="tile-title-w-btn">
                  <div class="title">
                      <h3><i class="far fa-file"></i> Page</h3>
                  </div>
                  @include('includes.message')
                  <ul class="list-inline">
                      <li class="list-inline-item"><button class="btn btn-danger btn-oval delete_all" data-url="{{ route('pageDeleteAll') }}"><i class="feather icon-trash"></i> Bulk Delete</button></li>
                      <li class="list-inline-item"><a href="{{ route('page.add') }}" class="btn btn-primary btn-oval trigger-button"><i class="lni-plus"></i> Add New</a></li>
                  </ul>
              </div>

              <div class="tile-content">
                  <div id="departmentsList">
                      <table id="myTable" class="table table-striped table-bordered dt-responsive nowrap page-table" cellspacing="0" width="100%">
                                      
                          <thead class="bg-danger">
                              <tr class="text-danger">
                                  <th style="width:5%"><input type="checkbox" id="master"></th>
                                  <th>Name</th>
                                  
                                  <th>Date</th>
                                  <th>Status</th>
                                  <th style="width:15%;" class="no-sort">Action</th>
                                  
                              </tr>
                          </thead>
                          <tbody>
                            @foreach ($pages as $page)
                              <tr id="tr_{{$page->id}}">
                                  <td><input type="checkbox" class="sub_chk" data-id="{{$page->id}}"></td>
                                  <td>{{$page->name}}</td>
                                  
                                  <td>{{GetFormatedDate($page->created_at)}}</td>
                                  <td>
                                      @if($page->status == 1)
                                      <a class="btn-sm btn-success text-white">Active</a>
                                      @else
                                      <a class="btn-sm btn-danger text-white">Inactive</a>
                                      @endif
                                  </td>
                                  <td>
                                      <a class="btn btn-sm btn-warning" href="{{ route('page.edit',$page->id) }}"><i class="feather icon-edit"></i> Edit</a>
                                      
                                      
                                      <form id="delete-form-{{$page->id}}" method="POST" action="{{ route('page.destroy',$page->id) }}" style="display: none">
                                          @csrf
                                          
                                      </form>
                                      <a class="btn btn-sm btn-danger" href="" onclick="if(confirm('You Want to Delete This ?')){event.preventDefault();document.getElementById('delete-form-{{$page->id}}').submit();}else{event.preventDefault();}"><i class="feather icon-trash"></i> Delete</a>
                                      
                                  </td>
                                
                              </tr>
                              @endforeach
                              
                          </tbody>
                      </table>
                      <div id="pagination" class="mt10"></div>
                  </div>
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
@section('footerSection')

@endsection