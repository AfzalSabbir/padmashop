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

<script src="{{ asset('public/backend/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('public/backend/js/main.js') }}"></script>
<script src="{{ asset('public/backend/js/plugins/pace.min.js') }}"></script>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script src="{{ asset('public/js/app.js') }}"></script>

<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
<script charset="utf-8" type="text/javascript" src="http://torifat.github.io/jsAvroPhonetic/libs/avro-keyboard/dist/avro-v1.1.4.min.js"></script>
<script src="{{ asset('public/backend/js/plugins/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('public/backend/js/plugins/select2.min.js') }}"></script>
<script src="{{ asset('public/backend/js/custom.js') }}"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>

{{-- SimpleBar Script --}}
<script src="https://unpkg.com/simplebar@latest/dist/simplebar.js"></script>

<script>
	$(document).ready(function() {
    $('.select2').select2();

    var table = $('#datatable').DataTable({
          // "scrollY": "350px",
          "paging": true,
          "pageLength": 50,
          "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
        });

    $('a.toggle-vis').on( 'click', function (e) {
     e.preventDefault();

        // Get the column API object
        var column = table.column( $(this).attr('data-column') );

        // Toggle the visibility
        column.visible( ! column.visible() );
      });
 });
</script>
<script type="text/javascript">
  $(document).ready(function() {

    {{-- ToolTip --}}
    $("body").tooltip({ selector: '[data-toggle=tooltip]' });

    {{-- SideBar Scroll Heplper --}}
    $(".simplebar-content").click(function(){
      if ($(".simplebar-offset").css('bottom') == '-17px') {
        document.getElementById('app-sidebar__toggle').click();
      }
    });
    $(".simplebar-content").hover(function(){
      if ($(".simplebar-offset").css('bottom') == '-17px') {
        document.getElementById('app-sidebar__toggle').click();
      }
    });

  });
</script>
<script>
  vm = this;
  tinymce.init({
    selector:'#description' ,
    height: 300,
    plugins: 'codesample code print preview fullpage searchreplace autolink directionality visualblocks visualchars fullscreen image link media codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists textcolor wordcount imagetools contextmenu colorpicker textpattern',
    toolbar: 'codesample bold italic hr forecolor backcolor | autolink | link image | alignleft aligncenter alignright | numlist bullist | preview code',
    image_advtab: true,
    menubar:false,
    setup: function(editor){
      editor.on('keyup', function(e){
        vm.model = editor.getContent();
      })
    }
  });
  function cl(xx) {
    console.log(xx);
  }
</script>
<style type="text/css" media="screen">
  .mce-panel{
    border: none !important;
  }
  .mce-tinymce {
    border-right: 2px solid #f0f0f0 !important;
    border-left: 2px solid #f0f0f0 !important;
    box-sizing: content-box !important;
    border-radius: 4px !important;
    overflow: hidden !important;
  }
  .mic-container_ {
    padding: 0 4px;
    height: 205px;
  }
  .mce-branding-powered-by{
    display: none;
  }
</style>

