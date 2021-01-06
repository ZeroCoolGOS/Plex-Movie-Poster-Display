<?php
//For feedback, suggestions, or issues please visit https://www.mattsshack.com/plex-movie-poster-display/
include_once('loginCheck.php');
include 'setData.php';

//Clear Poster Cache Directory
if (!empty($_POST['clearPosterCache'])) {
    $files = glob('cache/posters/*');
    foreach ($files as $file) {
        if (is_file($file)) {
            unlink($file);
        }
    }
}

//Clear Custom Cache Directory
if (!empty($_POST['clearCustomCache'])) {
    $files = glob('cache/custom/*');
    foreach ($files as $file) {
        if (is_file($file)) {
            unlink($file);
        }
    }
}

if (!empty($_POST['saveConfig'])) {
    setData(basename(__FILE__));
}

//Count Items in Posters
$posters = scandir('cache/posters');
$posterCount = count($posters) - 2;

//Count Items in Custom Images
$custom = scandir('cache/custom');
$customCount = count($custom) - 2;

//Fixup Size Calculations
function fixupSize($bytes)
{
    $places = '2';
    $size = array('B', 'KB', 'MB', 'GB');
    $factor = floor((strlen($bytes) - 1) / 3);
    return sprintf("%.{$places}f", $bytes / pow(1024, $factor)) . @$size[$factor];
}

