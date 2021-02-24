<?php

function HeaderInfo($configPage) {
    if ($configPage == "index.php") {
        $paths = "";
    }
    else {
        $paths = "/..";
    }

    $AppName = "plexmovieposter";

    echo "<meta charset=\"utf-8\">\n";
    if ($configPage == "index.php") {
        echo "\t<title>Plex Movie Poster Display</title>\n";
    }
    else {
        echo "\t<title>Plex Movie Poster Display - Admin</title>\n";
    }

    echo "\n";
    echo "\t<meta name=\"viewport\" content=\"width=device-width, initial-scale=1, shrink-to-fit=no\">\n";
    echo "\t<meta name=\"description\" content=\"\">\n";
    echo "\t<meta name=\"author\" content=\"www.mattsshack.com\">\n";

    if ($configPage != "index.php") {
        echo "\n";
        echo "\t<meta content=\"no-cache, no-store, must-revalidate\" http-equiv=\"Cache-Control\"/>\n";
        echo "\t<meta content=\"no-cache\" http-equiv=\"Pragma\"/>\n";
        echo "\t<meta content=\"0\" http-equiv=\"Expires\"/>\n";
    }

    HeaderInfoApple($configPage);

    echo "\n";
    echo "\t<!-- JQuery Javascript -->\n";
    echo "\t<script src=\"$paths/assets/jquery-3.4.0/jquery-3.4.0.min.js\"></script>\n";

    if ($configPage == "index.php") {
        echo "\t<script src=\"$paths/assets/jquery-3.4.0/jquery.marquee.min.js\"></script>\n";
        echo "\t<script src=\"$paths/assets/jquery-3.4.0/jquery.easing.min.js\"></script>\n";
    }

    if ($configPage != "index.php") {
        echo "\n";
        echo "\t<!-- Popper Javascript -->\n";
        echo "\t<script src=\"$paths/assets/popper/popper.min.js\"></script>\n";
    }

    if ($configPage == "index.php") {
        echo "\n";
        echo "\t<!-- Text Scaler Javascript -->\n";
        echo "\t<script src=\"$paths/assets/fitty/fitty.js\"></script>\n";
    }

    echo "\n";
    echo "\t<!-- Bootstrap Javascript & CSS -->\n";
    echo "\t<script src=\"$paths/assets/bootstrap-4.3.1/js/bootstrap.min.js\"></script>\n";
    echo "\t<link rel=\"stylesheet\" href=\"$paths/assets/bootstrap-4.3.1/css/bootstrap.min.css\">\n";

    if ($configPage != "index.php") {
        echo "\n";
        echo "\t<!-- Bootstrap Colorpicker Javascript & CSS -->\n";
        echo "\t<script src=\"$paths/assets/bootstrap-colorpicker/js/bootstrap-colorpicker.js\"></script>\n";
        echo "\t<link rel=\"stylesheet\" href=\"$paths/assets/bootstrap-colorpicker/css/bootstrap-colorpicker.css\">\n";
    }
    // --------------------------------------------------
    // First Party
    echo "\n";
    echo "\t<!-- Plex Movie Poster Display Javascript & CSS -->\n";
    echo "\t<link rel=\"stylesheet\" href=\"$paths/assets/$AppName/fonts_stock.css\">\n";
    echo "\t<link rel=\"stylesheet\" href=\"$paths/assets/$AppName/PlexMini.css\">\n";  // BasePoint to Phase out Plex.css
    echo "\t<link rel=\"stylesheet\" href=\"$paths/assets/$AppName/glyphicons.css\">\n";  // BasePoint to Phase out Plex.css

    if ($debugMode == TRUE) {
        $font_custom_ver = date('his');
        echo "\t<link rel=\"stylesheet\" href=\"$paths/assets/$AppName/fonts_custom.css?v=$font_custom_ver\">\n";
    }
    else {
        // echo "\t<link rel=\"stylesheet\" href=\"$paths/assets/$AppName/fonts_custom.css\">\n";
        echo "\t<link rel=\"stylesheet\" href=\"$paths/cache/fonts/fonts_custom.css\">\n";
    }

    if ($configPage != "index.php") {
        echo "\t<script src=\"$paths/assets/$AppName/CommonLib.js\"></script>\n";
        echo "\t<link rel=\"stylesheet\" href=\"$paths/assets/styles/default/style.css\">\n";
        echo "\t<link rel=\"stylesheet\" href=\"$paths/assets/styles/default/form-validation.css\">\n";
        echo "\t<link rel=\"stylesheet\" href=\"$paths/assets/$AppName/css/SettingsStyle.css\">\n";  // Clean css file
    }

    if ($configPage == "index.php") {
        echo "\t<link rel=\"stylesheet\" href=\"$paths/assets/styles/default/poster.css\">\n";
        echo "\t<link rel=\"stylesheet\" href=\"$paths/assets/$AppName/css/DisplayStyle.css\">\n";  // Clean css file
        // echo "\t<link rel=\"shortcut icon\" type=\"image/png\" href=\"$paths/assets/images/desktop/favicon.ico\"/>\n";
        // echo "\t<link rel=\"mask-icon\" href=\"$paths/assets/images/desktop/favicon-mask.svg\" color=\"#cc7b19\">\n";
    }

    // --------------------------------------------------

    // echo "\n";
    // echo "\t<!-- Plex CSS & Icons-->\n";
    // if ($configPage != "index.php") {
        echo "\t<link rel=\"stylesheet\" href=\"$paths/assets/plex/Plex.css\">\n";
    // }
    // echo "\t<link rel=\"shortcut icon\" type=\"image/png\" href=\"$paths/assets/plex/images/desktop/favicon.ico\"/>\n";
    // echo "\t<link rel=\"mask-icon\" href=\"$paths/assets/plex/images/desktop/favicon-mask.svg\" color=\"#cc7b19\">\n";
}

