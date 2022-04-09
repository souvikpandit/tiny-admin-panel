<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tiny Dashboard</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('backend/media/bootstrap.min.css') }}">
    <link href="{{asset('backend/media/style.css')}}" rel="stylesheet">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.min.js"></script>
    <![endif]-->
        <link rel="stylesheet" href="{{ asset('backend/media/waitme/waitMe.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('backend/media/select2/dist/css/select2.min.css') }}" />
    
    
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    
    
    <style>
        body{
            background: #eaeaea;
        }
        .header{
            position: initial;
        }
        .ulbar{
             list-style: none;
             display: flex;
             margin-bottom: 0px !important;
             padding-left: 0px;
        }
        .ulli{
             margin: 5px; 
             padding: 10px;
             padding-left: 0px;
        }
        .ula{
             width: 100%!important;
             padding-left: 10px !important;
             padding-right: 10px !important;
             color: #fff !important;
        }
        .ulspan{
             display: initial;
        }
        .ulspan:hover{
            font-weight: 900;
        }
        .active{
             font-weight: 900;
        }
    </style>
    
</head>
    
<body>
    
    



    <header class="header">
        <ul class="ulbar">
            <li class="ulli">
                <a href="{{URL::to("/media/view/$type/image")}}" class="ula">
                    <span class="ulspan @if($media_type == "image") active @endif">Images</span>
                </a>
            </li>
            <li class="ulli">
                <a href="{{URL::to("/media/view/$type/video")}}" class="ula">
                    <span class="ulspan @if($media_type == "video") active @endif">Videos</span>
                </a>
            </li>
            <li class="ulli">
                <a href="{{URL::to("/media/view/$type/pdf")}}" class="ula">
                    <span class="ulspan @if($media_type == "pdf") active @endif">PDF</span>
                </a>
            </li>
        </ul>
        
    </header>


@if (count($all) > 0)

<div class="container">
       <br>
       <label>Select {{$media_type ?? "item"}}</label><br>
      
              
                    <div id="content-scroll" class="content bg-white p-4" style="overflow-y:scroll;height:280px;overflow-x:hidden;">
                        <ul class="img-gallery-thumb" style="display:flex !important; flex-wrap:wrap !important;">
                    
                        @foreach ($all as $media)
                    
                                <li title="{{$media->file_name}}">
                                    <div class="custom-check" title="{{$media->file_name}}">
                                        
                            

                                        @if($media->type != "video")
                                    
                                        <input type="{{($type == "single") ? 'radio' : 'checkbox'}}" id="r{{$loop->iteration}}" name="rr" 
                                        
                                        @if($type == "single")

                                         onchange="fill('{{ ($media->id) }}','{{$media->getImage()}}','{{$media->file_name}}')" value="{{$media->getImage()}}" title="{{$media->file_name}}"

                                        @else 

                                        onchange="multifill(this,'{{ (($media->id)) }}')" value="{{$media->getImage()}}"

                                        @endif
                                        
                                        /><label for="r{{$loop->iteration}}" ><span></span><img src="{{$media->getImage()}}" alt="{{$media->file_name}}" title="{{$media->file_name}}"
                                        style="width: 250px;height:100px" 
                                        ></label>
                                        
                                        @else

                                        <input type="{{($type == "single") ? 'radio' : 'checkbox'}}" id="r{{$loop->iteration}}" name="rr" 
                                        @if($type == "single")
                                            
                                            onchange="fill('{{ ($media->id) }}','{{$media->getImage()}}','{{$media->file_name}}')" value="{{$media->getImage()}}" title="{{$media->file_name}}"

                                        @else 

                                        onchange="multifill(this,'{{ ($media->id) }}')" value="{{$media->getImage()}}"

                                        @endif
                                        value="{{$media->getImage()}}" title="{{$media->file_name}}"/>
                                        
                                        <label for="r{{$loop->iteration}}" >
                                            <span></span>
                                            <video width="100%" controls>
                                                <source src="{{$media->getImage()}}" type="video/mp4">
                                            </video>
                                        </label>
                                       
                                        @endif
                                        
                                                

                                    </div>
                                </li>
                        @endforeach
                        </ul>
                    </div>
            
               <br>
               <div class="col-md-2 col-md-offset-10 col-sm-3 col-sm-offset-9 col-xs-6 col-xs-offset-6">

                       @if ($type == "single")

                        <input 
                        type="button"  
                        name="submit" 
                        class="btn btn-primary btn-block sub1" 
                        value="Insert" 
                        onclick="check()">

                       @elseif($type == "multiple")

                        <input 
                        type="button"  
                        name="submit" 
                        class="btn btn-primary btn-block sub1" 
                        value="Insert" 
                        onclick="multicheck()">

                       @endif
               </div>
               <br><br><br><br>
           
               <form id="singleupload" method="post" enctype="multipart/form-data">
               
               <div class="row">
                   <div class="form-group col-sm-6 col-xs-6 col-lg-6 col-md-6">
                       <input type="file" name="files[]" class="file-input" accept="image/x-png,image/gif,image/jpeg,video/mp4,video/x-m4v" >
                   </div>
                   <div class="form-group col-sm-6 col-xs-6 col-lg-6 col-md-6">
                       <input type="button"  name="submit" class="btn btn-primary btn-block sub1" value="Upload" onclick="call('singleupload')">
                   </div>
               </div>
        
              </form>
              <br><br>
