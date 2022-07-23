<!doctype html>
<html lang="en" dir="ltr">
	<head>

		<!-- META DATA -->
		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="description" content="Zanex – Bootstrap  Admin & Dashboard Template">
		<meta name="author" content="Spruko Technologies Private Limited">
		<meta name="keywords" content="admin, dashboard, dashboard ui, admin dashboard template, admin panel dashboard, admin panel html, admin panel html template, admin panel template, admin ui templates, administrative templates, best admin dashboard, best admin templates, bootstrap 4 admin template, bootstrap admin dashboard, bootstrap admin panel, html css admin templates, html5 admin template, premium bootstrap templates, responsive admin template, template admin bootstrap 4, themeforest html">
		<meta name="csrf-token" content="{{ csrf_token() }}" />
		
		<!-- FAVICON -->
		<link rel="shortcut icon" type="image/x-icon" href="{{asset('images/icon/icon.png')}}" />

		<!-- TITLE -->
		<title>Dashboard</title>
        <!-- style -->
        @include('components.style')
        <!-- end style -->
		@yield('css')
	</head>

	<body>
        @include('components.sidebar')

        <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
            @include('components.navbar')
		    @yield('content')
        </main>

        <!-- script -->
        @include('components.script')
		@yield('js')
	</body>
</html>