function HeaderInfoApple($configPage) {
    if ($configPage == "index.php") {
        $paths = "";
    }
    else {
        $paths = "/..";
    }

    echo "\n";
    echo "\t<meta name=\"apple-mobile-web-app-capable\" content=\"yes\">\n";
    echo "\t<meta name=\"apple-mobile-web-app-status-bar-style\" content=\"black\">\n";
    echo "\t<meta name=\"apple-touch-fullscreen\" content=\"yes\">\n";

    echo "\n";
    // echo "\t<!-- <link rel=\"apple-touch-icon\" href=\"$paths/assets/plex/images/apple-touch-icon.png\"> -->\n";
    echo "\t<link rel=\"apple-touch-icon-precomposed\" href=\"$paths/assets/plex/images/desktop/ios/icon-iphone.png\">\n";
    echo "\t<link rel=\"apple-touch-icon-precomposed\" sizes=\"72x72\" href=\"$paths/assets/plex/images/desktop/ios/icon-ipad.png\">\n";
    echo "\t<link rel=\"apple-touch-icon-precomposed\" sizes=\"114x114\" href=\"$paths/assets/plex/images/desktop/ios/icon-iphone@2x.png\">\n";
    echo "\t<link rel=\"apple-touch-icon-precomposed\" sizes=\"144x144\" href=\"$paths/assets/plex/images/desktop/ios/icon-ipad@2x.png\">\n";
    echo "\t<link rel=\"apple-touch-startup-image\" media=\"(device-width: 320px)\" href=\"$paths/assets/plex//images/desktop/ios/startup-iphone-portrait.png\">\n";
    echo "\t<link rel=\"apple-touch-startup-image\" media=\"(device-width: 320px) and (-webkit-device-pixel-ratio: 2)\" href=\"$paths/assets/plex//images/desktop/ios/startup-iphone-portrait@2x.png\">\n";
    echo "\t<link rel=\"apple-touch-startup-image\" media=\"(device-width: 320px) and (device-height: 568px) and (-webkit-device-pixel-ratio: 2)\" href=\"$paths/assets/plex/images/desktop/ios/startup-iphone5-portrait@2x.png\">\n";
    echo "\t<link rel=\"apple-touch-startup-image\" media=\"(device-width: 768px) and (orientation: portrait)\" href=\"$paths/assets/plex/images/desktop/ios/startup-ipad-portrait.png\">\n";
    echo "\t<link rel=\"apple-touch-startup-image\" media=\"(device-width: 768px) and (orientation: landscape)\" href=\"$paths/assets/plex/images/desktop/ios/startup-ipad-landscape.png\">\n";
    echo "\t<link rel=\"apple-touch-startup-image\" media=\"(device-width: 1536px) and (orientation: portrait) and (-webkit-device-pixel-ratio: 2)\" href=\"$paths/assets/plex/images/desktop/ios/startup-ipad-portrait@2x.png\">\n";
    echo "\t<link rel=\"apple-touch-startup-image\" media=\"(device-width: 1536px)  and (orientation: landscape) and (-webkit-device-pixel-ratio: 2)\" href=\"$paths/assets/plex/images/desktop/ios/startup-ipad-landscape@2x.png\">\n";

}

