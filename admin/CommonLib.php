<?php

function sidebarInfo($configPage) {

    echo '<div class="SidebarContainer-sidebarContainer-2RAYT1">
              <div class="SidebarScroller-scroller-2wp83y Scroller-scroller-3GqQcZ Scroller-vertical-VScFLT Scroller-auto-LsWiWx ">
                  <div id="SideBar" class="SettingsSidebar-sidebarContent-3yMjj9">
                      <div role="navigation">
                          <div class="SidebarList-sidebarListHeaderContainer-2D2g-W">
                              <div class="SettingsSidebarList-header-1RCToc SidebarList-sidebarListHeader-1t0yzs" role="header">Settings</div>
                          </div>';

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

    echo '            </div>
                  </div>
              </div>
          </div>';

}

function sidebarInfoMeta($configPage, $configString, $configStatus) {
    echo '<div class="SidebarListItem-sidebarListItem-GdcVsd">';

    if ($configStatus == "Active") {
        echo "<a href=\"$configPage\" role=\"link\" class=\"SidebarLink-sidebarLink-L2OPdE Link-default-2XA2bN Link-link-2n0yJn Link-isSelected-IRm9uM\">
              <div class=\"SidebarLink-container-24bhWp\">
              <div class=\"SettingsSidebarListLink-icon-eICe1t SidebarLink-icon-34JWqs SettingsSidebarListLink-selectedIcon-caIG1g\"></div>
              <div class=\"SidebarLink-title-2vaAAn\">$configString</div>
              <div class=\"SidebarLink-children-3Lh_RU\"></div>";
    }
    else {
        echo "<a href=\"$configPage\" role=\"link\" class=\"SidebarLink-sidebarLink-L2OPdE Link-default-2XA2bN Link-link-2n0yJn\">
              <div class=\"SidebarLink-container-24bhWp\">
              <div class=\"SettingsSidebarListLink-icon-eICe1t SidebarLink-icon-34JWqs\"></div>
              <div class=\"SidebarLink-title-2vaAAn\">$configString</div>";
    }

    echo '</div>
          </a>
          </div>';
}

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
    echo "\t<!-- Plex Movie Poster Display Javascript & CSS -->\n";
    echo "\t<script src=\"CommonLib.js\"></script>\n";
    echo "\t<link rel=\"stylesheet\" href=\"/../assets/styles/default/style.css\">\n";
    echo "\t<link rel=\"stylesheet\" href=\"/../assets/styles/default/form-validation.css\">\n";

    echo "\n";
    echo "\t<!-- Plex CSS & Icons-->\n";
    echo "\t<link rel=\"stylesheet\" href=\"/../assets/plex/Plex.css\">\n";
    echo "\t<link rel=\"shortcut icon\" type=\"image/png\" href=\"/../assets/plex/images/desktop/favicon.ico\"/>\n";
    echo "\t<link rel=\"mask-icon\" href=\"/../assets/plex/images/desktop/favicon-mask.svg\" color=\"#cc7b19\">\n";

}

function HeaderInfoApple() {

    echo "\n";
    echo "\t<meta name=\"apple-mobile-web-app-capable\" content=\"yes\">\n";
    echo "\t<meta name=\"apple-mobile-web-app-status-bar-style\" content=\"black\">\n";
    echo "\t<meta name=\"apple-touch-fullscreen\" content=\"yes\">\n";

    echo "\n";
    echo "\t<!-- <link rel=\"apple-touch-icon\" href=\"/../assets/plex/images/apple-touch-icon.png\"> -->\n";
    echo "\t<link rel=\"apple-touch-icon-precomposed\" href=\"/../assets/plex/images/desktop/ios/icon-iphone.png\">\n";
    echo "\t<link rel=\"apple-touch-icon-precomposed\" sizes=\"72x72\" href=\"/../assets/plex/images/desktop/ios/icon-ipad.png\">\n";
    echo "\t<link rel=\"apple-touch-icon-precomposed\" sizes=\"114x114\" href=\"/../assets/plex/images/desktop/ios/icon-iphone@2x.png\">\n";
    echo "\t<link rel=\"apple-touch-icon-precomposed\" sizes=\"144x144\" href=\"/../assets/plex/images/desktop/ios/icon-ipad@2x.png\">\n";
    echo "\t<link rel=\"apple-touch-startup-image\" media=\"(device-width: 320px)\" href=\"/../assets/plex//images/desktop/ios/startup-iphone-portrait.png\">\n";
    echo "\t<link rel=\"apple-touch-startup-image\" media=\"(device-width: 320px) and (-webkit-device-pixel-ratio: 2)\" href=\"/../assets/plex//images/desktop/ios/startup-iphone-portrait@2x.png\">\n";
    echo "\t<link rel=\"apple-touch-startup-image\" media=\"(device-width: 320px) and (device-height: 568px) and (-webkit-device-pixel-ratio: 2)\" href=\"/../assets/plex/images/desktop/ios/startup-iphone5-portrait@2x.png\">\n";
    echo "\t<link rel=\"apple-touch-startup-image\" media=\"(device-width: 768px) and (orientation: portrait)\" href=\"/../assets/plex/images/desktop/ios/startup-ipad-portrait.png\">\n";
    echo "\t<link rel=\"apple-touch-startup-image\" media=\"(device-width: 768px) and (orientation: landscape)\" href=\"/../assets/plex/images/desktop/ios/startup-ipad-landscape.png\">\n";
    echo "\t<link rel=\"apple-touch-startup-image\" media=\"(device-width: 1536px) and (orientation: portrait) and (-webkit-device-pixel-ratio: 2)\" href=\"/../assets/plex/images/desktop/ios/startup-ipad-portrait@2x.png\">\n";
    echo "\t<link rel=\"apple-touch-startup-image\" media=\"(device-width: 1536px)  and (orientation: landscape) and (-webkit-device-pixel-ratio: 2)\" href=\"/../assets/plex/images/desktop/ios/startup-ipad-landscape@2x.png\">\n";

}

