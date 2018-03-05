<!DOCTYPE html>
<html lang="en">

<head>
    @include('partials.head')
</head>

<body class="login-page">
    <div class="login-box">
        <div class="logo">
            <a href="javascript:void(0);">Admin<b>{{ trans('global.global_title') }}</b></a>
            <small>{{ trans('global.global_title') }}</small>
        </div>
        @yield('content')
    </div>

     @include('partials.javascripts')
</body>

</html>