function NavBar() {
    echo "<div class=\"nav-bar\">\n";
    echo "            <div class=\"NavBar-core\">\n";
    echo "                <div class=\"NavBar-Alignment NavBar-AlignmentImg\">\n";
    echo "                    <a id=\"NavBar-HomeLink\" aria-label=\"Home\" href=\"../index.php\" role=\"link\" class=\"NavBar-HomeLinkButton\">\n";
    echo "                        <svg height=\"16px\" id=\"Layer_1\" style=\"enable-background:new 0 0 16 16;\" version=\"1.1\" viewBox=\"0 0 16 16\" width=\"16px\" xml:space=\"preserve\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" class=\"NavBar-HomeLinkIcon\">\n";
    echo "                          <path d=\"M15.45,7L14,5.551V2c0-0.55-0.45-1-1-1h-1c-0.55,0-1,0.45-1,1v0.553L9,0.555C8.727,0.297,8.477,0,8,0S7.273,0.297,7,0.555  L0.55,7C0.238,7.325,0,7.562,0,8c0,0.563,0.432,1,1,1h1v6c0,0.55,0.45,1,1,1h3v-5c0-0.55,0.45-1,1-1h2c0.55,0,1,0.45,1,1v5h3  c0.55,0,1-0.45,1-1V9h1c0.568,0,1-0.437,1-1C16,7.562,15.762,7.325,15.45,7z\"/>\n";
    echo "                        </svg>\n";
    echo "                    </a>\n";
    echo "                    </a>\n";
    echo "                </div>\n";
    echo "            </div>\n";
    echo "        </div>\n";
}

