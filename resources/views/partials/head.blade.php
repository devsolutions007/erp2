    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="Hotbox app" />
    <meta name="keywords" content="Hotbox app" />
    <meta name="author" content="Hotbox" />
    <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}" />
    <title>{{ trans('global.global_title') }}</title>
    
    <!-- Common CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('fonts/icomoon/icomoon.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/main.css') }}" />

    <!-- Color picker css -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap-colorpicker.min.css') }}" />
    
    <!-- Datepickers css -->
    <link rel="stylesheet" href="{{ asset('css/jquery-ui.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/bootstrap-datepicker.css') }}" />

    <!--  Custom css -->
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}" />

    <!-- Other CSS includes plugins - Cleanedup unnecessary CSS -->
    <!-- Chartist css -->
    <link href="{{ asset('vendor/chartist/css/chartist.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('vendor/chartist/css/chartist-custom.css') }}" rel="stylesheet" />

    <script src="{{ asset('js/jquery.js') }}"></script>
    <style type="text/css">
        .ui-autocomplete { z-index:2147483647; }
    </style>

    <!-- sweet alert -->
    <link rel="stylesheet" href="{{ asset('vendor/sweetalert/sweetalert.css') }}">
    @if (Request::is('grow/*'))
    <!--  grow page custom css -->
    <link rel="stylesheet" href="{{ asset('custom/grow/css/custom.css') }}"> 
    <!--  end -->
    @endif

    <!-- Data Tables -->
    <link rel="stylesheet" href="{{ asset('vendor/datatables/dataTables.bs4.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/datatables/dataTables.bs4-custom.css') }}" />