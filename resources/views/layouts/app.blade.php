<!doctype html>
<html lang="en">
    <head>
        @include('partials.head')
    </head>
    <body>

        <!-- Loading starts -->
        <div class="loading-wrapper">
            <div class="loading">
                <div class="img"></div>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
        <!-- Loading ends -->

        <!-- BEGIN .app-wrap -->
        <div class="app-wrap">
            <!-- BEGIN .app-heading -->
            @include('partials.topbar')
            <!-- END: .app-heading -->
            <!-- BEGIN .app-container -->
            <div class="app-container">
                <!-- BEGIN .app-side -->
                @include('partials.sidebar')
                <!-- END: .app-side -->

                <!-- BEGIN .app-main -->
                <div class="app-main">
                    <!-- BEGIN .main-heading -->
                     @include('partials.header')
                    <!-- END: .main-heading -->
                    <!-- BEGIN .main-content -->
                    <!-- @if (Session::has('message'))
                    <div class="note note-info">
                        <p>{{ Session::get('message') }}</p>
                    </div>
                    @endif -->
                    @if ($errors->count() > 0)
                        <div class="note note-danger">
                            <ul class="list-unstyled">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="main-content">
                        @yield('content')
                    </div>
                    <!-- END: .main-content -->
                </div>
                <!-- END: .app-main -->
            </div>
            <!-- END: .app-container -->
            <!-- BEGIN .main-footer -->

            @include('partials.footer')
            <!-- END: .main-footer -->
        </div>
        <!-- END: .app-wrap -->
        {!! Form::open(['route' => 'auth.logout', 'style' => 'display:none;', 'id' => 'logout']) !!}
        <button type="submit">Logout</button>
        {!! Form::close() !!}
        <!-- Include Javascript -->
        @include('partials.javascripts')
    </body>
</html>