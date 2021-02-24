<?php
//For feedback, suggestions, or issues please visit https://www.mattsshack.com/plex-movie-poster-display/
include_once('../assets/plexmovieposter/loginCheck.php');
include '../assets/plexmovieposter/CommonLib.php';
include '../assets/plexmovieposter/setData.php';
include '../config.php';
include '../assets/plexmovieposter/FontLib.php';
include '../assets/plexmovieposter/importExportLib.php';

//Save Configuration
if (!empty($_POST['saveConfig'])) {
    setData(basename(__FILE__));
}

$rootDir = "../";
$exportFileName = "FontArchive_Custom.zip";

GenerateCSS_Font_ALL();
exportFiles_DownloadLink("DownloadLink", "$rootDir/cache/archive", "$exportFileName");

if (isset($_POST["btn_zipDL"])) {
    exportFiles("$rootDir/cache/fonts", "$rootDir/cache/archive", "$exportFileName", "zip", TRUE);
}

if (isset($_POST["btn_zip"])) {
    importFiles("zip_file");
}

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
                <div class="settings-core"></div>
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
                            Font Configuration
                        </h2>
                        <div>
                        <?php AdvancedBar() ;?>
                            <!-- SEGMENT BLOCK START -->
                                <div class="format-group ">
                                    Import Font or Bundle:

                                    <form action="fonts.php" method="post" enctype="multipart/form-data">
                                        <label for="zip_file" style="cursor: pointer;">
                                            <div class= "label label-btn label-primary">
                                                <i class="label-icon glyphicon file"></i>
                                                Browse File
                                            </div>
                                        </label>

                                        <input type="file" name="zip_file" id="zip_file" accept=".zip,.ttf,.pmp" style="opacity: 0; display: inline;" onchange="showName_zip()">
                                        <p>
                                            <div id="UploadFileName_Zip" style="font-size: smaller;">
                                                Upload File:
                                                <i>None</i>
                                            </div>
                                        </p>

                                        <label for="btn_zip" style="cursor: pointer;">
                                            <div class= "label label-btn label-primary">
                                                <i class="label-icon glyphicon upload"></i>
                                                Upload File
                                            </div>
                                        </label>
                                        <input type="submit" value="Upload Zip" name="btn_zip" id="btn_zip" style="opacity: 0;">
                                    </form>
                                </div>

                                <div class="format-group ">
                                    <hr>
                                    Download Bundle:

                                    <form method="post" enctype="multipart/form-data">
                                        <label for="btn_zipDL" style="cursor: pointer;">
                                            <div class= "label label-btn label-primary">
                                                <i class="label-icon glyphicon upload"></i>
                                                Generate Bundle
                                            </div>
                                        </label>
                                        <input type="submit" value="Generate Zip" name="btn_zipDL" id="btn_zipDL" style="opacity: 0;" >
                                    </form>

                                    <br>

                                    <?php
                                        if (isset($DownloadLink)) {
                                            echo $DownloadLink;
                                        }
                                    ?>
                                </div>

                                <div class="format-group ">
                                    <hr>
                                    <?php
                                        // PHP 7.x
                                        // findFontFamily("../assets/plexmovieposter/", "fonts_stock.css", TRUE, FALSE, "");
                                        // findFontFamily("../cache/fonts/", "fonts_custom.css", TRUE, FALSE, "");
                                        findFontFamily_Full(TRUE, FALSE, "");
                                        // PHP 8.x
                                        // findFontFamily(CSSPath: "../assets/plexmovieposter/", CSSFile: "fonts_stock.css", HTMLdisplay: TRUE, HTMLdropdown: FALSE);
                                        // findFontFamily(CSSPath: "../cache/fonts/", CSSFile: "fonts_custom.css", HTMLdisplay:TRUE, HTMLdropdown:FALSE);

                                ?>
                                </div>
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