//Fixup Size Calculations
function fixupSize($bytes) {
    $places = '2';
    $size = array('B', 'KB', 'MB', 'GB');
    $factor = floor((strlen($bytes) - 1) / 3);
    return sprintf("%.{$places}f", $bytes / pow(1024, $factor)) . @$size[$factor];
}

function PosterCache() {
    //Count Items in Posters
    $posters = scandir('../cache/posters');
    $GLOBALS['posterCount'] = count($posters) - 2;
    if ($GLOBALS['posterCount'] < 0) {
        $GLOBALS['posterCount'] = 0;
    }
}

function PosterCacheClear() {
    //Clear Poster Cache Directory
    $files = glob('../cache/posters/*');
    foreach ($files as $file) {
        if (is_file($file)) {
            unlink($file);
        }
    }
}

function CustomCache() {
    //Count Items in Custom Images
    $custom = scandir('../cache/custom');
    $GLOBALS['customCount'] = count($custom) - 2;
    if ($GLOBALS['$customCount'] < 0) {
        $GLOBALS['$customCount'] = 0;
    }
}

function CustomCacheClear() {
    //Clear Custom Cache Directory
    $files = glob('../cache/custom/*');
    foreach ($files as $file) {
        if (is_file($file)) {
            unlink($file);
        }
    }
}

function exportConfig($exportFile) {

    // $fileName = basename($exportFile);
    $fileName = $exportFile;
    $filePath = '../'.$fileName;

    $exportConfigName = "PMP_config.php";

    if (!empty($fileName) && file_exists($filePath)) {
        //Define Headers
        header("Cache-Control: public");
        header("Content-Description: File Transfer");
        // header("Content-Disposition: attachment; filename=$fileName");
        header("Content-Disposition: attachment; filename=$exportConfigName");
        header("Content-Type: application/zip");
        header("Content-Transfer-Encoding: binary");
        ob_clean();
        flush();
        readfile($filePath);
        exit;
    }
    else {
        echo "This file does not exist.";
    }
}

function uploadConfig() {
    $ShowMSG = false;
    $SetRedirect = true;

    // $target_dir = "uploads/";
    $target_dir = "../";
    $target_fileName = "config.php";
    // $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $target_file = $target_dir . $target_fileName;
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Generate the Upload directory if it does not exist.
    if (!file_exists($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    // Check if image file is a actual image or fake image
    if (isset($_POST["restoreConfig"])) {
        // $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]); // Disabled for php upload
        if ($check !== false) {
            if ($ShowMSG == true) {
                echo "File is an image - " . $check["mime"] . ".";
            }
            $uploadOk = 1;
        } 
        else {
            if ($ShowMSG == true) {
                echo "File is not an image.";
            }
            $uploadOk = 0;
        }
    }

    // Check if file already exists
    // if (file_exists($target_file)) {
    //     echo "Sorry, file already exists.";
    //     $uploadOk = 0;
    // }

    // Check file size
    // $fileSizeMax = 500000; // 500 KB
    $fileSizeMax = 10000;  // 10 KB
    if ($_FILES["fileToUpload"]["size"] > $fileSizeMax) {
        if ($ShowMSG == true) {
            echo "Sorry, your file is too large.";
        }
        $uploadOk = 0;
    }

    // Allow certain file formats
    // if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
    //   echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    //   $uploadOk = 0;
    // }

    if($imageFileType != "php") {
        if ($ShowMSG == true) {
            echo "Sorry, only php files are allowed.";
        }
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        if ($ShowMSG == true) {
            echo "Sorry, your file was not uploaded.<br>";
        }
        // if everything is ok, try to upload file
    } 
    else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            if ($ShowMSG == true) {
                echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.<br>";
            }
            if ($SetRedirect == true) {
                header("Location: general.php");
                exit();
            }
        } 
        else {
            if ($ShowMSG == true) {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }
}


?>