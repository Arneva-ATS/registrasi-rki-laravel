<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
        <meta charset="utf-8" />
        <meta name="description" content="Rumah Kesejahteraan Indonesia" />
        <meta name="author" content="RKIAPP" />
        <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="keywords" content="RKI , RKIAPP, Rumah Kesejahteraan Indonesia, Koperasi, Koperasi Indonesia">
        <meta name="author" content="Dev RKI">
        <title>Dahsboard - RKI</title>

        @include('layouts.partials.head')
    </head>

    <body class="fix-menu">
        <section id="login_background" class="login-block auth-more">
            <!-- Container-fluid starts -->
            <div class="container">
                <div class="row style-padding">
                    <div class="col-md-12 text-left">
                        <img class="mb-5" height="50%" src="{{ asset('assets/auth/images/rki_login.png') }}" alt="Company Logo">
                    </div>
                    <div class="col-12 col-md-6 text-left">
                        <h1 class="welcoming">Welcome!</h1>
                        <p class="description">The Employee Cooperative Information System is a specialized technological platform designed to assist in managing and facilitating the activities of a cooperative run by the employees of a company or organization. Its primary goal is to enhance the well-being and prosperity of cooperative members by providing various services and useful information.</p>
                    </div>
                    <div class="col-0 col-md-2"></div>
                    <div class="col-12 col-md-4">
                        <div class="text-right login">
                            Login to your Account
                        </div>
                        <!-- Authentication card start -->
                        <form class="md-float-material form-material mt-3" name="frmLogin" id="frmLogin" method="POST">
                            <div class="form-group formlogin mt-3">
                                <label for="username">Username</label><br>
                                <input type="text" name="userId" id="userId" onkeydown="rfEnter();" class="style-form-input" required="" maxlength="20" placeholder="User ID" title="maximamal 20 character">
                            </div>

                            <div class="form-group formlogin mt-3">
                                <label for="password">Password</label><br>
                                <input type="password" name="userPwd" id="userPwd" class="style-form-input" required="" autocomplete="on" title="maximamal 10 character" maxlength="10" placeholder="Password" onkeydown="fnEnter();">
                            </div>

                            <button class="btnlogin" type="button" onclick="login();">Log In</button>
                        </form>
                        <!-- end of form -->
                    </div>
                    <!-- end of col-sm-12 -->
                </div>
                <!-- end of row -->
            </div>
            <!-- end of container-fluid -->
        </section>
    </body>
</html>
