</div> <!-- .wrapper -->
    
    
    <script src="{{ asset('backend/js/jquery.min.js') }}"></script>
    <script src="https://cdn.ckeditor.com/4.17.1/full/ckeditor.js"></script>
    <script src="{{ asset('backend/js/ckfinder/ckfinder.js') }}"></script>
    <script src="{{ asset('backend/js/popper.min.js') }}"></script>
    <script src="{{ asset('backend/js/moment.min.js') }}"></script>
    <script src="{{ asset('backend/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('backend/js/simplebar.min.js') }}"></script>
    <script src='{{ asset('backend/js/daterangepicker.js') }}'></script>
    <script src='{{ asset('backend/js/jquery.stickOnScroll.js') }}'></script>
    <script src="{{ asset('backend/js/tinycolor-min.js') }}"></script>
    <script src="{{ asset('backend/js/config.js') }}"></script>
    <script src="{{ asset('backend/js/d3.min.js') }}"></script>
    <script src="{{ asset('backend/js/topojson.min.js') }}"></script>
    <script src="{{ asset('backend/js/datamaps.all.min.js') }}"></script>
    <script src="{{ asset('backend/js/datamaps-zoomto.js') }}"></script>
    <script src="{{ asset('backend/js/datamaps.custom.js') }}"></script>
    <script src="{{ asset('backend/js/Chart.min.js') }}"></script>
    <script>
      /** full calendar */
      var calendarEl = document.getElementById('calendar');
      if (calendarEl)
      {
        document.addEventListener('DOMContentLoaded', function()
        {
          var calendar = new FullCalendar.Calendar(calendarEl,
          {
            plugins: ['dayGrid', 'timeGrid', 'list', 'bootstrap'],
            timeZone: 'UTC',
            themeSystem: 'bootstrap',
            header:
            {
              left: 'today, prev, next',
              center: 'title',
              right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
            },
            buttonIcons:
            {
              prev: 'fe-arrow-left',
              next: 'fe-arrow-right',
              prevYear: 'left-double-arrow',
              nextYear: 'right-double-arrow'
            },
            weekNumbers: true,
            eventLimit: true, // allow "more" link when too many events
            events: 'https://fullcalendar.io/demo-events.json'
          });
          calendar.render();
        });
      }
    </script>
    <script>
      /* defind global options */
      Chart.defaults.global.defaultFontFamily = base.defaultFontFamily;
      Chart.defaults.global.defaultFontColor = colors.mutedColor;
    </script>
    <script src="{{ asset('backend/js/gauge.min.js') }}"></script>
    <script src="{{ asset('backend/js/jquery.sparkline.min.js') }}"></script>
    <script src="{{ asset('backend/js/apexcharts.min.js') }}"></script>
    <script src="{{ asset('backend/js/apexcharts.custom.js') }}"></script>
    <script src='{{ asset('backend/js/jquery.mask.min.js') }}'></script>
    <script src='{{ asset('backend/js/select2.min.js') }}'></script>
    <script src='{{ asset('backend/js/jquery.steps.min.js') }}'></script>
    <script src='{{ asset('backend/js/jquery.validate.min.js') }}'></script>
    <script src='{{ asset('backend/js/jquery.timepicker.js') }}'></script>
    <script src='{{ asset('backend/js/quill.min.js') }}'></script>
    
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script> --}}
    <script>
      $('.select2').select2(
      {
        theme: 'bootstrap4',
      });
      $('.select2-multi').select2(
      {
        multiple: true,
        theme: 'bootstrap4',
      });
      $('.drgpicker').daterangepicker(
      {
        singleDatePicker: true,
        timePicker: false,
        showDropdowns: true,
        locale:
        {
          format: 'MM/DD/YYYY'
        }
      });
      $('.time-input').timepicker(
      {
        'scrollDefault': 'now',
        'zindex': '9999' /* fix modal open */
      });
      /** date range picker */
      if ($('.datetimes').length)
      {
        $('.datetimes').daterangepicker(
        {
          timePicker: true,
          startDate: moment().startOf('hour'),
          endDate: moment().startOf('hour').add(32, 'hour'),
          locale:
          {
            format: 'M/DD hh:mm A'
          }
        });
      }
      var start = moment().subtract(29, 'days');
      var end = moment();

      function cb(start, end)
      {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
      }
      $('#reportrange').daterangepicker(
      {
        startDate: start,
        endDate: end,
        ranges:
        {
          'Today': [moment(), moment()],
          'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days': [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month': [moment().startOf('month'), moment().endOf('month')],
          'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        }
      }, cb);
      cb(start, end);
      $('.input-placeholder').mask("00/00/0000",
      {
        placeholder: "__/__/____"
      });
      $('.input-zip').mask('00000-000',
      {
        placeholder: "____-___"
      });
      $('.input-money').mask("#.##0,00",
      {
        reverse: true
      });
      $('.input-phoneus').mask('(000) 000-0000');
      $('.input-mixed').mask('AAA 000-S0S');
      $('.input-ip').mask('0ZZ.0ZZ.0ZZ.0ZZ',
      {
        translation:
        {
          'Z':
          {
            pattern: /[0-9]/,
            optional: true
          }
        },
        placeholder: "___.___.___.___"
      });
      // editor
      var editor = document.getElementById('editor');
      if (editor)
      {
        var toolbarOptions = [
          [
          {
            'font': []
          }],
          [
          {
            'header': [1, 2, 3, 4, 5, 6, false]
          }],
          ['bold', 'italic', 'underline', 'strike'],
          ['blockquote', 'code-block'],
          [
          {
            'header': 1
          },
          {
            'header': 2
          }],
          [
          {
            'list': 'ordered'
          },
          {
            'list': 'bullet'
          }],
          [
          {
            'script': 'sub'
          },
          {
            'script': 'super'
          }],
          [
          {
            'indent': '-1'
          },
          {
            'indent': '+1'
          }], // outdent/indent
          [
          {
            'direction': 'rtl'
          }], // text direction
          [
          {
            'color': []
          },
          {
            'background': []
          }], // dropdown with defaults from theme
          [
          {
            'align': []
          }],
          ['clean'] // remove formatting button
        ];
        var quill = new Quill(editor,
        {
          modules:
          {
            toolbar: toolbarOptions
          },
          theme: 'snow'
        });
      }
      // Example starter JavaScript for disabling form submissions if there are invalid fields
      (function()
      {
        'use strict';
        window.addEventListener('load', function()
        {
          // Fetch all the forms we want to apply custom Bootstrap validation styles to
          var forms = document.getElementsByClassName('needs-validation');
          // Loop over them and prevent submission
          var validation = Array.prototype.filter.call(forms, function(form)
          {
            form.addEventListener('submit', function(event)
            {
              if (form.checkValidity() === false)
              {
                event.preventDefault();
                event.stopPropagation();
              }
              form.classList.add('was-validated');
            }, false);
          });
        }, false);
      })();
    </script>
    <script>
      var uptarg = document.getElementById('drag-drop-area');
      if (uptarg)
      {
        var uppy = Uppy.Core().use(Uppy.Dashboard,
        {
          inline: true,
          target: uptarg,
          proudlyDisplayPoweredByUppy: false,
          theme: 'dark',
          width: 770,
          height: 210,
          plugins: ['Webcam']
        }).use(Uppy.Tus,
        {
          endpoint: 'https://master.tus.io/files/'
        });
        uppy.on('complete', (result) =>
        {
          console.log('Upload complete! We’ve uploaded these files:', result.successful)
        });
      }
    </script>
    <script src="{{ asset('backend/js/apps.js') }}"></script>

    {{-- Parmalink --}}
<script>
if(document.getElementById("parmalink")!=null){
    var parmalink = document.getElementById("parmalink"),
        parmalinkBtn = document.getElementById("parmalinkBtn"),
        slugValue = document.getElementById("slugValue"),
        iseditingSlug = false,
        mainParmaLinkHref = parmalink.href,
        slugInput = document.getElementById("slugInput"),
        parmalinkLabel = document.getElementById("parmalinkLabel");
}
    


    function EditSlug(){

        if(iseditingSlug){

            iseditingSlug = false;
            parmalink.href = mainParmaLinkHref;
            parmalink.target = "_blank";
            parmalink.appendChild(slugValue);
            parmalinkBtn.innerHTML = "<i class='fas fa-edit'></i> Edit";
            slugValue.contentEditable = false;
            slugValue.style.cursor = "pointer";
            slugInput.value = slugValue.innerText;
      
        }else{

            iseditingSlug = true;
            parmalink.href = "javascript:void(0)";
            parmalink.target = "";
            parmalinkBtn.innerHTML = "<i class='fas fa-check'></i> Save";
            parmalinkLabel.appendChild(slugValue);
            slugValue.contentEditable = true;
            slugValue.style.outline = "none";
            slugValue.style.cursor = "text";
            slugValue.focus();
            slugValue.innerText = slugValue.innerText;
        }

    }

</script>

<script>
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
</script>


<script>
    $(document).ready(function(){

        $('.select2').select2();
    });
</script>
<script>  
  var cked = CKEDITOR.replaceAll( 'editor' ); 
  CKFinder.setupCKEditor(cked);
</script>
<script>
    // // get a new date (locale machine date time)
    if(document.getElementById('time')!=null){
        var date = new Date();
        // get the date as a string
        var n = date.toDateString();
        // get the time as a string
        var time = date.toLocaleTimeString();
        
        // find the html element with the id of time
        // set the innerHTML of that element to the date a space the time
        document.getElementById('time').innerHTML = n + ' | ' + time;    
    }
    // // // // // // // // // // // 
</script>
<script>
            $(document).ready(function () {
             $("#title").keyup(function(){
                  var title = $(this).val().toLowerCase();
                  var newString = title.replace(/[_\W]+/g, "-");
                  
                  $("#slug").val(newString);

              })
            })
        </script>

<script>
    window.setTimeout(function() {
    $(".message").fadeTo(1000, 0).slideUp(1000, function(){
        $(this).remove();
    });
}, 5000);

</script>

<!-- Datatable -->
<script src="{{ asset('backend/js/datatable/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('backend/js/datatable/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('backend/js/datatable/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('backend/js/datatable/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('backend/js/datatable/bootstrap-editable.min.js') }}"></script>
<script src="{{ asset('backend/js/datatable/bootstrap-confirmation.min.js') }}"></script>
<script>
		$(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': '{{csrf_token()}}'
                }
            });
            
            $('.xedit').editable({
                url: '{{url("media/update")}}',
                title: 'Update',
                success: function (response, newValue) {
                    console.log('Updated', response)
                }
            });

    })
	</script>
