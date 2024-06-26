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
        <link href="assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->

    <!-- BEGIN THEME GLOBAL STYLES -->
    <link href="assets/css/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link href="plugins/animate/animate.css" rel="stylesheet" type="text/css" />
    <script src="plugins/sweetalerts/promise-polyfill.js"></script>
    <link href="plugins/sweetalerts/sweetalert2.min.css" rel="stylesheet" type="text/css" />
    <link href="plugins/sweetalerts/sweetalert.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/components/custom-sweetalert.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    <link href="assets/css/pages/faq/faq.css" rel="stylesheet" type="text/css" /> 
    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->     
</head>
<body class="sidebar-noneoverflow">

    <div class="faq container mt-5" style="display: flex;align-items: center;height: 100vh;">
        <div class="faq-layouting layout-spacing" style="width: 100%;">
            <div class="fq-comman-question-wrapper">
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="text-center pb-3 mb-3" style="border-bottom: 1px solid #000000;">Enter your 2FA password</h3>
                        <p class="text-center mb-5" style="font-size: 14px;">Scan the QR code below and enter the verification code generated by <strong class="text-danger">Google Authenticator</strong> app on your phone.</p>
                        
                        <div class="row mb-5">
                            <div class="col-12 text-center mb-lg-0 mb-4">
                                <img src="{{$qrCodeUrl}}">
                            </div>     
                        </div>
                        <div class="d-flex" style="justify-content: center;">
                            <div class="input-group mb-4" style="width: 30em">
                                <input id="vc" type="text" class="form-control" placeholder="Verification Code" aria-label="Verification Code">
                                <div class="input-group-append">
                                    <button id="checkVc" class="btn btn-primary" type="button">Verify</button>
                                </div>
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
        $('#checkVc').on('click', function(){
            $.post('/user/check/vc',{
                _token  :   $('meta[name="csrf-token"]').attr('content'),
                vc      :   $('#vc').val()
            },
            function(response){
                if(response.status == 'true'){
                    swal({
                        title: 'Good job!',
                        text: "Code verified!",
                        type: 'success',
                        padding: '2em'
                    });

                    $(document).on('click', function(){
                        location.reload();
                    });
                }
                else{
                    swal({
                        title: 'Error!',
                        text: "Incorrect Verification Code!",
                        type: 'warning',
                        padding: '2em'
                    });
                }
            });
        });
    </script>
</body>
</html>