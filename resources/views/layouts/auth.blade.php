<!DOCTYPE html>
<html lang="en">

<head>
    @include('partials.head')
</head>

<body class="login-bg">

	<div class="container">
		<div class="login-screen row align-items-center">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
				@if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were problems with input:
                    <br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
	            @endif
				@yield('content')
			</div>
		</div>
	</div>
	@include('partials.footer')
    @include('partials.javascripts')
</body>

</html>