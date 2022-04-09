@extends('admin.layout.app')
@section('main-content')
<main role="main" class="main-content">
        <div class="container-fluid">
          <div class="row justify-content-center">
            <div class="col-12">
              <h2 class="page-title">Media Uploads</h2>
              <form action="{{ route('media.store') }}" id="media_add" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="row mb-4">
                
                <div class="col-md-8">
                  <div class="card shadow mb-4">
                    <div class="card-header">
                      <strong>Upload File (Eg: PDF, JPG, PNG etc)</strong>
                    </div>
                    <div class="card-body">                      
                        <input type="file" name="files[]" multiple="">
                        <button type="submit" class="btn btn-primary">Upload</button>                      
                    </div> <!-- .card-body -->
                  </div> <!-- .card -->
                </div> <!-- .col -->
                  

              </div> <!-- .row -->
              </form> 
            </div>
          </div> <!-- .row -->
        </div> <!-- .container-fluid -->
      </main> <!-- main -->
@endsection