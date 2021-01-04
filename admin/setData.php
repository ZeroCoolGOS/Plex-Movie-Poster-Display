<?php

function ghostData($configPage) {
    include '../config.php';

    $formIndent = "\t\t\t\t\t\t\t\t\t";

    // echo 'GHOST BLOCK START';

    // General PHP
    if ($configPage != "general.php") {
        $ghostField = "\n";
        echo $ghostField;

        $ghostField = "$formIndent<!-- General PHP -->\n";
        echo $ghostField;
    }

    // Security PHP
    if ($configPage != "security.php") {
        $ghostField = "\n";
        echo $ghostField;

        $ghostField = "$formIndent<!-- Security PHP -->\n";
        echo $ghostField;

        $ghostField = "$formIndent<input type=\"hidden\" id=\"pmpUsername\" name=\"pmpUsername\" value=\"$pmpUsername\">\n";
        echo $ghostField;

        $ghostField = "$formIndent<input type=\"hidden\" id=\"pmpPassword\" name=\"pmpPassword\" value=\"$pmpPassword\">\n";
        echo $ghostField;
    }

    // Common PHP
    if ($configPage != "common.php") {
        $ghostField = "\n";
        echo $ghostField;

        $ghostField = "$formIndent<!-- Common PHP -->\n";
        echo $ghostField;

        $ghostField = "$formIndent<input type=\"hidden\" id=\"pmpImageSpeed\" name=\"pmpImageSpeed\" value=\"$pmpImageSpeed\">\n";
        echo $ghostField;

        $ghostField = "$formIndent<input type=\"hidden\" id=\"pmpBottomScroll\" name=\"pmpBottomScroll\" value=\"$pmpBottomScroll\">\n";
        echo $ghostField;

        $ghostField = "$formIndent<input type=\"hidden\" id=\"cacheEnabled\" name=\"cacheEnabled\" value=\"$cacheEnabled\">\n";
        echo $ghostField;
    }

    // Server PHP
    if ($configPage != "server.php") {
        $ghostField = "\n";
        echo $ghostField;

        $ghostField = "$formIndent<!-- Server PHP -->\n";
        echo $ghostField;

        $ghostField = "$formIndent<input type=\"hidden\" id=\"plexServer\" name=\"plexServer\" value=\"$plexServer\">\n";
        echo $ghostField;

        $ghostField = "$formIndent<input type=\"hidden\" id=\"plexToken\" name=\"plexToken\" value=\"$plexToken\">\n";
        echo $ghostField;

        $ghostField = "$formIndent<input type=\"hidden\" id=\"plexServerMovieSection\" name=\"plexServerMovieSection\" value=\"$plexServerMovieSection\">\n";
        echo $ghostField;
    }

    // Client PHP
    if ($configPage != "client.php") {
        $ghostField = "\n";
        echo $ghostField;

        $ghostField = "$formIndent<!-- Client PHP -->\n";
        echo $ghostField;

        $ghostField = "$formIndent<input type=\"hidden\" id=\"plexClient\" name=\"plexClient\" value=\"$plexClient\">\n";
        echo $ghostField;

        $ghostField = "$formIndent<input type=\"hidden\" id=\"plexClientName\" name=\"plexClientName\" value=\"$plexClientName\">\n";
        echo $ghostField;
    }

    // Coming Soon PHP
    if ($configPage != "comingSoon.php") {
        $ghostField = "\n";
        echo $ghostField;

        $ghostField = "$formIndent<!-- Coming Soon PHP -->\n";
        echo $ghostField;

        $ghostField = "$formIndent<input type=\"hidden\" id=\"comingSoonShowSelection\" name=\"comingSoonShowSelection\" value=\"$comingSoonShowSelection\">\n";
        echo $ghostField;

        $ghostField = "$formIndent<input type=\"hidden\" id=\"comingSoonTop\" name=\"comingSoonTop\" value=\"$comingSoonTop\">\n";
        echo $ghostField;

        $ghostField = "$formIndent<input type=\"hidden\" id=\"comingSoonTopText\" name=\"comingSoonTopText\" value=\"$comingSoonTopText\">\n";
        echo $ghostField;

        $ghostField = "$formIndent<input type=\"hidden\" id=\"comingSoonTopFontSize\" name=\"comingSoonTopFontSize\" value=\"$comingSoonTopFontSize\">\n";
        echo $ghostField;

        $ghostField = "$formIndent<input type=\"hidden\" id=\"comingSoonTopFontColor\" name=\"comingSoonTopFontColor\" value=\"$comingSoonTopFontColor\">\n";
        echo $ghostField;

        $ghostField = "$formIndent<input type=\"hidden\" id=\"comingSoonTopFontOutlineSize\" name=\"comingSoonTopFontOutlineSize\" value=\"$comingSoonTopFontOutlineSize\">\n";
        echo $ghostField;

        $ghostField = "$formIndent<input type=\"hidden\" id=\"comingSoonTopFontOutlineColor\" name=\"comingSoonTopFontOutlineColor\" value=\"$comingSoonTopFontOutlineColor\">\n";
        echo $ghostField;

        $ghostField = "$formIndent<input type=\"hidden\" id=\"comingSoonTopAutoScale\" name=\"comingSoonTopAutoScale\" value=\"$comingSoonTopAutoScale\">\n";
        echo $ghostField;

        $ghostField = "$formIndent<input type=\"hidden\" id=\"comingSoonBottom\" name=\"comingSoonBottom\" value=\"$comingSoonBottom\">\n";
        echo $ghostField;

        $ghostField = "$formIndent<input type=\"hidden\" id=\"comingSoonBottomText\" name=\"comingSoonBottomText\" value=\"$comingSoonBottomText\">\n";
        echo $ghostField;

        $ghostField = "$formIndent<input type=\"hidden\" id=\"comingSoonBottomFontSize\" name=\"comingSoonBottomFontSize\" value=\"$comingSoonBottomFontSize\">\n";
        echo $ghostField;

        $ghostField = "$formIndent<input type=\"hidden\" id=\"comingSoonBottomFontColor\" name=\"comingSoonBottomFontColor\" value=\"$comingSoonBottomFontColor\">\n";
        echo $ghostField;

        $ghostField = "$formIndent<input type=\"hidden\" id=\"comingSoonBottomFontOutlineSize\" name=\"comingSoonBottomFontOutlineSize\" value=\"$comingSoonBottomFontOutlineSize\">\n";
        echo $ghostField;

        $ghostField = "$formIndent<input type=\"hidden\" id=\"comingSoonBottomFontOutlineColor\" name=\"comingSoonBottomFontOutlineColor\" value=\"$comingSoonBottomFontOutlineColor\">\n";
        echo $ghostField;

        $ghostField = "$formIndent<input type=\"hidden\" id=\"comingSoonBottomAutoScale\" name=\"comingSoonBottomAutoScale\" value=\"$comingSoonBottomAutoScale\">\n";
        echo $ghostField;
    }

    // Now Showing PHP
    if ($configPage != "nowShowing.php") {
        $ghostField = "\n";
        echo $ghostField;

        $ghostField = "$formIndent<!-- Now Showing PHP -->\n";
        echo $ghostField;

        $ghostField = "$formIndent<input type=\"hidden\" id=\"nowShowingTop\" name=\"nowShowingTop\" value=\"$nowShowingTop\">\n";
        echo $ghostField;

        $ghostField = "$formIndent<input type=\"hidden\" id=\"nowShowingTopText\" name=\"nowShowingTopText\" value=\"$nowShowingTopText\">\n";
        echo $ghostField;

        $ghostField = "$formIndent<input type=\"hidden\" id=\"nowShowingTopFontSize\" name=\"nowShowingTopFontSize\" value=\"$nowShowingTopFontSize\">\n";
        echo $ghostField;

        $ghostField = "$formIndent<input type=\"hidden\" id=\"nowShowingTopFontColor\" name=\"nowShowingTopFontColor\" value=\"$nowShowingTopFontColor\">\n";
        echo $ghostField;

        $ghostField = "$formIndent<input type=\"hidden\" id=\"nowShowingTopFontOutlineSize\" name=\"nowShowingTopFontOutlineSize\" value=\"$nowShowingTopFontOutlineSize\">\n";
        echo $ghostField;

        $ghostField = "$formIndent<input type=\"hidden\" id=\"nowShowingTopFontOutlineColor\" name=\"nowShowingTopFontOutlineColor\" value=\"$nowShowingTopFontOutlineColor\">\n";
        echo $ghostField;

        $ghostField = "$formIndent<input type=\"hidden\" id=\"nowShowingTopAutoScale\" name=\"nowShowingTopAutoScale\" value=\"$nowShowingTopAutoScale\">\n";
        echo $ghostField;

        $ghostField = "$formIndent<input type=\"hidden\" id=\"nowShowingBottom\" name=\"nowShowingBottom\" value=\"$nowShowingBottom\">\n";
        echo $ghostField;

        $ghostField = "$formIndent<input type=\"hidden\" id=\"nowShowingBottomText\" name=\"nowShowingBottomText\" value=\"$nowShowingBottomText\">\n";
        echo $ghostField;

        $ghostField = "$formIndent<input type=\"hidden\" id=\"nowShowingBottomFontSize\" name=\"nowShowingBottomFontSize\" value=\"$nowShowingBottomFontSize\">\n";
        echo $ghostField;

        $ghostField = "$formIndent<input type=\"hidden\" id=\"nowShowingBottomFontColor\" name=\"nowShowingBottomFontColor\" value=\"$nowShowingBottomFontColor\">\n";
        echo $ghostField;

        $ghostField = "$formIndent<input type=\"hidden\" id=\"nowShowingBottomFontOutlineSize\" name=\"nowShowingBottomFontOutlineSize\" value=\"$nowShowingBottomFontOutlineSize\">\n";
        echo $ghostField;

        $ghostField = "$formIndent<input type=\"hidden\" id=\"nowShowingBottomFontOutlineColor\" name=\"nowShowingBottomFontOutlineColor\" value=\"$nowShowingBottomFontOutlineColor\">\n";
        echo $ghostField;

        $ghostField = "$formIndent<input type=\"hidden\" id=\"nowShowingBottomAutoScale\" name=\"nowShowingBottomAutoScale\" value=\"$nowShowingBottomAutoScale\">\n";
        echo $ghostField;

        $ghostField = "$formIndent<input type=\"hidden\" id=\"pmpDisplayProgress\" name=\"pmpDisplayProgress\" value=\"$pmpDisplayProgress\">\n";
        echo $ghostField;

        $ghostField = "$formIndent<input type=\"hidden\" id=\"pmpDisplayProgressSize\" name=\"pmpDisplayProgressSize\" value=\"$pmpDisplayProgressSize\">\n";
        echo $ghostField;

        $ghostField = "$formIndent<input type=\"hidden\" id=\"pmpDisplayProgressColor\" name=\"pmpDisplayProgressColor\" value=\"$pmpDisplayProgressColor\">\n";
        echo $ghostField;
    }

    // Custom PHP
    if ($configPage != "custom.php") {
        $ghostField = "\n";
        echo $ghostField;

        $ghostField = "$formIndent<!-- Custom PHP -->\n";
        echo $ghostField;

        $ghostField = "$formIndent<input type=\"hidden\" id=\"customImageUpload\" name=\"customImageUpload\" value=\"$customImageUpload\">\n";
        echo $ghostField;

        $ghostField = "$formIndent<input type=\"hidden\" id=\"customImageEnabled\" name=\"customImageEnabled\" value=\"$customImageEnabled\">\n";
        echo $ghostField;

        $ghostField = "$formIndent<input type=\"hidden\" id=\"customImage\" name=\"customImage\" value=\"$customImage\">\n";
        echo $ghostField;

        $ghostField = "$formIndent<input type=\"hidden\" id=\"customTopText\" name=\"customTopText\" value=\"$customTopText\">\n";
        echo $ghostField;

        $ghostField = "$formIndent<input type=\"hidden\" id=\"customTopFontSize\" name=\"customTopFontSize\" value=\"$customTopFontSize\">\n";
        echo $ghostField;

        $ghostField = "$formIndent<input type=\"hidden\" id=\"customTopFontColor\" name=\"customTopFontColor\" value=\"$customTopFontColor\">\n";
        echo $ghostField;

        $ghostField = "$formIndent<input type=\"hidden\" id=\"customTopFontOutlineSize\" name=\"customTopFontOutlineSize\" value=\"$customTopFontOutlineSize\">\n";
        echo $ghostField;

        $ghostField = "$formIndent<input type=\"hidden\" id=\"customTopFontOutlineColor\" name=\"customTopFontOutlineColor\" value=\"$customTopFontOutlineColor\">\n";
        echo $ghostField;

        $ghostField = "$formIndent<input type=\"hidden\" id=\"customBottomText\" name=\"customBottomText\" value=\"$customBottomText\">\n";
        echo $ghostField;

        $ghostField = "$formIndent<input type=\"hidden\" id=\"customBottomFontSize\" name=\"customBottomFontSize\" value=\"$customBottomFontSize\">\n";
        echo $ghostField;

        $ghostField = "$formIndent<input type=\"hidden\" id=\"customBottomFontColor\" name=\"customBottomFontColor\" value=\"$customBottomFontColor\">\n";
        echo $ghostField;

        $ghostField = "$formIndent<input type=\"hidden\" id=\"customBottomFontOutlineSize\" name=\"customBottomFontOutlineSize\" value=\"$customBottomFontOutlineSize\">\n";
        echo $ghostField;

        $ghostField = "$formIndent<input type=\"hidden\" id=\"customBottomFontOutlineColor\" name=\"customBottomFontOutlineColor\" value=\"$customBottomFontOutlineColor\">\n";
        echo $ghostField;
    }

    // echo 'GHOST BLOCK END';
}

