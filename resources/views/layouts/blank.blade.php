<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Gentellela Alela! | </title>

    <!-- Bootstrap -->
    <link href="{{ asset("css/bootstrap.min.css") }}" rel="stylesheet">
<!-- Font Awesome
        <link href="{{ asset("css/font-awesome.min.css") }}" rel="stylesheet">
        <!-- Custom Theme Style -->
    <link href="{{ asset("css/gentelella.min.css") }}" rel="stylesheet">

    @stack('stylesheets')

</head>

<body class="nav-md">
<div class="container body">
    <div class="main_container">

        @include('includes/sidebar')

        @include('includes/topbar')

        @yield('main_container')

        @include('includes/footer')

    </div>
</div>

<!-- jQuery -->
<script src="{{ asset("js/jquery.min.js") }}"></script>
<!-- Popper.JS -->
<script src="https://unpkg.com/popper.js"></script>
<!-- Bootstrap -->
<script src="{{ asset("js/bootstrap.min.js") }}"></script>
<!-- Custom Theme Scripts -->
<script src="{{ asset("js/gentelella.min.js") }}"></script>

<script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>



@if(Session('success'))
    <span id="success-msg" data-msg="{{Session('success')}}"></span>
    <script src="js/sweetalert2.all.js"></script>
    <script>
        swal('Tudo certo!', $("#success-msg").attr('data-msg'), 'success')
    </script>
@elseif(Session('error'))
    <script src="js/sweetalert2.all.js"></script>
    <span id="error-msg" data-msg="{{Session('error')}}"></span>
    <script>
        swal('Oops...', $("#error-msg").attr('data-msg'), 'error')
    </script>
@endif

@stack('scripts')

</body>
</html>