<script>
    $(document).ready(function() {
        $('.page-table').DataTable({
   'aoColumnDefs': [{
        'bSortable': false,
        'aTargets': [-1],
    }],
     "columnDefs": [{
      "targets": 0,
      "orderable": false,
      "searchable": false
        
    },{ targets: 'no-sort', orderable: false }]
});
    });
</script>


<script>
        function fileValidation() {
            var fileInput =
                document.getElementById('customFile');

            var filePath = fileInput.value;

            // Allowing file type
            var allowedExtensions =
                    /(\.xlsx|\.xls|\.csv)$/i;

            if (!allowedExtensions.exec(filePath)) {
                alert('Invalid file type. Please Select .xls, .xlsx, .csv file format to upload.');
                fileInput.value = '';
                return false;
            }
            else
            {

                // Image preview
                if (fileInput.files && fileInput.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        document.getElementById(
                            'imagePreview').innerHTML =
                            '<img src="' + e.target.result
                            + '"/>';
                    };

                    reader.readAsDataURL(fileInput.files[0]);
                }
            }
        }
    </script>
{{-- Media --}}
<script>
    
var Media_input , Media_preview, Media_remove;
var Media_array = [];

function Media(input_id = "media_input" , preview_image_id = "media_preview_image" , remove_btn="rmv_btn", type = "single" ,media_type = "image"){
//alert(remove_btn);
    var url = "{{URL::to('media/view/')}}";


    // if(!url.includes("https"))
    //    url = url.replace("http", "https");
   

    if(type == "single"){
        window.open(`${url}/single/${media_type}`,"Media","width=700,height=630");
        Media_input = input_id;
        //alert(Media_input);
        Media_preview = preview_image_id;
        Media_remove = remove_btn;
        
    }else if(type == "multiple"){
        window.open(`${url}/multiple/${media_type}`,"Media","width=700,height=630");
        Media_input = input_id;
        Media_preview = preview_image_id;
    }
   
}

