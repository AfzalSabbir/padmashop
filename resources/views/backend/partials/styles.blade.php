  <script type="text/javascript">
  {{-- 
    /************************
     * Don't Delete
     **********************/
    // document.getElementById('_me_').click();
    [ Keep Out of $(document).ready(function)({}); ]
    SideBar Active Helper
    --}}
    // window.onload = function(){
    //   var url = window.location.href;
    //   var str = "#me_";
    //   // console.log(window.location.href.indexOf(str));
    //   if (window.location.href.indexOf(str) == -1){
    //     location.replace(url+str);
    //   }
    // }
  </script>
  {{-- Font-icon css --}}
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

  <link href="https://fonts.maateen.me/solaiman-lipi/font.css" rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css"/>
  
  {{-- Main CSS --}}
  <link rel="stylesheet" type="text/css" href="{{ asset('public/backend/css/main.css') }}">

  {{-- Toastr CSS --}}
  <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">

  <script src="{{ asset('public/backend/js/jquery-3.2.1.min.js') }}"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.5.6/tinymce.min.js"></script>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

  {{-- SimpleBar CSS --}}
  <link rel="stylesheet" href="https://unpkg.com/simplebar@latest/dist/simplebar.css" />

  <link href="{!! asset('public/backend/css/custom.css') !!}" rel="stylesheet" type="text/css" />
  <link href="{!! asset('public/backend/css/chart.css') !!}" rel="stylesheet" type="text/css" />

  <link href="https://fonts.googleapis.com/css?family=Inconsolata" rel="stylesheet">

  <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

  <script type="text/javascript">
   toastr.options = {
    "closeButton": false,
    "debug": false,
    "newestOnTop": true,
    "progressBar": true,
    "positionClass": "toast-top-right",
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "5000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
  }
</script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>