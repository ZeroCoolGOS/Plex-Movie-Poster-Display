<?php
//For feedback, suggestions, or issues please visit https://www.mattsshack.com/plex-movie-poster-display/
// include_once('../assets/plexmovieposter/loginCheck.php');
include '../assets/plexmovieposter/setData.php';
include 'PMPInfo.php';
include 'PMPReleaseNotes.php';
include '../assets/plexmovieposter/CommonLib.php';
include '../config.php';

//Save Configuration
if (!empty($_POST['saveConfig'])) {
    setData(basename(__FILE__));
}

uploadFont();

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

                                <div class="form-group advanced-setting">
                                    Custom Uploaded Font:    
                                    <div style="font-family: 'CustomFont'; font-size: large; display: inline;">
                                        Sample
                                    </div>
                                </div>

                                <!-- <div class="form-group">
                                    <div style="font-family: '';">
                                        TEMPLATE
                                    </div>
                                </div> -->

                                <div class="form-group">
                                    Custom Uploaded Font:
                                    <div style="font-family: 'CustomFont'; font-size: large; display: inline;">
                                        Sample
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div style="font-family: 'A Bugs Life'; font-size: large; display: inline;">
                                        A Bug's Life
                                    </div>
                                    <div style="font-family: 'A Bugs Life - Debugged'; font-size: large; display: inline;">
                                        A Bug's Life - Debugged
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div style="font-family: '007 GoldenEye';font-size: large; display: inline;">
                                        007 GoldenEye
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div style="font-family: 'A Clockwork Orange';font-size: large; display: inline;">
                                        A Clockwork Orange
                                    </div>

                                    <div style="font-family: 'A Clockwork Orange - Backfill';font-size: large; display: inline;">
                                        A Clockwork Orange - Backfill
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div style="font-family: 'Addams Family';font-size: large; display: inline;">
                                        Addams Family
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div style="font-family: 'alice-in-wonderland';font-size: large; display: inline;">
                                        alice-in-wonderland
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div style="font-family: 'alien';font-size: large; display: inline;">
                                        Alien
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div style="font-family: 'amazing-spider-man-movie_A';font-size: large; display: inline;">
                                        Amazing Spider Man Movie
                                    </div>

                                    <div style="font-family: 'amazing-spider-man-movie_B';font-size: large; display: inline;">
                                        Amazing Spider Man Movie
                                    </div>

                                    <div style="font-family: 'amazing-spider-man-movie_C';font-size: large; display: inline;">
                                        Amazing Spider Man Movie
                                    </div>

                                    <div style="font-family: 'amazing-spider-man-movie_D';font-size: large; display: inline;">
                                        Amazing Spider Man Movie
                                    </div>
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
