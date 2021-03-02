<?php
//For feedback, suggestions, or issues please visit https://www.mattsshack.com/plex-movie-poster-display/
include_once('../assets/plexmovieposter/loginCheck.php');
include '../assets/plexmovieposter/CommonLib.php';
include '../assets/plexmovieposter/setData.php';
include '../config.php';
include '../assets/plexmovieposter/FontLib.php';

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
                            Coming Soon Configuration
                        </h2>
                        <div>
                        <?php AdvancedBar() ;?>
                            <form id="server-settings-form" method="post" class="needs-validation" novalidate enctype="multipart/form-data">
                                <!-- SEGMENT BLOCK START -->
                                    <div class="form-group advanced-setting">
                                        <input type="checkbox" name="comingSoonBackgroundArt" id="comingSoonBackgroundArt" value="1" <?php if ($comingSoonBackgroundArt) echo " checked"?>>
                                        Background Art

                                        <p class="help-block">
                                            Set background art to match background of Plex media.
                                        </p>
                                    </div>

                                    <div class="form-group advanced-setting">
                                        Show Movies:&nbsp;

                                        <select style="display: inline;"
                                            id="comingSoonShowSelection" name="comingSoonShowSelection">
                                            <option value="unwatched" <?php if ($comingSoonShowSelection == 'unwatched') {
                                                echo "selected";
                                            } ?>>Unwatched
                                            </option>
                                            <option value="all" <?php if ($comingSoonShowSelection == 'all') {
                                                echo "selected";
                                            } ?>>All
                                            </option>
                                            <option value="recentlyAdded" <?php if ($comingSoonShowSelection == 'recentlyAdded') {
                                                echo "selected";
                                            } ?>>Recently Added
                                            </option>
                                            <option value="newest" <?php if ($comingSoonShowSelection == 'newest') {
                                                echo "selected";
                                            } ?>>Newest
                                            </option>
                                        </select>

                                        <!-- <p class="help-block">
                                        </p> -->
                                        <hr>
                                    </div>

                                    <div class="form-group">
                                        <h3>Top Text Option:</h3>
                                        <div class="input-group">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="comingSoonTop" id="csb1" value="title"<?php if($comingSoonTop == 'title' || $comingSoonTop == '') echo " checked"?> onChange="comingSoonTopSelected()">
                                                Title
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="comingSoonTop" id="csb2" value="summary"<?php if($comingSoonTop == 'summary') echo " checked"?> onChange="comingSoonTopSelected()">
                                                Summary
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="comingSoonTop" id="csb3" value="tagline"<?php if($comingSoonTop == 'tagline') echo " checked"?> onChange="comingSoonTopSelected()">
                                                Tagline
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="comingSoonTop" id="csb4" value="custom"<?php if($comingSoonTop == 'custom') echo " checked"?> onChange="comingSoonTopSelected()">
                                                Custom
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        Custom Top Text:

                                        <input type="text" class="form-control"
                                            id="comingSoonTopText" name="comingSoonTopText"
                                            placeholder="Coming Soon Top Text"
                                            value="<?php echo $comingSoonTopText; ?>" readonly="readonly">

                                        <p class="help-block">
                                            <small>Optional</small>
                                        </p>

                                        <script>
                                            $(function(){
                                                //First call for the load
                                                comingSoonTopSelected();

                                                //Second call for change event
                                                $("input[type=radio]").change( comingSoonTopSelected );
                                            });

                                            // Look at moving script to js file
                                            function comingSoonTopSelected() {
                                                // readonly: input can't be modified
                                                // disabled: input has no form function
                                                var result = document.querySelector('input[name="comingSoonTop"]:checked').value;
                                                if(result=="custom") {
                                                    // document.getElementById("comingSoonTopText").setAttribute('disabled', true);
                                                    document.getElementById("comingSoonTopText").removeAttribute('readonly');
                                                }
                                                else {
                                                    document.getElementById("comingSoonTopText").setAttribute('readonly', true);
                                                    // document.getElementById("comingSoonTopText").removeAttribute('disabled');
                                                }
                                            }
                                        </script>
                                    </div>

                                    <div class="form-group advanced-setting row">
                                        <div class="col-md-6 mb-3"> <!-- Replace this type of div -->
                                            Top Font Size:

                                            <input type="text" class="form-control"
                                                id="comingSoonTopFontSize" name="comingSoonTopFontSize"
                                                value="<?php echo $comingSoonTopFontSize; ?>">

                                            <p class="help-block">
                                                px
                                            </p>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            Top Font Color:

                                            <input type="text" class="form-control"
                                                id="comingSoonTopFontColor" name="comingSoonTopFontColor"
                                                data-position="bottom left"
                                                value="<?php echo $comingSoonTopFontColor; ?>">

                                            <label for="comingSoonTopFontColorPicker" style="cursor: pointer;">
                                                <div class= "label label-btn label-primary">
                                                    <i class="label-icon glyphicon tint"></i>
                                                    Browse Colors
                                                </div>
                                            </label>

                                            <input type="color" name="comingSoonTopFontColorPicker" id="comingSoonTopFontColorPicker" style="opacity: 0; display: inline;"
                                                value="<?php echo $comingSoonTopFontColor; ?>"
                                                onchange="setColor('comingSoonTopFontColorPicker', 'comingSoonTopFontColor')">

                                            <!-- <p class="help-block">
                                            </p> -->
                                        </div>
                                    </div>

                                    <div class="form-group advanced-setting row">
                                        <div class="col-md-6 mb-3">
                                            Top Font Outline Size:

                                            <input type="text" class="form-control"
                                                id="comingSoonTopFontOutlineSize" name="comingSoonTopFontOutlineSize"
                                                value="<?php echo $comingSoonTopFontOutlineSize; ?>">

                                            <p class="help-block">
                                                px
                                            </p>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            Top Font Outline Color:

                                            <input type="text" class="form-control"
                                                id="comingSoonTopFontOutlineColor" name="comingSoonTopFontOutlineColor"
                                                data-position="bottom left"
                                                value="<?php echo $comingSoonTopFontOutlineColor; ?>">

                                            <label for="comingSoonTopFontOutlineColorPicker" style="cursor: pointer;">
                                                <div class= "label label-btn label-primary">
                                                    <i class="label-icon glyphicon tint"></i>
                                                    Browse Colors
                                                </div>
                                            </label>

                                            <input type="color" name="comingSoonTopFontOutlineColorPicker" id="comingSoonTopFontOutlineColorPicker" style="opacity: 0; display: inline;"
                                                value="<?php echo $comingSoonTopFontOutlineColor; ?>"
                                                onchange="setColor('comingSoonTopFontOutlineColorPicker', 'comingSoonTopFontOutlineColor')">

                                            <!-- <p class="help-block">
                                            </p> -->
                                        </div>
                                    </div>

                                    <div class="form-group advanced-setting row">
                                        <div class="col-md-6 mb-3">
                                            <input type="checkbox" name="comingSoonTopFontEnabled" id="comingSoonTopFontEnabled" value="1" <?php if ($comingSoonTopFontEnabled) echo " checked"?>>
                                            Use Custom Font (Top)

                                            <!-- <p class="help-block">
                                            </p> -->
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            Custom Font (Top): &nbsp;
                                            <?php
                                                // PHP 7.x
                                                findFontFamily_Full(FALSE, TRUE, "comingSoonTopFontID");
                                                // PHP 8.x
                                                //findFontFamily(CSSPath: "../assets/plexmovieposter/", CSSFile: "fonts_stock.css", HTMLdropdown: TRUE, fieldID: "commingSoonTopFontID");
                                            ?>

                                            <!-- <p class="help-block">
                                            </p> -->
                                        </div>
                                    </div>

                                    <div class="form-group advanced-setting">
                                        <input type="checkbox" name="comingSoonTopAutoScale" id="comingSoonTopAutoScale" value="1" <?php if ($comingSoonTopAutoScale) echo " checked"?>>
                                        Auto-scale top text

                                        <!-- <p class="help-block">
                                        </p> -->
                                    </div>

                                    <div class="form-group">
                                        <hr>
                                        <h3>Bottom Text Option:</h3>
                                        <div class="input-group">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="comingSoonBottom" id="csb1" value="title"<?php if($comingSoonBottom == 'title' || $comingSoonBottom == '') echo " checked"?> onChange="comingSoonBottomSelected()">
                                                Title
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="comingSoonBottom" id="csb2" value="summary"<?php if($comingSoonBottom == 'summary') echo " checked"?> onChange="comingSoonBottomSelected()">
                                                Summary
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="comingSoonBottom" id="csb3" value="tagline"<?php if($comingSoonBottom == 'tagline') echo " checked"?> onChange="comingSoonBottomSelected()">
                                                Tagline
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="comingSoonBottom" id="csb4" value="custom"<?php if($comingSoonBottom == 'custom') echo " checked"?> onChange="comingSoonBottomSelected()">
                                                Custom
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        Custom Bottom Text:

                                        <input type="text" class="form-control"
                                            id="comingSoonBottomText" name="comingSoonBottomText"
                                            placeholder="Coming Soon Bottom Text"
                                            value="<?php echo $comingSoonBottomText; ?>" readonly="readonly">

                                        <p class="help-block">
                                            <small>Optional</small>
                                        </p>

                                        <script>
                                            $(function(){
                                                //First call for the load
                                                comingSoonBottomSelected();

                                                //Second call for change event
                                                $("input[type=radio]").change( comingSoonBottomSelected );
                                            });

                                            function comingSoonBottomSelected() {
                                                // readonly: input can't be modified
                                                // disabled: input has no form function
                                                var result = document.querySelector('input[name="comingSoonBottom"]:checked').value;
                                                if(result=="custom") {
                                                    // document.getElementById("comingSoonBottomText").setAttribute('disabled', true);
                                                    document.getElementById("comingSoonBottomText").removeAttribute('readonly');
                                                }
                                                else {
                                                    document.getElementById("comingSoonBottomText").setAttribute('readonly', true);
                                                    // document.getElementById("comingSoonBottomText").removeAttribute('disabled');
                                                }
                                            }
                                        </script>
                                    </div>

                                    <div class="form-group advanced-setting row">
                                        <div class="col-md-6 mb-3">
                                            Bottom Font Size:

                                            <input type="text" class="form-control"
                                                id="comingSoonBottomFontSize" name="comingSoonBottomFontSize"
                                                value="<?php echo $comingSoonBottomFontSize; ?>">

                                            <p class="help-block">
                                                px
                                            </p>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            Bottom Font Color:

                                            <input type="text" class="form-control"
                                                id="comingSoonBottomFontColor" name="comingSoonBottomFontColor"
                                                data-position="bottom left"
                                                value="<?php echo $comingSoonBottomFontColor; ?>">

                                            <label for="comingSoonBottomFontColorPicker" style="cursor: pointer;">
                                                <div class= "label label-btn label-primary">
                                                    <i class="label-icon glyphicon tint"></i>
                                                    Browse Colors
                                                </div>
                                            </label>

                                            <input type="color" name="comingSoonBottomFontColorPicker" id="comingSoonBottomFontColorPicker" style="opacity: 0; display: inline;"
                                                value="<?php echo $comingSoonBottomFontColor; ?>"
                                                onchange="setColor('comingSoonBottomFontColorPicker', 'comingSoonBottomFontColor')">

                                            <!-- <p class="help-block">
                                            </p> -->
                                        </div>
                                    </div>

                                    <div class="form-group advanced-setting row">
                                        <div class="col-md-6 mb-3">
                                            Bottom Font Outline Size:

                                            <input type="text" class="form-control"
                                                id="comingSoonBottomFontOutlineSize" name="comingSoonBottomFontOutlineSize"
                                                value="<?php echo $comingSoonBottomFontOutlineSize; ?>">

                                            <p class="help-block">
                                                px
                                            </p>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            Bottom Font Outline Color:

                                            <input type="text" class="form-control"
                                                id="comingSoonBottomFontOutlineColor" name="comingSoonBottomFontOutlineColor"
                                                data-position="bottom left"
                                                value="<?php echo $comingSoonBottomFontOutlineColor; ?>">

                                            <label for="comingSoonBottomFontOutlineColorPicker" style="cursor: pointer;">
                                                <div class= "label label-btn label-primary">
                                                    <i class="label-icon glyphicon tint"></i>
                                                    Browse Colors
                                                </div>
                                            </label>

                                            <input type="color" name="comingSoonBottomFontOutlineColorPicker" id="comingSoonBottomFontOutlineColorPicker" style="opacity: 0; display: inline;"
                                                value="<?php echo $comingSoonBottomFontOutlineColor; ?>"
                                                onchange="setColor('comingSoonBottomFontOutlineColorPicker', 'comingSoonBottomFontOutlineColor')">

                                            <!-- <p class="help-block">
                                            </p> -->
                                        </div>
                                    </div>

                                    <div class="form-group advanced-setting row">
                                        <div class="col-md-6 mb-3">
                                            <input type="checkbox" name="comingSoonBottomFontEnabled" id="comingSoonBottomFontEnabled" value="1" <?php if ($comingSoonBottomFontEnabled) echo " checked"?>>
                                            Use Custom Font (Bottom)

                                            <!-- <p class="help-block">
                                            </p> -->
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            Custom Font (Bottom): &nbsp;
                                            <?php
                                                // PHP 7.x
                                                findFontFamily_Full(FALSE, TRUE, "comingSoonBottomFontID");
                                                // PHP 8.x
                                                //findFontFamily(CSSPath: "../assets/plexmovieposter/", CSSFile: "fonts_stock.css", HTMLdropdown: TRUE, fieldID: "comingSoonBottomFontID");
                                            ?>

                                            <!-- <p class="help-block">
                                            </p> -->
                                        </div>
                                    </div>

                                    <div class="form-group advanced-setting">
                                        <input type="checkbox" name="comingSoonBottomAutoScale" id="comingSoonBottomAutoScale" value="1" <?php if ($comingSoonBottomAutoScale) echo " checked"?>>
                                        Auto-scale bottom text

                                        <!-- <p class="help-block">
                                        </p> -->
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
