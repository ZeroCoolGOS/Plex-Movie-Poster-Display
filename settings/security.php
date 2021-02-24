<?php
//For feedback, suggestions, or issues please visit https://www.mattsshack.com/plex-movie-poster-display/
include_once('../assets/plexmovieposter/loginCheck.php');
include '../assets/plexmovieposter/CommonLib.php';
include '../assets/plexmovieposter/setData.php';
include '../config.php';

//Save Configuration
if (!empty($_POST['saveConfig'])) {
    setData(basename(__FILE__));
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
                            Security Configuration
                        </h2>
                        <div>
                        <?php AdvancedBar() ;?>
                            <form id="server-settings-form" method="post" class="needs-validation" novalidate enctype="multipart/form-data">
                                <!-- SEGMENT BLOCK START -->
                                    <div class="form-group">
                                        Username:&nbsp;
                                        <input type="text" style="display: inline;" class="fieldInfo-username form-control" id="pmpUsername" name="pmpUsername" placeholder="Username" value="<?php echo $pmpUsername; ?>" required>
                                        <div class="invalid-feedback" style="width: 100%;">Movie Poster Display Username.</div>

                                        <!-- <p class="help-block">
                                        </p> -->
                                    </div>

                                    <div class="form-group" id="password_view">
                                        Password:&nbsp;&nbsp;
                                        <input type="password" style="display: inline;" class="fieldInfo-password form-control" id="pmpPassword" name="pmpPassword" placeholder="Password" value="<?php echo $pmpPassword; ?>" required>
                                        &nbsp;
                                        <button class="btn btn-secondary" type="button" id="password_view_btn" onclick="passwordView()">Show</button>

                                        <!-- <p class="help-block">
                                        </p> -->
                                    </div>
                                <!-- SEGMENT BLOCK END -->

                                <!-- GHOST BLOCK START -->
                                    <?php ghostData(basename(__FILE__)) ;?>
                                <!-- GHOST BLOCK END -->

                                <div class="form-footer">
                                    <div class="form-alignment input-group">
                                        <button name="saveConfig" class="submit-btn btn btn-lg btn-primary btn-loading " type="submit" value="saveConfig">
                                            <div class="loading loading-sm"></div>
                                            <span class="btn-label">SAVE CHANGES</span>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <?php FooterInfo() ; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