function sidebarInfo($configPage) {
    echo '<div class="SidebarInfo-core">
              <div>
                  <div id="SideBar" class="SettingsSidebar-spacing">
                      <div role="navigation">
                          <div class="SidebarList-title" role="header">Settings</div>';

    // General PHP
    if ($configPage == "general.php") {
        sidebarInfoMeta("general.php","General","Active");
    }
    else {
        sidebarInfoMeta("general.php","General","NotActive");
    }

    // Security PHP
    if ($configPage == "security.php") {
        sidebarInfoMeta("security.php","Security Configuration","Active");
    }
    else {
        sidebarInfoMeta("security.php","Security Configuration","NotActive");
    }

    // Common PHP
    if ($configPage == "common.php") {
        sidebarInfoMeta("common.php","Common Configuration","Active");
    }
    else {
        sidebarInfoMeta("common.php","Common Configuration","NotActive");
    }

    // Server PHP
    if ($configPage == "server.php") {
        sidebarInfoMeta("server.php","Server Configuration","Active");
    }
    else {
        sidebarInfoMeta("server.php","Server Configuration","NotActive");
    }

    // Client PHP
    if ($configPage == "client.php") {
        sidebarInfoMeta("client.php","Client Configuration","Active");
    }
    else {
        sidebarInfoMeta("client.php","Client Configuration","NotActive");
    }

    // Coming Soon PHP
    if ($configPage == "comingSoon.php") {
        sidebarInfoMeta("comingSoon.php","Coming Soon","Active");
    }
    else {
        sidebarInfoMeta("comingSoon.php","Coming Soon","NotActive");
    }

    // Now Showing PHP
    if ($configPage == "nowShowing.php") {
        sidebarInfoMeta("nowShowing.php","Now Showing","Active");
    }
    else {
        sidebarInfoMeta("nowShowing.php","Now Showing","NotActive");
    }

    // Custom PHP
    if ($configPage == "custom.php") {
        sidebarInfoMeta("custom.php","Custom Configuration","Active");
    }
    else {
        sidebarInfoMeta("custom.php","Custom Configuration","NotActive");
    }

    // Fonts PHP
    if ($configPage == "fonts.php") {
        sidebarInfoMeta("fonts.php","Font Configuration","Active");
    }
    else {
        sidebarInfoMeta("fonts.php","Font Configuration","NotActive");
    }

    echo '            </div>
                  </div>
              </div>
          </div>';

}

function sidebarInfoMeta($configPage, $configString, $configStatus) {
    echo '<div class="sidebarItem">';

    if ($configStatus == "Active") {
        echo "<a href=\"$configPage\" role=\"link\" class=\"SidebarLink-indent SidebarItem-isActive\">
              <div class=\"SidebarItem-NoCR\">
              <div class=\"SidebarItem-Indentation SidebarItem-isActiveIcon\"></div>
              <div>$configString</div>";
    }
    else {
        echo "<a href=\"$configPage\" role=\"link\" class=\"SidebarLink-indent SidebarItem-isInactive\">
              <div class=\"SidebarItem-NoCR\">
              <div class=\"SidebarItem-Indentation \"></div>
              <div>$configString</div>";
    }

    echo '</div>
          </a>
          </div>';
}

function FooterInfo() {
    // https://www.plex.tv/about/privacy-legal/plex-trademarks-and-guidelines/
    // http://brand.plex.tv/d/qxmJ3odkK0fj/style-guide
    // http://brand.plex.tv/d/qxmJ3odkK0fj/style-guide#/style-guide/typography

    $CopyrightMsg[0] = "Plex is a copyright of the Plex Media Company";
    $CopyrightMsg[1] = "Works with Plex";
    $CopyrightMsg[2] = "Plex Move Poster Display for Plex";
    $CopyrightMsg[3] = "PLEX, PLEX PASS, myPLEX, PLEX MEDIA SERVER, PLEX MEDIA CENTER, PLEX MEDIA MANAGER, PLEX HOME THEATER, PLEX TV, PLEX.TV, the Plex Play Logo (\">\" in stylized format) are trademarks that are the exclusive property of Plex, Inc.";


    // echo "<div style=\"position: absolute; left: 0; bottom: 0; width: 100%; text-align: center; \">";
    echo "<div class=\"footerInfo\">";
    echo "<p>";
    echo "$CopyrightMsg[3]";
    echo "</p>";
    echo "</div>";
}

function AdvancedBar() {
    echo "<div >\n";
    echo "                        <div class=\"AdvancedBar-core\">\n";
    echo "                            <div class=\"filter-bar-right\">\n";
    echo "                                <input class=\" btn btn-sm btn-default advanced-settingButton\" type=\"button\" value=\"SHOW ADVANCED\"></input>\n";
    echo "                            </div>\n";
    echo "                        </div>\n";
    echo "                    </div>\n";
}


?>