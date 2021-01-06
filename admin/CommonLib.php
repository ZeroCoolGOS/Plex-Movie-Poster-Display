<?php

function HeaderInfo() {

    echo "<meta charset=\"utf-8\">\n";
    echo "\t<title>Plex Movie Poster Display - Admin</title>\n";
    
    echo "\n";
    echo "\t<meta name=\"viewport\" content=\"width=device-width, initial-scale=1, shrink-to-fit=no\">\n";
    echo "\t<meta name=\"description\" content=\"\">\n";
    echo "\t<meta name=\"author\" content=\"www.mattsshack.com\">\n";
    
    echo "\n";
    echo "\t<meta content=\"no-cache, no-store, must-revalidate\" http-equiv=\"Cache-Control\"/>\n";
    echo "\t<meta content=\"no-cache\" http-equiv=\"Pragma\"/>\n";
    echo "\t<meta content=\"0\" http-equiv=\"Expires\"/>\n";
    
    echo "\n";
    echo "\t<link rel=\"shortcut icon\" type=\"image/png\" href=\"/../assets/images/desktop/favicon.ico\"/>\n";
    echo "\t<link rel=\"mask-icon\" href=\"/../assets/images/desktop/favicon-mask.svg\" color=\"#cc7b19\">\n";
    
    HeaderInfoApple();
    
    echo "\n";
    echo "\t<!-- JQuery Javascript -->\n";
    echo "\t<script src=\"/../assets/jquery-3.4.0/jquery-3.4.0.min.js\"></script>\n";
    
    echo "\n";
    echo "\t<!-- Popper Javascript -->\n";
    echo "\t<script src=\"/../assets/popper/popper.min.js\"></script>\n";
    
    echo "\n";
    echo "\t<!-- Bootstrap Javascript & CSS -->\n";
    echo "\t<script src=\"/../assets/bootstrap-4.3.1/js/bootstrap.min.js\"></script>\n";
    echo "\t<link rel=\"stylesheet\" href=\"/../assets/bootstrap-4.3.1/css/bootstrap.min.css\">\n";
    
    echo "\n";
    echo "\t<!-- Bootstrap Colorpicker Javascript & CSS -->\n";
    echo "\t<script src=\"/../assets/bootstrap-colorpicker/js/bootstrap-colorpicker.js\"></script>\n";
    echo "\t<link rel=\"stylesheet\" href=\"/../assets/bootstrap-colorpicker/css/bootstrap-colorpicker.css\">\n";
    
    echo "\n";
    echo "\t<!-- Plex Movie Poster Display CSS -->\n";
    echo "\t<link rel=\"stylesheet\" href=\"/../assets/styles/default/style.css\">\n";
    echo "\t<link rel=\"stylesheet\" href=\"/../assets/styles/default/form-validation.css\">\n";
    echo "\t<link rel=\"stylesheet\" href=\"Plex.css\">\n";
    echo "\t<script src=\"CommonLib.js\"></script>\n";

}

function HeaderInfoApple() {

    echo "\n";
    echo "\t<meta name=\"apple-mobile-web-app-capable\" content=\"yes\">\n";
    echo "\t<meta name=\"apple-mobile-web-app-status-bar-style\" content=\"black\">\n";
    echo "\t<meta name=\"apple-touch-fullscreen\" content=\"yes\">\n";
    
    echo "\n";
    echo "\t<!-- <link rel=\"apple-touch-icon\" href=\"/../assets/images/apple-touch-icon.png\"> -->\n";
    echo "\t<link rel=\"apple-touch-icon-precomposed\" href=\"/../assets/images/desktop/ios/icon-iphone.png\">\n";
    echo "\t<link rel=\"apple-touch-icon-precomposed\" sizes=\"72x72\" href=\"/../assets/images/desktop/ios/icon-ipad.png\">\n";
    echo "\t<link rel=\"apple-touch-icon-precomposed\" sizes=\"114x114\" href=\"/../assets/images/desktop/ios/icon-iphone@2x.png\">\n";
    echo "\t<link rel=\"apple-touch-icon-precomposed\" sizes=\"144x144\" href=\"/../assets/images/desktop/ios/icon-ipad@2x.png\">\n";
    echo "\t<link rel=\"apple-touch-startup-image\" media=\"(device-width: 320px)\" href=\"/../assets/images/desktop/ios/startup-iphone-portrait.png\">\n";
    echo "\t<link rel=\"apple-touch-startup-image\" media=\"(device-width: 320px) and (-webkit-device-pixel-ratio: 2)\" href=\"/../assets/images/desktop/ios/startup-iphone-portrait@2x.png\">\n";
    echo "\t<link rel=\"apple-touch-startup-image\" media=\"(device-width: 320px) and (device-height: 568px) and (-webkit-device-pixel-ratio: 2)\" href=\"/../assets/images/desktop/ios/startup-iphone5-portrait@2x.png\">\n";
    echo "\t<link rel=\"apple-touch-startup-image\" media=\"(device-width: 768px) and (orientation: portrait)\" href=\"/../assets/images/desktop/ios/startup-ipad-portrait.png\">\n";
    echo "\t<link rel=\"apple-touch-startup-image\" media=\"(device-width: 768px) and (orientation: landscape)\" href=\"/../assets/images/desktop/ios/startup-ipad-landscape.png\">\n";
    echo "\t<link rel=\"apple-touch-startup-image\" media=\"(device-width: 1536px) and (orientation: portrait) and (-webkit-device-pixel-ratio: 2)\" href=\"/../assets/images/desktop/ios/startup-ipad-portrait@2x.png\">\n";
    echo "\t<link rel=\"apple-touch-startup-image\" media=\"(device-width: 1536px)  and (orientation: landscape) and (-webkit-device-pixel-ratio: 2)\" href=\"/../assets/images/desktop/ios/startup-ipad-landscape@2x.png\">\n";

}


?>