        @if(count($errors)>0)
            <div class="alert alert-danger col-md-6 alert-dismissible" style="width: auto;">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Whoops!</strong> <br>
                @foreach($errors->all() as $error)
                    <strong><i class="fa fa-warning text-danger" aria-hidden="true"></i></strong>{{ $error }}<br>
                @endforeach
            </div>
        @endif

        @if(session()->has('message'))

            <div class="alert alert-success col-md-4  pull-right alert-dismissible message" style="width: auto;">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>{{ session('message') }}</strong>
            </div>

        @endif

        @if(session()->has('msg'))
        {{-- <div class="col-md-4 pull-right" style="text-align: center;">
            <p class="alert alert-danger">{{ session('msg') }}</p>
        </div> --}}
        <div class="alert alert-danger col-md-4 pull-right alert-dismissible message" style="width: auto;">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            {{ session('msg') }}
        </div>
        @endif

        {{-- @if(session()->has('msg_error'))
        <div class="col-md-6 pull-right" style="text-align: center;">
            <p class="alert alert-danger">{{ session('msg_error') }}</p>
        </div>
        <div class="alert alert-danger col-md-4 pull-right alert-dismissible message">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            {{ session('msg_error') }}
        </div>
        @endif --}}
