<?php
//For feedback, suggestions, or issues please visit https://www.mattsshack.com/plex-movie-poster-display/
// include_once('../assets/plexmovieposter/loginCheck.php');
include '../assets/plexmovieposter/setData.php';
include 'PMPInfo.php';
include 'PMPReleaseNotes.php';
include '../assets/plexmovieposter/CommonLib.php';
include '../assets/plexmovieposter/FontLib.php';
include '../config.php';

//Save Configuration
if (!empty($_POST['saveConfig'])) {
    setData(basename(__FILE__));
}

uploadFont();
// GenerateCSS_Font();
GenerateCSS_Font_ALL();
?>

<!doctype html>
<html lang="en">
<head>
    <?php HeaderInfo(basename(__FILE__)); ?>
    <script> ShowHideAdvanced(); </script>
</head>

<body class="bg-light">
    <div id="plex" class="application">
        <div class="background-container">
            <div class="FullPage-container-17Y0cs">
                <div>
                    <div style="position: absolute; width: 100%; height: 100%;">
                        <div class=" CrossFadeImage-crossFade-10Sndv" style="position: absolute; animation-duration: 600ms; background-image: url(&quot;/../assets/images/Plex/backgrounds/preset-dark.png&quot;); width: 100%; height: 100%; background-size: cover; background-position: center center; background-repeat: no-repeat;"></div>
                    </div>
                    <div style="position: absolute; width: 100%; height: 100%; background: url(&quot;/../assets/images/Plex/backgrounds/noise.png&quot;); z-index: 2;"></div>
                </div>
            </div>
        </div>
        <?php NavBar() ;?>
        <div id="content" class="scroll-container dark-scrollbar">
            <div class="FullPage-container-17Y0cs">
                <div class="Measure-container-3yONEe">
                    <?php sidebarInfo(basename(__FILE__)) ;?>
                </div>
                <div class="Page-page-aq7i_X Scroller-scroller-3GqQcZ Scroller-vertical-VScFLT  ">
                    <div id="MainPage" class="SettingsPage-content-1vKVEr PageContent-pageContent-16mK6G">
                        <h2 class="SettingsPageHeader-header-1ugtIL">
                            Font Display - Test Page
                        </h2>
                        <div>
                        <div class="server-settings-container show-advanced">
                            <div class="filter-bar">
                                <div class="filter-bar-right">
                                    <input class="toggle-advanced-btn btn btn-sm btn-default advanced-settingButton" type="button" value="SHOW ADVANCED"></input>
                                </div>
                            </div>
                        </div>
                            <!-- SEGMENT BLOCK START -->
                                <div class="format-group ">
                                    Import font:

                                    <form action="fonts.php" method="post" enctype="multipart/form-data">
                                        <label for="fileToUpload" style="cursor: pointer;">
                                            <div class= "label label-btn label-primary">
                                                <i class="label-icon glyphicon file"></i>
                                                Browse Font
                                            </div>
                                        </label>

                                        <input type="file" name="fileToUpload" id="fileToUpload" accept=".ttf" style="opacity: 0; display: inline;" onchange="showName_font()">

                                        <p>
                                            <div id="UploadFileName" style="font-size: smaller;">
                                                Upload Font File:
                                                <i>None</i>
                                            </div>
                                        </p>

                                        <label for="uploadFont" style="cursor: pointer;">
                                            <div class= "label label-btn label-primary">
                                                <i class="label-icon glyphicon upload"></i>
                                                Upload Font
                                            </div>
                                        </label>
                                        <input type="submit" value="Upload Font" name="uploadFont" id="uploadFont" style="opacity: 0;">
                                    </form>
                                </div>
                                <?php
                                    // PHP 7.x
                                    // findFontFamily("../assets/plexmovieposter/", "fonts_stock.css", TRUE, FALSE, "");
                                    // findFontFamily("../cache/fonts/", "fonts_custom.css", TRUE, FALSE, "");
                                    findFontFamily_Full(TRUE, FALSE, "");
                                    // PHP 8.x
                                    // findFontFamily(CSSPath: "../assets/plexmovieposter/", CSSFile: "fonts_stock.css", HTMLdisplay: TRUE, HTMLdropdown: FALSE);
                                    // findFontFamily(CSSPath: "../cache/fonts/", CSSFile: "fonts_custom.css", HTMLdisplay:TRUE, HTMLdropdown:FALSE);
                                    
                                ?>

                            <!-- SEGMENT BLOCK END -->

                            <!-- GHOST BLOCK START -->

                            <!-- GHOST BLOCK END -->
                        </div>
                        <?php FooterInfo() ; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