function UpdateMedia(item , type = "single" , media = {}){

    if(type == "single"){
        document.getElementById(Media_input).value = item;

        if(document.getElementById(Media_preview)){
            document.getElementById(Media_remove).style.display="block";
            document.getElementById(Media_preview).style.display="block";
            document.getElementById(Media_preview).src = media.image_url;
        }
       
        if(document.getElementById("media_name")){
            document.getElementById("media_name").value = media.name
            document.getElementById("media_name_preview").innerText = media.name
        }

    }else if(type == "multiple"){
        var items = JSON.parse(item);
        var html = "";

        items.forEach((link,index) => {
            html += `
        
                <div class="col-md-3" style="margin-bottom:10px" id="box${index}">
                  <img src="${link}" alt="" >
                </div>
                

            `;
            Media_array.push(link);
        });

        let mainValue = JSON.parse(document.getElementById(Media_input).value || "[]");
        mainValue = [...mainValue ,...Media_array];
        //console.log(mainValue);
        Media_array = []
        document.getElementById(Media_input).value = JSON.stringify(mainValue);

        if(document.getElementById(Media_preview)){
        document.getElementById(Media_preview).innerHTML += html
        }
    }

}
function removeImageSelection(inputID , imgTagID, removeBtnId){
//alert(removeBtnId);
document.getElementById(inputID).value = "";
document.getElementById(imgTagID).src = "";
document.getElementById(removeBtnId).style.display="none";
document.getElementById(imgTagID).style.display="none";
}
</script>