include('../config.php');
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Plex Movie Poster Display - Admin</title>

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="www.mattsshack.com">

    <meta content="no-cache, no-store, must-revalidate" http-equiv="Cache-Control"/>
    <meta content="no-cache" http-equiv="Pragma"/>
    <meta content="0" http-equiv="Expires"/>

    <link rel="shortcut icon" type="image/png" href="/../assets/images/desktop/favicon.ico"/>
    <link rel="mask-icon" href="/../assets/images/desktop/favicon-mask.svg" color="#cc7b19">

    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-touch-fullscreen" content="yes">

    <!-- <link rel="apple-touch-icon" href="/../assets/images/apple-touch-icon.png"> -->
    <link rel="apple-touch-icon-precomposed" href="/../assets/images/desktop/ios/icon-iphone.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/../assets/images/desktop/ios/icon-ipad.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/../assets/images/desktop/ios/icon-iphone@2x.png">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="/../assets/images/desktop/ios/icon-ipad@2x.png">
    <link rel="apple-touch-startup-image" media="(device-width: 320px)" href="/../assets/images/desktop/ios/startup-iphone-portrait.png">
    <link rel="apple-touch-startup-image" media="(device-width: 320px) and (-webkit-device-pixel-ratio: 2)" href="/../assets/images/desktop/ios/startup-iphone-portrait@2x.png">
    <link rel="apple-touch-startup-image" media="(device-width: 320px) and (device-height: 568px) and (-webkit-device-pixel-ratio: 2)" href="/../assets/images/desktop/ios/startup-iphone5-portrait@2x.png">
    <link rel="apple-touch-startup-image" media="(device-width: 768px) and (orientation: portrait)" href="/../assets/images/desktop/ios/startup-ipad-portrait.png">
    <link rel="apple-touch-startup-image" media="(device-width: 768px) and (orientation: landscape)" href="/../assets/images/desktop/ios/startup-ipad-landscape.png">
    <link rel="apple-touch-startup-image" media="(device-width: 1536px) and (orientation: portrait) and (-webkit-device-pixel-ratio: 2)" href="/../assets/images/desktop/ios/startup-ipad-portrait@2x.png">
    <link rel="apple-touch-startup-image" media="(device-width: 1536px)  and (orientation: landscape) and (-webkit-device-pixel-ratio: 2)" href="/../assets/images/desktop/ios/startup-ipad-landscape@2x.png">

    <!-- JQuery Javascript -->
    <script src="/../assets/jquery-3.4.0/jquery-3.4.0.min.js"></script>

    <!-- Popper Javascript -->
    <script src="/../assets/popper/popper.min.js"></script>

    <!-- Bootstrap Javascript & CSS -->
    <script src="/../assets/bootstrap-4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="/../assets/bootstrap-4.3.1/css/bootstrap.min.css">

    <!-- Bootstrap Colorpicker Javascript & CSS -->
    <script src="/../assets/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
    <link rel="stylesheet" href="/../assets/bootstrap-colorpicker/css/bootstrap-colorpicker.css">

    <!-- Plex Movie Poster Display CSS -->
    <link rel="stylesheet" href="/../assets/styles/default/style.css">
    <link rel="stylesheet" href="/../assets/styles/default/form-validation.css">
    <link rel="stylesheet" href="Plex.css">

    <script>
        $(document).ready(function(){

            $('.advanced-settingButton').click(function(){
            if ( this.value === 'HIDE ADVANCED' ) {
                // if it's open close it
                open = false;
                this.value = 'SHOW ADVANCED';
                // $(this).siblings("[value='Hide']").click();
                // $(this).next("div.showhideconfig").hide("fast"); // For <div.showhideconfig> post input
                $("div.advanced-setting").hide("fast"); // For <div.showhideconfig> global
            }
            else {
                // if it's close open it
                open = true;
                this.value = 'HIDE ADVANCED';
                // $(this).siblings("[value='Show']").click(); //to collapse the open divs - Disabled to allow for all divs to stay open
                // $(this).next("div.showhideconfig").show("fast"); // For <div.showhideconfig> post input
                $("div.advanced-setting").show("fast"); // For <div.showhideconfig> global
            }
            });

        });
    </script>
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
                        <h2 class="SettingsPageHeader-header-1ugtIL">Coming Soon Configuration</h2>
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
                                    <div class="form-group advanced-setting">
                                        <div class="form-alignment input-group">
                                            <label for="comingSoonShowSelection">Show Movies: &nbsp;</label>
                                            <select class="fieldInfo-select custom-select d-block w-100" id="comingSoonShowSelection"
                                                    name="comingSoonShowSelection">
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
                                        </div>
                                        <hr>
                                    </div>
                                    <div class="form-group">
                                        <h3>Top Text Option:</h3>
                                        <div class="input-group">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="comingSoonTop" id="csb1" value="title"<?php if($comingSoonTop == 'title' || $comingSoonTop == '') echo " checked"?> onChange="comingSoonTopSelected()">
                                                <label class="form-check-label" for="inlineRadio1">Title</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="comingSoonTop" id="csb2" value="summary"<?php if($comingSoonTop == 'summary') echo " checked"?> onChange="comingSoonTopSelected()">
                                                <label class="form-check-label" for="inlineRadio2">Summary</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="comingSoonTop" id="csb3" value="tagline"<?php if($comingSoonTop == 'tagline') echo " checked"?> onChange="comingSoonTopSelected()">
                                                <label class="form-check-label" for="inlineRadio2">Tagline</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="comingSoonTop" id="csb4" value="custom"<?php if($comingSoonTop == 'custom') echo " checked"?> onChange="comingSoonTopSelected()">
                                                <label class="form-check-label" for="inlineRadio3">Custom</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="comingSoonTopText">Custom Top Text</label>
                                        <span class="text-muted"><small>(Optional)</small>:</span></label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="comingSoonTopText" name="comingSoonTopText"
                                                placeholder="Coming Soon Top Text" value="<?php echo $comingSoonTopText; ?>" readonly="readonly">
                                        </div>
                                        <script>
                                            $(function(){
                                                //First call for the load
                                                comingSoonTopSelected();

                                                //Second call for change event
                                                $("input[type=radio]").change( comingSoonTopSelected );
                                            });

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
                                        <div class="col-md-6 mb-3">
                                            <!-- <label for="comingSoonTopFontSize">Top Font Size:</label> -->
                                            Top Font Size:
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="comingSoonTopFontSize"
                                                    name="comingSoonTopFontSize" value="<?php echo $comingSoonTopFontSize; ?>">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">px</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <!-- <label for="comingSoonTopFontColor">Top Font Color:</label> -->
                                            Top Font Color:
                                            <div class="input-group">
                                                <input type="text" id="comingSoonTopFontColor" name="comingSoonTopFontColor"
                                                    class="form-control" data-position="bottom left"
                                                    value="<?php echo $comingSoonTopFontColor; ?>">
                                            </div>
                                        </div>
                                        <script>
                                            $(function () {
                                                $('#comingSoonTopFontColor').colorpicker();
                                                $('#comingSoonTopFontColor').on('colorpickerChange', function (event) {
                                                    $('.jumbotron').css('background-color', event.color.toString());
                                                });
                                            });
                                        </script>
                                    </div>
                                    <div class="form-group advanced-setting row">
                                        <div class="col-md-6 mb-3">
                                            <!-- <label for="comingSoonTopFontOutlineSize">Top Font Outline Size:</label> -->
                                            Top Font Outline Size:
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="comingSoonTopFontOutlineSize"
                                                    name="comingSoonTopFontOutlineSize"
                                                    value="<?php echo $comingSoonTopFontOutlineSize; ?>">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">px</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <!-- <label for="comingSoonTopFontOutlineColor">Top Font Outline Color:</label> -->
                                            Top Font Outline Color:
                                            <div class="input-group">
                                                <input type="text" id="comingSoonTopFontOutlineColor"
                                                    name="comingSoonTopFontOutlineColor" class="form-control"
                                                    data-position="bottom left"
                                                    value="<?php echo $comingSoonTopFontOutlineColor; ?>">
                                            </div>
                                        </div>
                                        <script>
                                            $(function () {
                                                $('#comingSoonTopFontOutlineColor').colorpicker();
                                                $('#comingSoonTopFontOutlineColor').on('colorpickerChange', function (event) {
                                                    $('.jumbotron').css('background-color', event.color.toString());
                                                });
                                            });
                                        </script>
                                    </div>
                                    <div class="form-group advanced-setting">
                                        <!-- <div class="input-group"> -->
                                            <!-- <label for="comingSoonTopAutoScale" class="checkLabel">Auto-scale top text</label> -->
                                            <label class="control-label" for="comingSoonTopAutoScale">
                                            <!-- <div class="form-check"> -->
                                                <!-- <input type="checkbox" name="comingSoonTopAutoScale" class="form-check-input" id="comingSoonTopAutoScale" value="1" <?php if ($comingSoonTopAutoScale) echo " checked"?>> Auto-scale top text </label> -->
                                                <input type="checkbox" name="comingSoonTopAutoScale" id="comingSoonTopAutoScale" value="1" <?php if ($comingSoonTopAutoScale) echo " checked"?>> Auto-scale top text </label>
                                            <!-- </div> -->
                                        <!-- </div> -->
                                    </div>
                                    <div class="form-group">
                                        <hr>
                                        <h3>Bottom Text Option:</h3>
                                        <div class="input-group">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="comingSoonBottom" id="csb1" value="title"<?php if($comingSoonBottom == 'title' || $comingSoonBottom == '') echo " checked"?> onChange="comingSoonBottomSelected()">
                                                <label class="form-check-label" for="inlineRadio1">Title</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="comingSoonBottom" id="csb2" value="summary"<?php if($comingSoonBottom == 'summary') echo " checked"?> onChange="comingSoonBottomSelected()">
                                                <label class="form-check-label" for="inlineRadio2">Summary</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="comingSoonBottom" id="csb3" value="tagline"<?php if($comingSoonBottom == 'tagline') echo " checked"?> onChange="comingSoonBottomSelected()">
                                                <label class="form-check-label" for="inlineRadio2">Tagline</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="comingSoonBottom" id="csb4" value="custom"<?php if($comingSoonBottom == 'custom') echo " checked"?> onChange="comingSoonBottomSelected()">
                                                <label class="form-check-label" for="inlineRadio3">Custom</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="comingSoonBottomText">Custom Bottom Text</label>
                                        <span class="text-muted"><small>(Optional)</small>:</span></label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="comingSoonBottomText"
                                                name="comingSoonBottomText" placeholder="Coming Soon Bottom Text"
                                                value="<?php echo $comingSoonBottomText; ?>" readonly="readonly">
                                        </div>
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
                                            <!-- <label for="comingSoonBottomFontSize">Bottom Font Size:</label> -->
                                            Bottom Font Size:
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="comingSoonBottomFontSize"
                                                    name="comingSoonBottomFontSize" value="<?php echo $comingSoonBottomFontSize; ?>">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">px</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <!-- <label for="comingSoonBottomFontColor">Bottom Font Color:</label> -->
                                            Bottom Font Color:
                                            <div class="input-group">
                                                <input type="text" id="comingSoonBottomFontColor" name="comingSoonBottomFontColor"
                                                    class="form-control" data-position="bottom left"
                                                    value="<?php echo $comingSoonBottomFontColor; ?>">
                                            </div>
                                        </div>
                                        <script>
                                            $(function () {
                                                $('#comingSoonBottomFontColor').colorpicker();
                                                $('#comingSoonBottomFontColor').on('colorpickerChange', function (event) {
                                                    $('.jumbotron').css('background-color', event.color.toString());
                                                });
                                            });
                                        </script>
                                    </div>
                                    <div class="form-group advanced-setting row">
                                        <div class="col-md-6 mb-3">
                                            <!-- <label for="comingSoonBottomFontOutlineSize">Bottom Font Outline Size:</label> -->
                                            Bottom Font Outline Size:
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="comingSoonBottomFontOutlineSize"
                                                    name="comingSoonBottomFontOutlineSize"
                                                    value="<?php echo $comingSoonBottomFontOutlineSize; ?>">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">px</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <!-- <label for="comingSoonBottomFontOutlineColor">Bottom Font Outline Color:</label> -->
                                            Bottom Font Outline Color:
                                            <div class="input-group">
                                                <input type="text" id="comingSoonBottomFontOutlineColor"
                                                    name="comingSoonBottomFontOutlineColor" class="form-control"
                                                    data-position="bottom left"
                                                    value="<?php echo $comingSoonBottomFontOutlineColor; ?>">
                                            </div>
                                        </div>
                                        <script>
                                            $(function () {
                                                $('#comingSoonBottomFontOutlineColor').colorpicker();
                                                $('#comingSoonBottomFontOutlineColor').on('colorpickerChange', function (event) {
                                                    $('.jumbotron').css('background-color', event.color.toString());
                                                });
                                            });
                                        </script>
                                    </div>
                                    <div class="form-group advanced-setting">
                                        <!-- <div class="input-group"> -->
                                            <!-- <label for="comingSoonBottomAutoScale" class="checkLabel">Auto-scale bottom text</label> -->
                                            <label class="control-label" for="comingSoonBottomAutoScale">
                                            <!-- <div class="form-check"> -->
                                                <!-- <input type="checkbox" name="comingSoonBottomAutoScale" class="form-check-input" id="comingSoonBottomAutoScale" value="1" <?php if ($comingSoonBottomAutoScale) echo " checked"?>> Auto-scale top text </label> -->
                                                <input type="checkbox" name="comingSoonBottomAutoScale" id="comingSoonBottomAutoScale" value="1" <?php if ($comingSoonBottomAutoScale) echo " checked"?>> Auto-scale bottom text </label>
                                            <!-- </div> -->
                                        <!-- </div> -->
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

<script>
    function passwordView() {
        event.preventDefault();
        if ($('#password_view input').attr("type") == "text") {
            document.getElementById('password_view_btn').innerHTML = "Show";
            $('#password_view input').attr('type', 'password');
        } else if ($('#password_view input').attr("type") == "password") {
            $('#password_view input').attr('type', 'text');
            document.getElementById('password_view_btn').innerHTML = "Hide";
        }
    }

    function tokenView() {
        event.preventDefault();
        if ($('#token_view input').attr("type") == "text") {
            document.getElementById('token_view_btn').innerHTML = "Show";
            $('#token_view input').attr('type', 'password');
        } else if ($('#token_view input').attr("type") == "password") {
            $('#token_view input').attr('type', 'text');
            document.getElementById('token_view_btn').innerHTML = "Hide";
        }
    }
</script>

</body>
</html>
