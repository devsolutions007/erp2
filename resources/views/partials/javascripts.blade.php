@inject('request', 'Illuminate\Http\Request')
    <!-- jQuery first, then Tether, then other JS. -->
    
    <script src="{{ asset('js/tether.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('vendor/unifyMenu/unifyMenu.js') }}"></script>
    <script src="{{ asset('vendor/onoffcanvas/onoffcanvas.js') }}"></script>
    <script src="{{ asset('js/moment.js') }}"></script>

    <!-- Slimscroll JS -->
    <script src="{{ asset('vendor/slimscroll/slimscroll.min.js') }}"></script>
    <script src="{{ asset('vendor/slimscroll/custom-scrollbar.js') }}"></script>
    @if(Request::is('/'))
    <!-- Chartist JS -->
    <script src="{{ asset('vendor/chartist/js/chartist.min.js') }}"></script>
    <script src="{{ asset('vendor/chartist/js/chartist-tooltip.js') }}"></script>
    <script src="{{ asset('vendor/chartist/js/custom/custom-line-chart.js') }}"></script>
    <script src="{{ asset('vendor/chartist/js/custom/custom-line-chart1.js') }}"></script>
    <script src="{{ asset('vendor/chartist/js/custom/custom-area-chart.js') }}"></script>
    <script src="{{ asset('vendor/chartist/js/custom/donut-chart2.js') }}"></script>
    <script src="{{ asset('vendor/chartist/js/custom/custom-line-chart4.js') }}"></script>
    @endif
    <!-- jQuery UI -->
    <script src="{{ asset('js/jquery-ui.min.js') }}"></script>
    <!-- Common JS -->
    <script src="{{ asset('js/common.js') }}"></script>
    <script src="{{ asset('js/bootstrap-datepicker.js') }}"></script>
    <script type="text/javascript">
        //Datepicker
        $(function() {
            $(".bs-datepicker").datepicker();
        });
        // color picker
        $('.colorpicker1').colorpicker();
        $('#colorpicker1').colorpicker();
    </script>
    <!-- grow js -->
    <script src="{{ asset('custom/grow/js/process.js') }}"></script>

    <script>
        window._token = '{{ csrf_token() }}';
    </script>