</div>


@else
<br><br><br>
<div class="container text-center">
    <h1>No Media Found !</h1>
    <form id="singleupload" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="form-group col-sm-6 col-xs-6 col-lg-6 col-md-6">
                <input type="file" name="files[]" class="file-input" accept="image/x-png,image/gif,image/jpeg,video/mp4,video/x-m4v" >
            </div>
            <div class="form-group col-sm-6 col-xs-6 col-lg-6 col-md-6">
                <input type="button"  name="submit" class="btn btn-primary btn-block sub1" value="Upload" onclick="call('singleupload')">
            </div>
        </div>       
        
        

    </form>
</div>
@endif


@php
    $callback = $_GET["CKEditorFuncNum"] ?? "";
@endphp

<script type="text/javascript" src="{{asset("backend/media/jquery.min.js")}}"></script>
<script src="{{asset("backend/media/bootstrap.min.js")}}"></script>

<script type="text/javascript" src="{{asset("backend/media/jquery.filer.js")}}"></script>
<script src="{{asset('backend/media/waitme/waitMe.js')}}"></script>

<script>

$('.filer_input101').filer();

var url = "";
var media = { name: "" , image_url: ""};

var ckCallback = '{{$callback}}';

// multiple
var multiurlarray = [];
var multiurlvalue = "";

function fill(link , img , name){
    //alert(link);
    url = link;
    media.image_url = img;
    media.name = name;
}

function removeA(arr) {
        var what, a = arguments, L = a.length, ax;
        while (L > 1 && arr.length) {
            what = a[--L];
            while ((ax= arr.indexOf(what)) !== -1) {
                arr.splice(ax, 1);
            }
        }
        return arr;
}

function multifill(box ,link){
//alert(link);
    if (box.checked) 
    {
        multiurlarray.push(link);
        multiurlvalue = JSON.stringify(multiurlarray)
        console.log(multiurlvalue);

    } else {

        removeA(multiurlarray,link);
        multiurlvalue = JSON.stringify(multiurlarray)
        console.log(multiurlvalue);

    }
}


function check(){
    if(url == ""){
        return;
    }else{

        if(ckCallback){
            window.opener.CKEDITOR.tools.callFunction(ckCallback,media.image_url);
        }else{
            window.opener.UpdateMedia(url,"single",media);
        }

        window.close();
    }
}

function multicheck(){
    //console.log("Hello");
    if(multiurlarray.length == 0){
        return;
    }else{
        window.opener.UpdateMedia(multiurlvalue,"multiple");
        window.close();
    }
}


function call(form) {
            
            
                var form_data = new FormData(document.getElementById(form));
                form_data.append("_token", "{{ csrf_token() }}");
                //form_data.append("api","true");

                $('body').waitMe({
                    effect : 'roundBounce',
                    text : '',
                    bg : 'rgba(255,255,255,0.7)',
                    color : '#000',
                    maxSize : '',
                    textPos : 'vertical',
                    fontSize : '',
                    source : '',
                });


                var url = "{{route('media.store')}}";
                //alert(url);

                // if(!url.includes("https"))
                //         url = url.replace("http", "https");


                $.ajax({
                        url: url,
                        type: 'post',
                        data: form_data,
                        contentType: false,
                        processData: false,
                        success: function (data) {
                           
                            location.reload();

                        }
                });

}
</script>
</body>

</html>