<script>
    // Meta Setup
    $( document ).ready(function() {        
        document.getElementById("metaTitleCharCount").value = document.getElementById("MetaTitleField").value.length;
        document.getElementById("metaDescriptionCharCount").value = document.getElementById("MetaDescField").value.length;
        
    });
    function metaTitle(){
        document.getElementById("metaTitleCharCount").value = document.getElementById("MetaTitleField").value.length;
        }

        function metaDesc(){
            document.getElementById("metaDescriptionCharCount").value = document.getElementById("MetaDescField").value.length;
        }
    

if(document.getElementById("metaDefaultCheck")!=null){
    document.getElementById("metaDefaultCheck").addEventListener("input", (event)=>{
       
       if(event.target.checked){
           document.getElementById("metaDefaultValue").value = 1;
       }else{
           document.getElementById("metaDefaultValue").value = 0;
       }
  
    });
}
    


</script>

<script type="text/javascript">
    $(document).ready(function () {


        $('#master').on('click', function(e) {
         if($(this).is(':checked',true))
         {
            $(".sub_chk").prop('checked', true);
         } else {
            $(".sub_chk").prop('checked',false);
         }
        });


        $('.delete_all').on('click', function(e) {


            var allVals = [];
            $(".sub_chk:checked").each(function() {
                allVals.push($(this).attr('data-id'));
            });


            if(allVals.length <=0)
            {
                alert("Please select row.");
            }  else {


                var check = confirm("Are you sure!! you want to delete this row?");
                if(check == true){


                    var join_selected_values = allVals.join(",");

                    $.ajax({
                        url: $(this).data('url'),
                        type: 'DELETE',
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        data: 'ids='+join_selected_values,
                        success: function (data) {
                            if (data['success']) {
                                $(".sub_chk:checked").each(function() {
                                    $(this).parents("tr").remove();
                                });
                                alert(data['success']);
                            } else if (data['error']) {
                                alert(data['error']);
                            } else {
                                alert('Whoops Something went wrong!!');
                            }
                        },
                        error: function (data) {
                            alert(data.responseText);
                        }
                    });


                  $.each(allVals, function( index, value ) {
                      $('table tr').filter("[data-row-id='" + value + "']").remove();
                  });
                }
            }
        });


        $('[data-toggle=confirmation]').confirmation({
            rootSelector: '[data-toggle=confirmation]',
            onConfirm: function (event, element) {
                element.trigger('confirm');
            }
        });


        $(document).on('confirm', function (e) {
            var ele = e.target;
            e.preventDefault();


            $.ajax({
                url: ele.href,
                type: 'DELETE',
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                success: function (data) {
                    if (data['success']) {
                        $("#" + data['tr']).slideUp("slow");
                        alert(data['success']);
                    } else if (data['error']) {
                        alert(data['error']);
                    } else {
                        alert('Whoops Something went wrong!!');
                    }
                },
                error: function (data) {
                    alert(data.responseText);
                }
            });


            return false;
        });
    });
</script>
<script>
  function copyToClipboard(element) {
  var $temp = $("<input>");
  $("body").append($temp);
  $temp.val($(element).text()).select();
  document.execCommand("copy");
  $temp.remove();
}
</script>
    @stack('scripts')

  </body>
</html>

