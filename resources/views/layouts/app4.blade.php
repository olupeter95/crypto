<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Coinshape </title>
    <link rel="icon" type="image/x-icon" href="{{ asset('/assets/img/favicon.ico') }}"/>
    <link href="{{ asset('/assets/css/loader.css') }}" rel="stylesheet" type="text/css" />
    <script src="{{ asset('/assets/js/loader.js') }}"></script>

    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&display=swap" rel="stylesheet">
    <link href="{{ asset('/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/assets/css/plugins.css') }}" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->

    <!-- BEGIN PAGE LEVEL /PLUGINS/CUSTOM STYLES -->
    <link href="{{ asset('plugins/editors/quill/quill.snow.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{ asset('/assets/css/apps/todolist.css') }}">
    <!-- toastr -->
    <link href="/plugins/notification/snackbar/snackbar.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        #formValidate .wizard > .content {min-height: 25em;}
        #example-vertical.wizard > .content {min-height: 24.5em;}
    </style>
    <!-- END PAGE LEVEL /PLUGINS/CUSTOM STYLES -->

</head>
<body class="alt-menu sidebar-noneoverflow">
    <!-- BEGIN LOADER -->
    <div id="load_screen"> 
        <div class="loader"> 
            <div class="loader-content">
                <div class="spinner-grow align-self-center"></div>
            </div>
        </div>
    </div>

    <!--  BEGIN NAVBAR  -->
    @include('includes.header')
    <!--  END NAVBAR  -->

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container" id="container">

        <div class="overlay"></div>
        <div class="search-overlay"></div>

        <!--  BEGIN TOPBAR  -->
        @include('includes.top-bar')
        <!--  END TOPBAR  -->

        <!--  BEGIN CONTENT PART  -->
        <div id="content" class="main-content">
            <div class="layout-px-spacing">

                <div class="page-header">
                    <div class="page-title">
                        <h5>{{$page_name}}</h5>
                    </div>
                    
                    <div class="toggle-switch">
                        <label class="switch s-icons s-outline  s-outline-secondary">
                            <input type="checkbox" checked="" class="theme-shifter">
                            <span class="slider round">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-sun">
                                    <circle cx="12" cy="12" r="5"></circle>
                                    <line x1="12" y1="1" x2="12" y2="3"></line>
                                    <line x1="12" y1="21" x2="12" y2="23"></line>
                                    <line x1="4.22" y1="4.22" x2="5.64" y2="5.64">
                                    </line><line x1="18.36" y1="18.36" x2="19.78" y2="19.78">
                                    </line><line x1="1" y1="12" x2="3" y2="12">
                                    </line><line x1="21" y1="12" x2="23" y2="12">
                                    </line><line x1="4.22" y1="19.78" x2="5.64" y2="18.36">
                                    </line><line x1="18.36" y1="5.64" x2="19.78" y2="4.22"></line>
                                </svg>

                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-moon">
                                    <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path>
                                </svg>
                            </span>
                        </label>
                    </div>
                </div>

                @yield('content')

            </div>

        </div>
        <!--  END CONTENT PART  -->
    </div>
    <!-- END MAIN CONTAINER -->

    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="{{ asset('/assets/js/libs/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ asset('/bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('/assets/js/app.js') }}"></script>
    <script>
        $(document).ready(function() {
            App.init();
        });
    </script>
    <script src="{{ asset('/assets/js/custom.js') }}"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->

    <script src="{{ asset('/assets/js/ie11fix/fn.fix-padStart.js') }}"></script>
    <script src="{{ asset('/plugins/editors/quill/quill.js') }}"></script>
    <script src="{{ asset('/assets/js/apps/todoList.js') }}"></script>
    <script src="//code.tidio.co/u0hz3022l7ebwh378fas0emxxlxqemza.js" async></script>
    <!-- toastr -->
    <script src="{{ asset('/plugins/notification/snackbar/snackbar.min.js') }}"></script>
    <!-- END PAGE LEVEL PLUGINS -->

    @if (session('login'))
        <script>
            Snackbar.show({
                text: 'Login Successful!',
                pos: 'top-right'
            });
        </script>        
    @endif

    <script>
        /*$('#switch_mode').on('click', function() {   
            let dark_link   = "/assets/css/plugins.css";
            let light_link  = "/assets/css/mode.css";

            $(this).val(this.checked ? 1 : 0);
            
            if ($(this).val() == 1) {
                //$('link[href="/css/res.css"]').remove();
                $('link[href="' + dark_link + '"]').remove();
                $('head').append('<link href="' + light_link + '" rel="stylesheet">');
            }
            else{
                $('link[href="' + light_link + '"]').remove();
                $('head').append('<link href="' + dark_link + '" rel="stylesheet">');
            }
            
        });*/
    </script>

</body>
</html>