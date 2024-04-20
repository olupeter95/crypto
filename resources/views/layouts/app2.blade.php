<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Coinshape | Authentication </title>
    <meta name="description" content="World Leading Cryptocurrency Exchange">
    @if (Route::currentRouteName() == 'register')
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    @endif
    
    <link rel="icon" href="/main/images/favicon.png" type="image/png">

    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&display=swap" rel="stylesheet">
    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/assets/css/plugins.css') }}" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->

    <!-- BEGIN PAGE LEVEL /PLUGINS/CUSTOM STYLES -->
    <link href="{{ asset('/assets/css/authentication/form-1.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('/assets/css/forms/theme-checkbox-radio.css') }}" rel="stylesheet" type="text/css" />

    <link href="{{ asset('/assets/css/forms/switches.css') }}" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL /PLUGINS/CUSTOM STYLES -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />


</head>
<body class="form">
    <div class="form-container">
        @yield('content')
    </div>

    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="{{ asset('/assets/js/libs/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ asset('bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/assets/js/authentication/form-1.js') }}"></script>
    <script src="{{ asset('/assets/js/custom.js') }}"></script>
    <script src="//code.tidio.co/u0hz3022l7ebwh378fas0emxxlxqemza.js" async></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->

</body>
</html>