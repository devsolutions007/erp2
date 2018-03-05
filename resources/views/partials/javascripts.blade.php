@inject('request', 'Illuminate\Http\Request')
    

    <!-- Bootstrap Core Js -->
    <script src="{{ url('public/plugins/bootstrap/js/bootstrap.js') }}"></script>

    <!-- Select Plugin Js -->
    <script src="{{ url('public/plugins/bootstrap-select/js/bootstrap-select.js') }}"></script>

    <!-- Multi Select Plugin Js -->
    <script src="{{ url('public/plugins/multi-select/js/jquery.multi-select.js') }}"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="{{ url('public/plugins/jquery-slimscroll/jquery.slimscroll.js') }}"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="{{ url('public/plugins/node-waves/waves.js') }}"></script>

    <!-- Jquery CountTo Plugin Js -->
    <script src="{{ url('public/plugins/jquery-countto/jquery.countTo.js') }}"></script>

    <!-- Morris Plugin Js -->
    <script src="{{ url('public/plugins/raphael/raphael.min.js') }}"></script>
    <script src="{{ url('public/plugins/morrisjs/morris.js') }}"></script>

    <!-- ChartJs -->
    <script src="{{ url('public/plugins/chartjs/Chart.bundle.js') }}"></script>

    @if($request->segment(2) == 'home')
    <!-- Flot Charts Plugin Js -->
    <script src="{{ url('public/plugins/flot-charts/jquery.flot.js') }}"></script>
    <script src="{{ url('public/plugins/flot-charts/jquery.flot.resize.js') }}"></script>
    <script src="{{ url('public/plugins/flot-charts/jquery.flot.pie.js') }}"></script>
    <script src="{{ url('public/plugins/flot-charts/jquery.flot.categories.js') }}"></script>
    <script src="{{ url('public/plugins/flot-charts/jquery.flot.time.js') }}"></script>

    <!-- Sparkline Chart Plugin Js -->
    <script src="{{ url('public/plugins/jquery-sparkline/jquery.sparkline.js') }}"></script>

    <!-- Custom Js -->
    
    <script src="{{ url('public/js/pages/index.js') }}"></script>

    <!-- Demo Js -->
    <script src="{{ url('public/js/demo.js') }}"></script>
    @endif

    <script src="{{ url('public/js/admin.js') }}"></script>
    <!-- Jquery DataTable Plugin Js -->
    <script src="{{ url('public/plugins/jquery-datatable/jquery.dataTables.js') }}"></script>
    <script src="{{ url('public/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js') }}"></script>
    <script src="{{ url('public/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js') }}"></script>
    <script src="{{ url('public/plugins/jquery-datatable/extensions/export/buttons.flash.min.js') }}"></script>
    <script src="{{ url('public/plugins/jquery-datatable/extensions/export/jszip.min.js') }}"></script>
    <script src="{{ url('public/plugins/jquery-datatable/extensions/export/pdfmake.min.js') }}"></script>
    <script src="{{ url('public/plugins/jquery-datatable/extensions/export/vfs_fonts.js') }}"></script>
    <script src="{{ url('public/plugins/jquery-datatable/extensions/export/buttons.html5.min.js') }}"></script>
    <script src="{{ url('public/plugins/jquery-datatable/extensions/export/buttons.print.min.js') }}"></script>

    <!-- Custom Js -->
    <script src="{{ url('public/custom/js/jquery-datatable.js') }}"></script>
    
    <script>
        window._token = '{{ csrf_token() }}';
    </script>