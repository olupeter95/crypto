<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Coinshape | TwoFa </title>

    <link rel="icon" href="/main/images/favicon.png" type="image/png">
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&display=swap" rel="stylesheet">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/main.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->

     <!-- BEGIN THEME GLOBAL STYLES -->
    <link href="assets/css/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link href="plugins/animate/animate.css" rel="stylesheet" type="text/css" />
    <script src="plugins/sweetalerts/promise-polyfill.js"></script>
    <link href="plugins/sweetalerts/sweetalert2.min.css" rel="stylesheet" type="text/css" />
    <link href="plugins/sweetalerts/sweetalert.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/components/custom-sweetalert.css" rel="stylesheet" type="text/css" />

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    <link href="assets/css/pages/faq/faq.css" rel="stylesheet" type="text/css" /> 
    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->     
</head>
<body class="sidebar-noneoverflow">

    <div class="faq container" style="display: flex;align-items: center;height: 100vh;">
        <div class="faq-layouting layout-spacing" style="width: 100%;">
            <div class="fq-comman-question-wrapper">
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="text-center pb-3 mb-3" style="border-bottom: 1px solid #000000;">Protect your account with 2FA</h3>
                        <p class="text-center text-white" style="font-size: 16px;letter-spacing: 1px;">An extra security will only help!</p>
                        <p class="text-center mb-5" style="font-size: 14px;">We care about the safety of your assets on this platform so, we strongly recommend you add an extra layer of security using a two factor authenticator application like <strong class="text-danger">Google Authenticator</strong>.</p>
                        
                        <div class="row mb-5">
                            <div class="col-md-6 text-center mb-lg-0 mb-4 col-6">
                                <a href="https://play.google.com/store/apps/details?id=com.google.android.apps.authenticator2&hl=en">
                                    <img src="{{ asset('assets/img/android.png') }}">
                                </a>
                            </div>
                            <div class="col-md-6 text-center col-6">
                                <a href="https://itunes.apple.com/us/app/google-authenticator/id388497605?mt=8">
                                    <img src="{{ asset('assets/img/iphone.png') }}">  
                                </a>
                            </div>
                        </div>
                        <div class="row mb-5 mx-lg-5">
                            <div class="col-lg-6 col-12 mb-lg-0 mb-3">
                                <a id="setUp2Fa" href="javascript:void(0);" class="btn btn-success btn-lg col-12 mr-lg-5 br-50">
                                    <i class="fa fa-user-secret"></i> Setup 2FA
                                </a>
                            </div>
                            <div class="col-12 col-lg-6">
                                <a id="skip2Fa" href="javascript:void(0);" class="btn btn-danger btn-lg col-12 br-50">Skip</a>
                            </div>
                        </div>    
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <script src="assets/js/libs/jquery-3.1.1.min.js"></script>
    <script src="bootstrap/js/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- END GLOBAL MANDATORY STYLES -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
    <script src="assets/js/pages/faq/faq.js"></script>
    <script src="plugins/sweetalerts/sweetalert2.min.js"></script>
    <script src="plugins/sweetalerts/custom-sweetalert.js"></script>
    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
    <script>
        $('#setUp2Fa').on('click', function(){
            $.post('/user/setup/2fa',{
                _token  :   $('meta[name="csrf-token"]').attr('content'),
                setup   :   'YES'
            },
            function(response){
                if(response.success == 'true'){
                    location.reload();
                }
                else{
                    swal({
                        title: 'Error!',
                        text: "An Error Occured With The System! Please Try Again",
                        type: 'warning',
                        padding: '2em'
                    });
                    $(document).on('click', function(){
                        location.reload();
                    });
                }
            });
        });

        $('#skip2Fa').on('click', function(){
            $.post('/user/skip/2fa',{
                _token  :   $('meta[name="csrf-token"]').attr('content'),
                skip    :   'YES'
            },
            function(response){
                if(response.success == 'true'){
                    location.reload();
                }
            });
        });
    </script>
</body>
</html>