function setData($configPage) {
//Custom Image Upload
    if ($_FILES['customImageUpload'] != "") {
        $uploaddir = 'cache/custom/';
        $uploadfile = $uploaddir . basename($_FILES['customImageUpload']['name']);

        if (move_uploaded_file($_FILES['customImageUpload']['tmp_name'], $uploadfile)) {
        } else {
            $uploadfile = $_POST['customImageUpload'];
        }
    }

    //Define Config File
    $myfile = fopen("../config.php", "w") or die("Unable to open file!");

    //FixUP POST Data
    $_POST = array_map("stripslashes", $_POST);

    //Create New Config
    $newConfig = "
<?php
//PMPD Configuration
\$pmpConfigVersion = '2';
\$pmpUsername = '$_POST[pmpUsername]';
\$pmpPassword = '$_POST[pmpPassword]';
\$pmpClearImageCache = 'Yes'; //Default Yes
\$pmpImageSpeed = '$_POST[pmpImageSpeed]'; //Default 30 Seconds
\$pmpPosterDir = 'cache/posters/'; //Default cache/posters/ (FUTURE)
\$pmpCustomDir = 'cache/custom/'; //Default cache/custom/ (FUTURE)

//Server Configuration
\$plexServer = '$_POST[plexServer]';
\$plexToken = '$_POST[plexToken]';
\$plexServerMovieSection = '$_POST[plexServerMovieSection]';
\$cacheEnabled = '$_POST[cacheEnabled]'; //Default true

//Client Configuration
\$plexClient = '$_POST[plexClient]';
\$plexClientName = '$_POST[plexClientName]';

//Custom Image Configuration
\$customImageEnabled = '$_POST[customImageEnabled]'; //Default: Disabled
\$customImage = '$_POST[customImage]';
\$customTopText = '$_POST[customTopText]';
\$customTopFontSize = '$_POST[customTopFontSize]'; //Default: 55 (px)
\$customTopFontColor = '$_POST[customTopFontColor]'; //Default: #FFFF00 (Yellow)
\$customTopFontOutlineSize = '$_POST[customTopFontOutlineSize]'; //Default: 2 (px)
\$customTopFontOutlineColor = '$_POST[customTopFontOutlineColor]'; //Default: #FFFF00 (Yellow)
\$customBottomText = '$_POST[customBottomText]';
\$customBottomFontSize = '$_POST[customBottomFontSize]'; //Default: 25 (px)
\$customBottomFontColor = '$_POST[customBottomFontColor]'; //Default: #FFFFFF (White)
\$customBottomFontOutlineSize = '$_POST[customBottomFontOutlineSize]'; //Default: 2 (px)
\$customBottomFontOutlineColor = '$_POST[customBottomFontOutlineColor]'; //Default: #FFFF00 (Yellow)

//Coming Soon Configuration
\$comingSoonTop = '$_POST[comingSoonTop]'; //Default: custom (title/summary/tagline/custom)
\$comingSoonTopAutoScale = '$_POST[comingSoonTopAutoScale]'; //Default: false
\$comingSoonTopText = '$_POST[comingSoonTopText]';
\$comingSoonTopFontSize = '$_POST[comingSoonTopFontSize]'; //Default: 55 (px)
\$comingSoonTopFontColor = '$_POST[comingSoonTopFontColor]'; //Default: #FFFF00 (Yellow)
\$comingSoonTopFontOutlineSize = '$_POST[comingSoonTopFontOutlineSize]'; //Default: 2 (px)
\$comingSoonTopFontOutlineColor = '$_POST[comingSoonTopFontOutlineColor]'; //Default: #FFFF00 (Yellow)
\$showComingSoonInfo = '$_POST[showComingSoonInfo]'; //Default: false
\$comingSoonBottom = '$_POST[comingSoonBottom]'; //Default: custom (title/summary/tagline/custom)
\$comingSoonBottomText = '$_POST[comingSoonBottomText]';
\$comingSoonBottomAutoScale = '$_POST[comingSoonBottomAutoScale]'; //Default: false
\$comingSoonBottomFontSize = '$_POST[comingSoonBottomFontSize]'; //Default: 25 (px)
\$comingSoonBottomFontColor = '$_POST[comingSoonBottomFontColor]'; //Default: #FFFFFF (White)
\$comingSoonBottomFontOutlineSize = '$_POST[comingSoonBottomFontOutlineSize]'; //Default: 2 (px)
\$comingSoonBottomFontOutlineColor = '$_POST[comingSoonBottomFontOutlineColor]'; //Default: #FFFF00 (Yellow)
\$comingSoonShowSelection = '$_POST[comingSoonShowSelection]'; //Default: unwatched

//Now Showing Configuration
\$nowShowingTop = '$_POST[nowShowingTop]'; //Default: custom (title/summary/tagline/custom)
\$nowShowingTopAutoScale = '$_POST[nowShowingTopAutoScale]'; //Default: false
\$nowShowingTopText = '$_POST[nowShowingTopText]';
\$nowShowingTopFontSize = '$_POST[nowShowingTopFontSize]'; //Default: 55 (px)
\$nowShowingTopFontColor = '$_POST[nowShowingTopFontColor]'; //Default: #FFFF00 (Yellow)
\$nowShowingTopFontOutlineSize = '$_POST[nowShowingTopFontOutlineSize]'; //Default: 2 (px)
\$nowShowingTopFontOutlineColor = '$_POST[nowShowingTopFontOutlineColor]'; //Default: #FFFF00 (Yellow)
\$nowShowingBottom = '$_POST[nowShowingBottom]'; //Default: title (title/summary/tagline/custom)
\$nowShowingBottomText = '$_POST[nowShowingBottomText]';
\$nowShowingBottomAutoScale = '$_POST[nowShowingBottomAutoScale]'; //Default: false
\$nowShowingBottomFontSize = '$_POST[nowShowingBottomFontSize]'; //Default: 25 (px)
\$nowShowingBottomFontColor = '$_POST[nowShowingBottomFontColor]'; //Default: #FFFFFF (White)
\$nowShowingBottomFontOutlineSize = '$_POST[nowShowingBottomFontOutlineSize]'; //Default: 2 (px)
\$nowShowingBottomFontOutlineColor = '$_POST[nowShowingBottomFontOutlineColor]'; //Default: #FFFF00 (Yellow)

//Misc Configuration
\$pmpDisplayProgress = '$_POST[pmpDisplayProgress]'; //Default: Disabled
\$pmpDisplayProgressSize = '$_POST[pmpDisplayProgressSize]'; //Default: 5 (px)
\$pmpDisplayProgressColor = '$_POST[pmpDisplayProgressColor]'; //Default: #FFFF00 (Yellow)
\$pmpDisplayClock = 'Disabled'; //Default: Disabled (FUTURE)
\$pmpBottomScroll = '$_POST[pmpBottomScroll]'; //Default: Disabled
\$pmpBottomScrollSpeed = '1'; //Default: 1 (FUTURE)";

    echo $newConfig;
    fwrite($myfile, $newConfig);
    sleep(2);
    fclose($myfile);
    header("Location: $configPage");
}

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

?>