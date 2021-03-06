<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Login | Thesis Book Archiving</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.7 -->
        <link rel="stylesheet" href="/cms-assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="/cms-assets/bower_components/font-awesome/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="/cms-assets/bower_components/Ionicons/css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="/cms-assets/dist/css/AdminLTE.min.css">
        <!-- iCheck -->
        <link rel="stylesheet" href="/cms-assets/plugins/iCheck/square/blue.css">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->

        <!--end::Base Styles -->
        <link rel="shortcut icon" href="/logo.png" />
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <!-- Google Font -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    </head>
    <body class="hold-transition login-page">
        <div class="login-box">
            <div class="login-logo">
                <a href="/cms-assets/index2.html"><b>Thesis Book Archiving</b></a>
            </div>
            <!-- /.login-logo -->
            <div class="login-box-body">
                <p class="login-box-msg">Authentication</p>
                <form action="{{ route('login') }}" method="post" id="login-form">
                    @csrf
                    <div class="form-group has-feedback">
                        <input type="email" class="form-control login-email" placeholder="Email" name="email">
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="password" class="form-control login-password" placeholder="Password" name="password">
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    @if (session()->has('login-error'))
                    <p class="text-red">Invalid username or password. Please try again.</p>
                    @endif
                    <div class="row">
                        <!-- /.col -->
                        <div class="col-xs-4">
                            <button type="submit" class="btn btn-primary btn-block btn-flat">Login</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
                <br>
                <!-- /.social-auth-links -->
                Don't have an account? <a href="/register" class="text-center">Click here to register</a> or <a href="javascript:void(0)" class="guest-login">Login as Guest</a>
            </div>
            <!-- /.login-box-body -->
        </div>
        <!-- /.login-box -->
        <!-- jQuery 3 -->
        <script src="/cms-assets/bower_components/jquery/dist/jquery.min.js"></script>
        <!-- Bootstrap 3.3.7 -->
        <script src="/cms-assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <!-- iCheck -->
        <script src="/cms-assets/plugins/iCheck/icheck.min.js"></script>
        <script>
        $(function () {
        $('input').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square-blue',
        increaseArea: '20%' /* optional */
        });
        });

        $('.guest-login').click(function () {
            $('.login-email').val('guest@guest.com')
            $('.login-password').val('password')
            $('#login-form').submit()
        })
        </script>
    </body>
</html>