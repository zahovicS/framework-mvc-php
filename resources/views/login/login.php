<!DOCTYPE html>
<html lang="es">

<head>
    <title>Inicio de sesión</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="apple-touch-icon" sizes="180x180" href="<?= BASE_URL ?>/images/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= BASE_URL ?>/images/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= BASE_URL ?>/images/favicons/favicon-16x16.png">
    <link rel="manifest" href="<?= BASE_URL ?>/images/favicons/site.webmanifest">
    <!--===============================================================================================-->
    <link src="<?= BASE_URL ?>/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link src="<?= BASE_URL ?>/bower_components/animate-css/animate.min.css">
    <!--===============================================================================================-->
    <link src="<?= BASE_URL ?>/bower_components/CSS-Hanburgers/dist/css-hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= BASE_URL ?>/css/util.css">
    <link rel="stylesheet" type="text/css" href="<?= BASE_URL ?>/css/login.css">
    <!--===============================================================================================-->
    <script src="https://kit.fontawesome.com/7ac530336f.js" crossorigin="anonymous"></script>
</head>

<body>

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-pic js-tilt" data-tilt>
                    <img src="images/img-01.png" alt="IMG">
                </div>

                <form action="<?= BASE_URL ?>/Login" class="login100-form validate-form" method="POST">
                    <span class="login100-form-title">
                        Inicio de sesión
                    </span>

                    <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                        <input class="input100" type="text" name="email" placeholder="Email" autocomplete="false">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        <input class="input100" type="password" name="pass" placeholder="Password" autocomplete="false">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn">
                            Login
                        </button>
                    </div>

                    <div class="text-center p-t-136">
                        <a class="txt2" href="#">
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--===============================================================================================-->
    <script src="<?= BASE_URL ?>/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="<?= BASE_URL ?>/bower_components/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!--===============================================================================================-->
    <script src="<?= BASE_URL ?>/bower_components/tilt/src/tilt.jquery.js"></script>
    <!--===============================================================================================-->

    <script>
    $('.js-tilt').tilt({
        scale: 1.1
    })
    </script>
    <!--===============================================================================================-->
    <script src="<?= BASE_URL ?>/js/login/login.js"></script>
</body>

</html>