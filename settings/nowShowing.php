<?php
//For feedback, suggestions, or issues please visit https://www.mattsshack.com/plex-movie-poster-display/
include_once('../assets/plexmovieposter/loginCheck.php');
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
                            Now Showing Configuration
                        </h2>
                        <div>
                        <div class="server-settings-container show-advanced">
                            <div class="filter-bar">
                                <div class="filter-bar-right">
                                    <input class="toggle-advanced-btn btn btn-sm btn-default advanced-settingButton" type="button" value="SHOW ADVANCED"></input>
                                </div>
                            </div>
                        </div>
                            <form id="server-settings-form" method="post" class="needs-validation" novalidate enctype="multipart/form-data">
                                <!-- SEGMENT BLOCK START -->
                                    <div class="form-group">
                                        <h3>Top Text Option:</h3>
                                        <div class="input-group">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="nowShowingTop" id="csb1" value="title"<?php if($nowShowingTop == 'title' || $nowShowingTop == '') echo " checked"?> onChange="nowShowingTopSelected()">
                                                Title
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="nowShowingTop" id="csb2" value="summary"<?php if($nowShowingTop == 'summary') echo " checked"?> onChange="nowShowingTopSelected()">
                                                Summary
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="nowShowingTop" id="csb3" value="tagline"<?php if($nowShowingTop == 'tagline') echo " checked"?> onChange="nowShowingTopSelected()">
                                                Tagline
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="nowShowingTop" id="csb4" value="custom"<?php if($nowShowingTop == 'custom') echo " checked"?> onChange="nowShowingTopSelected()">
                                                Custom
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        Custom Top Text:

                                        <input type="text" class="form-control"
                                            id="nowShowingTopText" name="nowShowingTopText"
                                            placeholder="Now Showing Top Text"
                                            value="<?php echo $nowShowingTopText; ?>" readonly="readonly">

                                        <p class="help-block">
                                            <small>Optional</small>
                                        </p>

                                        <script>
                                            $(function(){
                                                //First call for the load
                                                nowShowingTopSelected();

                                                //Second call for change event
                                                $("input[type=radio]").change( nowShowingTopSelected );
                                            });

                                            function nowShowingTopSelected() {
                                                // readonly: input can't be modified
                                                // disabled: input has no form function
                                                var result = document.querySelector('input[name="nowShowingTop"]:checked').value;
                                                if(result=="custom") {
                                                    // document.getElementById("nowShowingTopText").setAttribute('disabled', true);
                                                    document.getElementById("nowShowingTopText").removeAttribute('readonly');
                                                }
                                                else {
                                                    document.getElementById("nowShowingTopText").setAttribute('readonly', true);
                                                    // document.getElementById("nowShowingTopText").removeAttribute('disabled');
                                                }
                                            }
                                        </script>
                                    </div>

                                    <div class="form-group advanced-setting row">
                                        <div class="col-md-6 mb-3">
                                            Top Font Size:

                                            <input type="text" class="form-control"
                                                id="nowShowingTopFontSize" name="nowShowingTopFontSize"
                                                value="<?php echo $nowShowingTopFontSize; ?>">

                                            <p class="help-block">
                                                px
                                            </p>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            Top Font Color:

                                            <input type="text" class="form-control"
                                                id="nowShowingTopFontColor" name="nowShowingTopFontColor"
                                                data-position="bottom left"
                                                value="<?php echo $nowShowingTopFontColor; ?>">

                                            <!-- <p class="help-block">
                                            </p> -->
                                        </div>

                                        <script>
                                            $(function () {
                                                $('#nowShowingTopFontColor').colorpicker();
                                                $('#nowShowingTopFontColor').on('colorpickerChange', function (event) {
                                                    $('.jumbotron').css('background-color', event.color.toString());
                                                });
                                            });
                                        </script>
                                    </div>

                                    <div class="form-group advanced-setting row">
                                        <div class="col-md-6 mb-3">
                                            Top Font Outline Size:

                                            <input type="text" class="form-control"
                                                id="nowShowingTopFontOutlineSize" name="nowShowingTopFontOutlineSize"
                                                value="<?php echo $nowShowingTopFontOutlineSize; ?>">

                                            <p class="help-block">
                                                px
                                            </p>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            Top Font Outline Color:

                                            <input type="text" class="form-control"
                                                id="nowShowingTopFontOutlineColor" name="nowShowingTopFontOutlineColor"
                                                data-position="bottom left"
                                                value="<?php echo $nowShowingTopFontOutlineColor; ?>">

                                            <!-- <p class="help-block">
                                            </p> -->
                                        </div>

                                        <script>
                                            $(function () {
                                                $('#nowShowingTopFontOutlineColor').colorpicker();
                                                $('#nowShowingTopFontOutlineColor').on('colorpickerChange', function (event) {
                                                    $('.jumbotron').css('background-color', event.color.toString());
                                                });
                                            });
                                        </script>
                                    </div>

                                    <div class="form-group advanced-setting row">
                                        <div class="col-md-6 mb-3">
                                            <input type="checkbox" name="nowShowingTopFontEnabled" id="nowShowingTopFontEnabled" value="1" <?php if ($nowShowingTopFontEnabled) echo " checked"?>>
                                            Use Custom Font (Top)

                                            <!-- <p class="help-block">
                                            </p> -->
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            Custom Font (Top): &nbsp;
                                            <?php 
                                                // PHP 7.x
                                                findFontFamily_Full(FALSE, TRUE, "nowShowingTopFontID");
                                                // PHP 8.x
                                                //findFontFamily(CSSPath: "../assets/plexmovieposter/", CSSFile: "fonts_stock.css", HTMLdropdown: TRUE, fieldID: "nowShowingTopFontID");
                                            ?>
                                            <!-- <p class="help-block">
                                            </p> -->
                                        </div>
                                    </div>

                                    <div class="form-group advanced-setting">
                                        <input type="checkbox" name="nowShowingTopAutoScale" id="nowShowingTopAutoScale" value="1" <?php if ($nowShowingTopAutoScale) echo " checked"?>>
                                        Auto-scale top text

                                        <!-- <p class="help-block">
                                        </p> -->
                                    </div>

                                    <div class="form-group">
                                        <hr>
                                        <h3>Bottom Text Option:</h3>
                                        <div class="input-group">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="nowShowingBottom" id="csb1" value="title"<?php if($nowShowingBottom == 'title' || $nowShowingBottom == '') echo " checked"?> onChange="nowShowingBottomSelected()">
                                                Title
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="nowShowingBottom" id="csb2" value="summary"<?php if($nowShowingBottom == 'summary') echo " checked"?> onChange="nowShowingBottomSelected()">
                                                Summary
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="nowShowingBottom" id="csb3" value="tagline"<?php if($nowShowingBottom == 'tagline') echo " checked"?> onChange="nowShowingBottomSelected()">
                                                Tagline
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="nowShowingBottom" id="csb4" value="custom"<?php if($nowShowingBottom == 'custom') echo " checked"?> onChange="nowShowingBottomSelected()">
                                                Custom
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        Custom Bottom Text:

                                        <input type="text" class="form-control"
                                            id="nowShowingBottomText" name="nowShowingBottomText"
                                            placeholder="Now Showing Bottom Text"
                                            value="<?php echo $nowShowingBottomText; ?>" readonly="readonly">

                                        <p class="help-block">
                                            <small>Optional</small>
                                        </p>

                                        <script>
                                            $(function(){
                                                //First call for the load
                                                nowShowingBottomSelected();

                                                //Second call for change event
                                                $("input[type=radio]").change( nowShowingBottomSelected );
                                            });

                                            function nowShowingBottomSelected() {
                                                // readonly: input can't be modified
                                                // disabled: input has no form function
                                                var result = document.querySelector('input[name="nowShowingBottom"]:checked').value;
                                                if(result=="custom") {
                                                    // document.getElementById("nowShowingBottomText").setAttribute('disabled', true);
                                                    document.getElementById("nowShowingBottomText").removeAttribute('readonly');
                                                }
                                                else {
                                                    document.getElementById("nowShowingBottomText").setAttribute('readonly', true);
                                                    // document.getElementById("nowShowingBottomText").removeAttribute('disabled');
                                                }
                                            }
                                        </script>
                                    </div>

                                    <div class="form-group advanced-setting row">
                                        <div class="col-md-6 mb-3">
                                            Bottom Font Size:

                                            <input type="text" class="form-control"
                                                id="nowShowingBottomFontSize" name="nowShowingBottomFontSize"
                                                value="<?php echo $nowShowingBottomFontSize; ?>">

                                            <p class="help-block">
                                                px
                                            </p>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            Bottom Font Color:

                                            <input type="text" class="form-control"
                                                id="nowShowingBottomFontColor" name="nowShowingBottomFontColor"
                                                data-position="bottom left"
                                                value="<?php echo $nowShowingBottomFontColor; ?>">

                                            <!-- <p class="help-block">
                                            </p> -->
                                        </div>

                                        <script>
                                            $(function () {
                                                $('#nowShowingBottomFontColor').colorpicker();
                                                $('#nowShowingBottomFontColor').on('colorpickerChange', function (event) {
                                                    $('.jumbotron').css('background-color', event.color.toString());
                                                });
                                            });
                                        </script>
                                    </div>

                                    <div class="form-group advanced-setting row">
                                        <div class="col-md-6 mb-3">
                                            Bottom Font Outline Size:

                                            <input type="text" class="form-control"
                                                id="nowShowingBottomFontOutlineSize" name="nowShowingBottomFontOutlineSize"
                                                value="<?php echo $nowShowingBottomFontOutlineSize; ?>">

                                            <p class="help-block">
                                                px
                                            </p>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            Bottom Font Outline Color:

                                            <input type="text" class="form-control"
                                                id="nowShowingBottomFontOutlineColor" name="nowShowingBottomFontOutlineColor"
                                                data-position="bottom left"
                                                value="<?php echo $nowShowingBottomFontOutlineColor; ?>">

                                            <!-- <p class="help-block">
                                            </p> -->
                                        </div>

                                        <script>
                                            $(function () {
                                                $('#nowShowingBottomFontOutlineColor').colorpicker();
                                                $('#nowShowingBottomFontOutlineColor').on('colorpickerChange', function (event) {
                                                    $('.jumbotron').css('background-color', event.color.toString());
                                                });
                                            });
                                        </script>
                                    </div>

                                    <div class="form-group advanced-setting row">
                                        <div class="col-md-6 mb-3">
                                            <input type="checkbox" name="nowShowingBottomFontEnabled" id="nowShowingBottomFontEnabled" value="1" <?php if ($nowShowingBottomFontEnabled) echo " checked"?>>
                                            Use Custom Font (Bottom)

                                            <!-- <p class="help-block">
                                            </p> -->
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            Custom Font (Bottom): &nbsp;
                                            <?php 
                                                // PHP 7.x
                                                findFontFamily_Full(FALSE, TRUE, "nowShowingBottomFontID");
                                                // PHP 8.x
                                                //findFontFamily(CSSPath: "../assets/plexmovieposter/", CSSFile: "fonts_stock.css", HTMLdropdown: TRUE, fieldID: "nowShowingBottomFontID");
                                            ?>

                                            <!-- <p class="help-block">
                                            </p> -->
                                        </div>
                                    </div>

                                    <div class="form-group advanced-setting">
                                        <input type="checkbox" name="nowShowingBottomAutoScale" id="nowShowingBottomAutoScale" value="1" <?php if ($nowShowingBottomAutoScale) echo " checked"?>>
                                        Auto-scale bottom text

                                        <!-- <p class="help-block">
                                        </p> -->
                                    </div>

                                    <div class="form-group">
                                        <hr>
                                        Progress Bar:&nbsp;

                                        <select id="pmpDisplayProgress" name="pmpDisplayProgress">
                                            <option value="Disabled" <?php if ($pmpDisplayProgress == 'Disabled') {
                                                echo "selected";
                                            } ?>>Disabled
                                            </option>
                                            <option value="Enabled" <?php if ($pmpDisplayProgress == 'Enabled') {
                                                echo "selected";
                                            } ?>>Enabled
                                            </option>
                                        </select>
                                    </div>

                                    <div class="form-group advanced-setting row">
                                        <div class="col-md-6 mb-3">
                                            Progress Bar Height:

                                            <input type="text" class="form-control"
                                                id="pmpDisplayProgressSize" name="pmpDisplayProgressSize"
                                                value="<?php echo $pmpDisplayProgressSize; ?>">

                                            <p class="help-block">
                                                px
                                            </p>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            Progress Bar Color:

                                            <input type="text" class="form-control"
                                                id="pmpDisplayProgressColor" name="pmpDisplayProgressColor"
                                                data-position="bottom left"
                                                value="<?php echo $pmpDisplayProgressColor; ?>">

                                            <!-- <p class="help-block">
                                            </p> -->
                                        </div>

                                        <script>
                                            $(function () {
                                                $('#pmpDisplayProgressColor').colorpicker();
                                                $('#pmpDisplayProgressColor').on('colorpickerChange', function (event) {
                                                    $('.jumbotron').css('background-color', event.color.toString());
                                                });
                                            });
                                        </script>
                                    </div>
                                <!-- SEGMENT BLOCK END -->

                                <!-- GHOST BLOCK START -->
                                    <?php ghostData(basename(__FILE__)) ;?>
                                <!-- GHOST BLOCK END -->

                                <div class="form-footer">
                                    <!-- <button name="saveConfig" class="submit-btn btn btn-lg btn-primary btn-loading disabled" type="submit" value="saveConfig"> -->
                                    <button name="saveConfig" class="submit-btn btn btn-lg btn-primary btn-loading " type="submit" value="saveConfig">
                                        <div class="loading loading-sm"></div>
                                        <span class="btn-label">SAVE CHANGES</span>
                                    </button>
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
