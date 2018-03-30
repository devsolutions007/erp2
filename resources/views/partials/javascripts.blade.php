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
            $(".bs-datepicker").datepicker("getDate");
        });
    </script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <!-- grow js -->
    <script src="{{ asset('custom/grow/js/process.js') }}"></script>

    <!-- jquery  validation  plugin-->
    <script src="{{ asset('js/jquery.validate.js') }}" type="text/javascript"></script>

    <!-- jquery form validation -->
    <script src="{{ asset('js/formValidate.js') }}" type="text/javascript"></script>
    
    <script>
        window._token = '{{ csrf_token() }}';
    </script>

    <!-- sweet alert -->
    <script type="text/javascript" src="{{ asset('vendor/sweetalert/sweetalert.min.js') }}"></script>
    @if (Request::path() == 'grow/settings/room')

    <!-- Grow JS -->
    <script src="{{ asset('custom/grow/js/jquery.plainmodal.min.js') }}"></script>

    <script type="text/javascript" src="{{ asset('custom/grow/mgt-gui/js/common/dragscroll.js') }}"></script>
    <script type="text/javascript" src="{{ asset('custom/grow/mgt-gui/js/common/jspdf.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('custom/grow/mgt-gui/js/engine/SvgCreatorLibrary.js') }}"></script>
    <script type="text/javascript" src="{{ asset('custom/grow/mgt-gui/js/engine/GrowEnum.js') }}"></script>
    <script type="text/javascript" src="{{ asset('custom/grow/mgt-gui/js/engine/GrowPlant.js') }}"></script>
    <script type="text/javascript" src="{{ asset('custom/grow/mgt-gui/js/engine/GrowRoom.js') }}"></script>
    <script type="text/javascript" src="{{ asset('custom/grow/mgt-gui/js/engine/GrowMatrix.js') }}"></script>
    <script type="text/javascript" src="{{ asset('custom/grow/mgt-gui/js/engine/GrowGUI.js') }}"></script>
    <script type="text/javascript" src="{{ asset('custom/grow/mgt-gui/js/engine/GrowGUIConstant.js') }}"></script>
    <script type="text/javascript" src="{{ asset('custom/grow/mgt-gui/js/engine/GrowGUIBox.js') }}"></script>
    <script type="text/javascript" src="{{ asset('custom/grow/mgt-gui/js/engine/GrowModal.js') }}"></script>
    <script type="text/javascript" src="{{ asset('custom/grow/mgt-gui/js/engine/GrowModalUpload.js') }}"></script>
    <script type="text/javascript" src="{{ asset('custom/grow/mgt-gui/js/engine/GrowGUI.proto.js') }}"></script>
    <script type="text/javascript" src="{{ asset('custom/grow/mgt-gui/js/engine/GrowToolbar.js') }}"></script>
    <script type="text/javascript" src="{{ asset('custom/grow/mgt-gui/js/engine/GrowToolbar.Proto.js') }}"></script>
    <script type="text/javascript" src="{{ asset('custom/grow/mgt-gui/js/engine/GrowToolbarUpload.Proto.js') }}"></script>
    <script type="text/javascript" src="{{ asset('custom/grow/mgt-gui/js/engine/GrowBuild.js') }}"></script>
    <script type="text/javascript" src="{{ asset('custom/grow/mgt-gui/js/engine/GrowBuild.Proto.js') }}"></script>
    <script type="text/javascript" src="{{ asset('custom/grow/mgt-gui/js/engine/GrowPalette.js') }}"></script>
    <script type="text/javascript" src="{{ asset('custom/grow/mgt-gui/js/engine/ShareFloatPlant.js') }}"></script>
    <script type="text/javascript" src="{{ asset('custom/grow/mgt-gui/js/engine/ShareAction.js') }}"></script>
    <script type="text/javascript" src="{{ asset('custom/grow/mgt-gui/js/engine/LayoutControl.js') }}"></script>
    <script type="text/javascript" src="{{ asset('custom/grow/mgt-gui/js/engine/LayoutControlAction.Proto.js') }}"></script>

    <script type="text/javascript" src="{{ asset('custom/grow/mgt-gui/js/GuiFilter.js') }}"></script>
    <script type="text/javascript" src="{{ asset('custom/grow/mgt-gui/js/GuiFilter_display.js') }}"></script> 
    @endif