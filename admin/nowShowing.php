<?php
//For feedback, suggestions, or issues please visit https://www.mattsshack.com/plex-movie-poster-display/
include_once('loginCheck.php');
include 'setData.php';
include 'PMPInfo.php';
include 'PMPReleaseNotes.php';
include 'CommonLib.php';
include '../config.php';

//Save Configuration
if (!empty($_POST['saveConfig'])) {
    setData(basename(__FILE__));
}

?>

<!doctype html>
<html lang="en">
<head>
    <?php HeaderInfo(); ?>
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
        <div class="nav-bar">
            <div class="NavBar-container-1T0BJz">
                <div class="NavBar-left-2SrTGf NavBar-side-2kZrHV">
                    <a id="id-261" aria-label="Home" data-uid="id-262" href="../index.php" role="link" class="NavBar-button-diriIs NavBarIconButton-button-eR0v0j IconButton-button-9An-7I Link-link-2n0yJn Link-default-2XA2bN     ">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 560 560" id="plex-icon-navbar-home-560" aria-hidden="true" class="PlexIcon-plexIcon-8Tamaj NavBarIconButton-icon-2gdVPu">
                        <path d="M84 448V291.598a28 28 0 0 1 8.201-19.799L280 84l187.799 187.799A28 28 0 0 1 476 291.598V448c0 15.464-12.536 28-28 28H322V336h-84v140H112c-15.464 0-28-12.536-28-28z">
                        </path>
                        </svg>
                    </a>
                    <a data-uid="id-2" href="#" role="link" class="NavBar-plexLogo-3_NNRw NavBarIconButton-button-eR0v0j IconButton-button-9An-7I Link-link-2n0yJn Link-default-2XA2bN     ">
                    </a>
                </div>
            </div>
        </div>
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
                                                <label class="form-check-label" for="inlineRadio1">Title</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="nowShowingTop" id="csb2" value="summary"<?php if($nowShowingTop == 'summary') echo " checked"?> onChange="nowShowingTopSelected()">
                                                <label class="form-check-label" for="inlineRadio2">Summary</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="nowShowingTop" id="csb3" value="tagline"<?php if($nowShowingTop == 'tagline') echo " checked"?> onChange="nowShowingTopSelected()">
                                                <label class="form-check-label" for="inlineRadio2">Tagline</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="nowShowingTop" id="csb4" value="custom"<?php if($nowShowingTop == 'custom') echo " checked"?> onChange="nowShowingTopSelected()">
                                                <label class="form-check-label" for="inlineRadio3">Custom</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="nowShowingTopText">Custom Top Text</label>
                                        <span class="text-muted"><small>(Optional)</small>:</span></label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="nowShowingTopText" name="nowShowingTopText"
                                                placeholder="Now Showing Top Text" value="<?php echo $nowShowingTopText; ?>" readonly="readonly">
                                        </div>
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
                                            <!-- <label for="nowShowingTopFontSize">Top Font Size:</label> -->
                                            Top Font Size:
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="nowShowingTopFontSize"
                                                    name="nowShowingTopFontSize" value="<?php echo $nowShowingTopFontSize; ?>">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">px</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <!-- <label for="nowShowingTopFontColor">Top Font Color:</label> -->
                                            Top Font Color:
                                            <div class="input-group">
                                                <input type="text" id="nowShowingTopFontColor" name="nowShowingTopFontColor"
                                                    class="form-control" data-position="bottom left"
                                                    value="<?php echo $nowShowingTopFontColor; ?>">
                                            </div>
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
                                            <!-- <label for="nowShowingTopFontOutlineSize">Top Font Outline Size:</label> -->
                                            Top Font Outline Size:
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="nowShowingTopFontOutlineSize"
                                                    name="nowShowingTopFontOutlineSize"
                                                    value="<?php echo $nowShowingTopFontOutlineSize; ?>">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">px</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <!-- <label for="nowShowingTopFontOutlineColor">Top Font Outline Color:</label> -->
                                            Top Font Outline Color:
                                            <div class="input-group">
                                                <input type="text" id="nowShowingTopFontOutlineColor"
                                                    name="nowShowingTopFontOutlineColor" class="form-control"
                                                    data-position="bottom left"
                                                    value="<?php echo $nowShowingTopFontOutlineColor; ?>">
                                            </div>
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
                                    <div class="form-group advanced-setting">
                                        <!-- <div class="input-group"> -->
                                            <!-- <label for="nowShowingTopAutoScale" class="checkLabel">Auto-scale top text</label> -->
                                            <label class="control-label" for="nowShowingTopAutoScale">
                                            <!-- <div class="form-check"> -->
                                                <!-- <input type="checkbox" name="nowShowingTopAutoScale" class="form-check-input" id="nowShowingTopAutoScale" value="1" <?php if ($nowShowingTopAutoScale) echo " checked"?>> -->
                                                <input type="checkbox" name="nowShowingTopAutoScale" id="comingSoonTopAutoScale" value="1" <?php if ($comingSoonTopAutoScale) echo " checked"?>> Auto-scale top text </label>
                                            <!-- </div> -->
                                        <!-- </div> -->
                                    </div>
                                    <div class="form-group">
                                        <hr>
                                        <h3>Bottom Text Option:</h3>
                                        <div class="input-group">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="nowShowingBottom" id="csb1" value="title"<?php if($nowShowingBottom == 'title' || $nowShowingBottom == '') echo " checked"?> onChange="nowShowingBottomSelected()">
                                                <label class="form-check-label" for="inlineRadio1">Title</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="nowShowingBottom" id="csb2" value="summary"<?php if($nowShowingBottom == 'summary') echo " checked"?> onChange="nowShowingBottomSelected()">
                                                <label class="form-check-label" for="inlineRadio2">Summary</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="nowShowingBottom" id="csb3" value="tagline"<?php if($nowShowingBottom == 'tagline') echo " checked"?> onChange="nowShowingBottomSelected()">
                                                <label class="form-check-label" for="inlineRadio2">Tagline</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="nowShowingBottom" id="csb4" value="custom"<?php if($nowShowingBottom == 'custom') echo " checked"?> onChange="nowShowingBottomSelected()">
                                                <label class="form-check-label" for="inlineRadio3">Custom</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="nowShowingBottomText">Custom Bottom Text</label>
                                        <span class="text-muted"><small>(Optional)</small>:</span></label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="nowShowingBottomText"
                                                name="nowShowingBottomText" placeholder="Now Showing Bottom Text"
                                                value="<?php echo $nowShowingBottomText; ?>" readonly="readonly">
                                        </div>
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
                                            <!-- <label for="nowShowingBottomFontSize">Bottom Font Size:</label> -->
                                            Bottom Font Size:
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="nowShowingBottomFontSize"
                                                    name="nowShowingBottomFontSize" value="<?php echo $nowShowingBottomFontSize; ?>">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">px</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <!-- <label for="nowShowingBottomFontColor">Bottom Font Color:</label> -->
                                            Bottom Font Color:
                                            <div class="input-group">
                                                <input type="text" id="nowShowingBottomFontColor" name="nowShowingBottomFontColor"
                                                    class="form-control" data-position="bottom left"
                                                    value="<?php echo $nowShowingBottomFontColor; ?>">
                                            </div>
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
                                            <!-- <label for="nowShowingBottomFontOutlineSize">Bottom Font Outline Size:</label> -->
                                            Bottom Font Outline Size:
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="nowShowingBottomFontOutlineSize"
                                                    name="nowShowingBottomFontOutlineSize"
                                                    value="<?php echo $nowShowingBottomFontOutlineSize; ?>">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">px</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <!-- <label for="nowShowingBottomFontOutlineColor">Bottom Font Outline Color:</label> -->
                                            Bottom Font Outline Color:
                                            <div class="input-group">
                                                <input type="text" id="nowShowingBottomFontOutlineColor"
                                                    name="nowShowingBottomFontOutlineColor" class="form-control"
                                                    data-position="bottom left"
                                                    value="<?php echo $nowShowingBottomFontOutlineColor; ?>">
                                            </div>
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
                                    <div class="form-group advanced-setting">
                                        <!-- <div class="input-group"> -->
                                            <!-- <label for="nowShowingBottomAutoScale" class="checkLabel">Auto-scale bottom text</label> -->
                                            <label class="control-label" for="nowShowingBottomAutoScale">
                                            <!-- <div class="form-check"> -->
                                                <!-- <input type="checkbox" name="nowShowingBottomAutoScale" class="form-check-input" id="nowShowingBottomAutoScale" value="1" <?php if ($nowShowingBottomAutoScale) echo " checked"?>> -->
                                                <input type="checkbox" name="nowShowingBottomAutoScale" id="nowShowingBottomAutoScale" value="1" <?php if ($comingSoonBottomAutoScale) echo " checked"?>> Auto-scale bottom text </label>
                                            <!-- </div> -->
                                        <!-- </div> -->
                                    </div>
                                    <div class="form-group">
                                        <hr>
                                        <div class="form-alignment input-group">
                                            <label for="pmpDisplayProgress">Progress Bar: &nbsp;</label>
                                            <select class="fieldInfo-select custom-select d-block w-100" id="pmpDisplayProgress" name="pmpDisplayProgress">
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
                                    </div>
                                    <div class="form-group advanced-setting row">
                                        <div class="col-md-6 mb-3">
                                            <label for="pmpDisplayProgressSize">Progress Bar Height:</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="pmpDisplayProgressSize"
                                                    name="pmpDisplayProgressSize" value="<?php echo $pmpDisplayProgressSize; ?>">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">px</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="pmpDisplayProgressColor">Progress Bar Color:</label>
                                            <div class="input-group">
                                                <input type="text" id="pmpDisplayProgressColor" name="pmpDisplayProgressColor"
                                                    class="form-control" data-position="bottom left"
                                                    value="<?php echo $pmpDisplayProgressColor; ?>">
                                            </div>
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
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
