<?php
$msg = NULL;

if (isset($_POST['username']) && !empty($_POST['password'])) {
    include_once '../config.php';

    if (($_POST['username'] == $pmpUsername) && ($_POST['password'] == $pmpPassword)) {
        session_start();
        $_SESSION['username'] = $pmpUsername;
        $_SESSION['access'] = '1';
        header("Location: general.php");
        die();
    } else {
        $msg = "Invalid Username or Password";
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Plex Movie Poster Display - Login</title>

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="www.mattsshack.com">

    <link rel="shortcut icon" type="image/png" href="/assets/images/desktop/favicon.ico"/>
    <link rel="mask-icon" href="/assets/images/desktop/favicon-mask.svg" color="#cc7b19">

    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-touch-fullscreen" content="yes">

    <!-- <link rel="apple-touch-icon" href="/assets/images/apple-touch-icon.png"> -->
    <link rel="apple-touch-icon-precomposed" href="/assets/images/desktop/ios/icon-iphone.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/assets/images/desktop/ios/icon-ipad.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/assets/images/desktop/ios/icon-iphone@2x.png">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="/assets/images/desktop/ios/icon-ipad@2x.png">
    <link rel="apple-touch-startup-image" media="(device-width: 320px)" href="/assets/images/desktop/ios/startup-iphone-portrait.png">
    <link rel="apple-touch-startup-image" media="(device-width: 320px) and (-webkit-device-pixel-ratio: 2)" href="/assets/images/desktop/ios/startup-iphone-portrait@2x.png">
    <link rel="apple-touch-startup-image" media="(device-width: 320px) and (device-height: 568px) and (-webkit-device-pixel-ratio: 2)" href="/assets/images/desktop/ios/startup-iphone5-portrait@2x.png">
    <link rel="apple-touch-startup-image" media="(device-width: 768px) and (orientation: portrait)" href="/assets/images/desktop/ios/startup-ipad-portrait.png">
    <link rel="apple-touch-startup-image" media="(device-width: 768px) and (orientation: landscape)" href="/assets/images/desktop/ios/startup-ipad-landscape.png">
    <link rel="apple-touch-startup-image" media="(device-width: 1536px) and (orientation: portrait) and (-webkit-device-pixel-ratio: 2)" href="/assets/images/desktop/ios/startup-ipad-portrait@2x.png">
    <link rel="apple-touch-startup-image" media="(device-width: 1536px)  and (orientation: landscape) and (-webkit-device-pixel-ratio: 2)" href="/assets/images/desktop/ios/startup-ipad-landscape@2x.png">

    <!-- Bootstrap Javascript & CSS -->
    <script src="/assets/bootstrap-4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="/assets/bootstrap-4.3.1/css/bootstrap.min.css">

    <!-- Plex Movie Poster Display CSS -->
    <link rel="stylesheet" href="/assets/styles/default/login.css">
    <link rel="stylesheet" href="/assets/styles/default/form-validation.css">

</head>

<body class="text-center">
<form class="form-login needs-validation" novalidate action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>"
      method="post">
    <img class="d-block mx-auto mb-4" src="/../assets/images/android-chrome-192x192.png" alt="" width="100" height="100">

    <?php
    if ($msg != NULL) {
        echo "<p class='alert alert-danger'> $msg </p>";
    }
    ?>

    <label for="inputUsername" class="sr-only">Username</label>
    <input type="username" id="username" name="username" class="form-control" placeholder="Username" required autofocus>
    <hr class="login">
    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
    <p></p>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
</form>

<script>
    //Taken from https://getbootstrap.com
    //Example starter JavaScript for disabling form submissions if there are invalid fields
    (function () {
        'use strict';

        window.addEventListener('load', function () {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');

            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function (form) {
                form.addEventListener('submit', function (event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
</script>

</body>
</html>