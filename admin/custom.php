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

    <link rel="shortcut icon" type="image/png" href="/assets/images/desktop/favicon.ico"/>
    <link rel="mask-icon" href="/assets/images/desktop/favicon-mask.svg" color="#cc7b19">

    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-touch-fullscreen" content="yes">

    <!-- <link rel="apple-touch-icon" href="/assets/images/apple-touch-icon.png"> -->
    <link rel="apple-touch-icon-precomposed" href="/assets/images/desktop/ios/icon-iphone.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/assets/images/desktop/ios/icon-ipad.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/assets/images/desktop/ios/icon-iphone@2x.png">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="/assets/images/desktop/ios/icon-ipad@2x.png">
    <link rel="apple-touch-startup-image" media="(device-width: 320px)" href="/assets/images/desktop/ios/startup-iphone-portrait.png">
    <link rel="apple-touch-startup-image" media="(device-width: 320px) and (-webkit-device-pixel-ratio: 2)" href="/assets/images/desktop/ios/startup-iphone-portrait@2x.png">
    <link rel="apple-touch-startup-image" media="(device-width: 320px) and (device-height: 568px) and (-webkit-device-pixel-ratio: 2)" href="/assets/images/desktop/ios/startup-iphone5-portrait@2x.png">
    <link rel="apple-touch-startup-image" media="(device-width: 768px) and (orientation: portrait)" href="/assets/images/desktop/ios/startup-ipad-portrait.png">
    <link rel="apple-touch-startup-image" media="(device-width: 768px) and (orientation: landscape)" href="/assets/images/desktop/ios/startup-ipad-landscape.png">
    <link rel="apple-touch-startup-image" media="(device-width: 1536px) and (orientation: portrait) and (-webkit-device-pixel-ratio: 2)" href="/assets/images/desktop/ios/startup-ipad-portrait@2x.png">
    <link rel="apple-touch-startup-image" media="(device-width: 1536px)  and (orientation: landscape) and (-webkit-device-pixel-ratio: 2)" href="/assets/images/desktop/ios/startup-ipad-landscape@2x.png">

    <!-- JQuery Javascript -->
    <script src="/assets/jquery-3.4.0/jquery-3.4.0.min.js"></script>

    <!-- Popper Javascript -->
    <script src="/assets/popper/popper.min.js"></script>

    <!-- Bootstrap Javascript & CSS -->
    <script src="/assets/bootstrap-4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="/assets/bootstrap-4.3.1/css/bootstrap.min.css">

    <!-- Bootstrap Colorpicker Javascript & CSS -->
    <script src="/assets/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
    <link rel="stylesheet" href="/assets/bootstrap-colorpicker/css/bootstrap-colorpicker.css">

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
                    <div class="SidebarContainer-sidebarContainer-2RAYT1">
                        <div class="SidebarScroller-scroller-2wp83y Scroller-scroller-3GqQcZ Scroller-vertical-VScFLT Scroller-auto-LsWiWx ">
                            <div id="SideBar" class="SettingsSidebar-sidebarContent-3yMjj9">
                                <div role="navigation">
                                    <div class="SidebarList-sidebarListHeaderContainer-2D2g-W">
                                        <div class="SettingsSidebarList-header-1RCToc SidebarList-sidebarListHeader-1t0yzs" role="header">Settings</div>
                                    </div>
                                    <!-- <div class="SidebarListItem-sidebarListItem-GdcVsd">
                                        <a href="_Template.php" role="link" class="SidebarLink-sidebarLink-L2OPdE Link-default-2XA2bN Link-link-2n0yJn Link-isSelected-IRm9uM">
                                            <div class="SidebarLink-container-24bhWp">
                                                <div class="SettingsSidebarListLink-selectedIcon-caIG1g SettingsSidebarListLink-icon-eICe1t SidebarLink-icon-34JWqs"></div>
                                                <div class="SidebarLink-title-2vaAAn">TEMPLATE ACTIVE</div>
                                                <div class="SidebarLink-children-3Lh_RU"></div>
                                            </div>
                                        </a>
                                    </div> -->
                                    <!-- <div class="SidebarListItem-sidebarListItem-GdcVsd">
                                        <a href="_Template.php" role="link" class="SidebarLink-sidebarLink-L2OPdE Link-default-2XA2bN Link-link-2n0yJn">
                                            <div class="SidebarLink-container-24bhWp">
                                                <div class="SettingsSidebarListLink-icon-eICe1t SidebarLink-icon-34JWqs"></div>
                                                <div class="SidebarLink-title-2vaAAn">TEMPLATE INACTIVE</div>
                                            </div>
                                        </a>
                                    </div> -->
                                    <div class="SidebarListItem-sidebarListItem-GdcVsd">
                                        <a href="general.php" role="link" class="SidebarLink-sidebarLink-L2OPdE Link-default-2XA2bN Link-link-2n0yJn">
                                            <div class="SidebarLink-container-24bhWp">
                                                <div class="SettingsSidebarListLink-icon-eICe1t SidebarLink-icon-34JWqs"></div>
                                                <div class="SidebarLink-title-2vaAAn">General</div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="SidebarListItem-sidebarListItem-GdcVsd">
                                        <a href="security.php" role="link" class="SidebarLink-sidebarLink-L2OPdE Link-default-2XA2bN Link-link-2n0yJn">
                                            <div class="SidebarLink-container-24bhWp">
                                                <div class="SettingsSidebarListLink-icon-eICe1t SidebarLink-icon-34JWqs"></div>
                                                <div class="SidebarLink-title-2vaAAn">Security Configuration</div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="SidebarListItem-sidebarListItem-GdcVsd">
                                        <a href="common.php" role="link" class="SidebarLink-sidebarLink-L2OPdE Link-default-2XA2bN Link-link-2n0yJn">
                                            <div class="SidebarLink-container-24bhWp">
                                                <div class="SettingsSidebarListLink-icon-eICe1t SidebarLink-icon-34JWqs"></div>
                                                <div class="SidebarLink-title-2vaAAn">Common Configuration</div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="SidebarListItem-sidebarListItem-GdcVsd">
                                        <a href="server.php" role="link" class="SidebarLink-sidebarLink-L2OPdE Link-default-2XA2bN Link-link-2n0yJn">
                                            <div class="SidebarLink-container-24bhWp">
                                                <div class="SettingsSidebarListLink-icon-eICe1t SidebarLink-icon-34JWqs"></div>
                                                <div class="SidebarLink-title-2vaAAn">Server Configuration</div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="SidebarListItem-sidebarListItem-GdcVsd">
                                        <a href="client.php" role="link" class="SidebarLink-sidebarLink-L2OPdE Link-default-2XA2bN Link-link-2n0yJn">
                                            <div class="SidebarLink-container-24bhWp">
                                                <div class="SettingsSidebarListLink-icon-eICe1t SidebarLink-icon-34JWqs"></div>
                                                <div class="SidebarLink-title-2vaAAn">Client Configuration</div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="SidebarListItem-sidebarListItem-GdcVsd">
                                        <a href="comingSoon.php" role="link" class="SidebarLink-sidebarLink-L2OPdE Link-default-2XA2bN Link-link-2n0yJn">
                                            <div class="SidebarLink-container-24bhWp">
                                                <div class="SettingsSidebarListLink-icon-eICe1t SidebarLink-icon-34JWqs"></div>
                                                <div class="SidebarLink-title-2vaAAn">Coming Soon</div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="SidebarListItem-sidebarListItem-GdcVsd">
                                        <a href="nowShowing.php" role="link" class="SidebarLink-sidebarLink-L2OPdE Link-default-2XA2bN Link-link-2n0yJn">
                                            <div class="SidebarLink-container-24bhWp">
                                                <div class="SettingsSidebarListLink-icon-eICe1t SidebarLink-icon-34JWqs"></div>
                                                <div class="SidebarLink-title-2vaAAn">Now Showing</div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="SidebarListItem-sidebarListItem-GdcVsd">
                                        <a href="custom.php" role="link" class="SidebarLink-sidebarLink-L2OPdE Link-default-2XA2bN Link-link-2n0yJn Link-isSelected-IRm9uM">
                                            <div class="SidebarLink-container-24bhWp">
                                            <div class="SettingsSidebarListLink-selectedIcon-caIG1g SettingsSidebarListLink-icon-eICe1t SidebarLink-icon-34JWqs"></div>
                                                <div class="SidebarLink-title-2vaAAn">Custom Configuration</div>
                                                <div class="SidebarLink-children-3Lh_RU"></div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="Page-page-aq7i_X Scroller-scroller-3GqQcZ Scroller-vertical-VScFLT  ">
                    <div id="MainPage" class="SettingsPage-content-1vKVEr PageContent-pageContent-16mK6G">
                        <h2 class="SettingsPageHeader-header-1ugtIL">Custom Images Configuration</h2>
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

                                    <hr class="internalconfigbreak">

                                    <div class="mb-3">
                                        <label for="customImageUpload">Custom Image Upload:</label>
                                        <span class="text-muted"></span></label>
                                        <div class="input-group">
                                            <input type="file" class="form-control" id="customImageUpload" name="customImageUpload"
                                                    value="">
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <div class="form-alignment input-group">
                                            <label for="customImageEnabled">Custom Image State: &nbsp;&nbsp;</label>
                                            <select class="fieldInfo-select custom-select d-block w-100" id="customImageEnabled" name="customImageEnabled">
                                                <option value="Disabled" <?php if ($customImageEnabled == 'Disabled') {
                                                    echo "selected";
                                                } ?>>Disabled
                                                </option>
                                                <option value="Enabled" <?php if ($customImageEnabled == 'Enabled') {
                                                    echo "selected";
                                                } ?>>Enabled
                                                </option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class=" mb-3">
                                        <div class="form-alignment input-group">
                                            <label for="customTopFontSize">Custom Image Select: &nbsp;</label>
                                            <select class="fieldInfo-select custom-select d-block w-100" id="customImage" name="customImage">
                                                <option value="" <?php if ($customImage == '') {
                                                    echo "selected";
                                                } ?>>None
                                                </option>
                                                <?php
                                                $path = "cache/custom";
                                                $files = array_diff(scandir($path), array('.', '..'));
                                                foreach ($files as $file) {
                                                    echo "<option value='$file'";
                                                    if ($customImage == $file) {
                                                        echo "selected";
                                                    }
                                                    echo ">$file</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                    <hr class="internalconfigbreak">

                                    <div class="mb-3">
                                        <label for="customTopText">Custom Top Text</label>
                                        <span class="text-muted"><small>(Optional)</small>:</span></label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="customTopText" name="customTopText"
                                                    placeholder="Custom Image Top Text" value="<?php echo $customTopText; ?>">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="customTopFontSize">Top Font Size:</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="customTopFontSize" name="customTopFontSize"
                                                        value="<?php echo $customTopFontSize; ?>">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">px</div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label for="customTopFontColor">Top Font Color:</label>
                                            <div class="input-group">
                                                <input type="text" id="customTopFontColor" name="customTopFontColor"
                                                        class="form-control" data-position="bottom left"
                                                        value="<?php echo $customTopFontColor; ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <script>
                                        $(function () {
                                            $('#customTopFontColor').colorpicker();
                                            $('#customTopFontColor').on('colorpickerChange', function (event) {
                                                $('.jumbotron').css('background-color', event.color.toString());
                                            });
                                        });
                                    </script>

                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="customTopFontOutlineSize">Top Font Outline Size:</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="customTopFontOutlineSize"
                                                        name="customTopFontOutlineSize" value="<?php echo $customTopFontOutlineSize; ?>">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">px</div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label for="customTopFontOutlineColor">Top Font Outline Color:</label>
                                            <div class="input-group">
                                                <input type="text" id="customTopFontOutlineColor" name="customTopFontOutlineColor"
                                                        class="form-control" data-position="bottom left"
                                                        value="<?php echo $customTopFontOutlineColor; ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <script>
                                        $(function () {
                                            $('#customTopFontOutlineColor').colorpicker();
                                            $('#customTopFontOutlineColor').on('colorpickerChange', function (event) {
                                                $('.jumbotron').css('background-color', event.color.toString());
                                            });
                                        });
                                    </script>

                                    <hr class="internalconfigbreak">

                                    <div class="mb-3">
                                        <label for="customBottomText">Custom Bottom Text</label>
                                        <span class="text-muted"><small>(Optional)</small>:</span></label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="customBottomText" name="customBottomText"
                                                    placeholder="Coming Soon Top Text" value="<?php echo $customBottomText; ?>">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="customBottomFontSize">Bottom Font Size:</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="customBottomFontSize"
                                                        name="customBottomFontSize" value="<?php echo $customBottomFontSize; ?>">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">px</div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label for="customBottomFontColor">Bottom Font Color:</label>
                                            <div class="input-group">
                                                <input type="text" id="customBottomFontColor" name="customBottomFontColor"
                                                        class="form-control" data-position="bottom left"
                                                        value="<?php echo $customBottomFontColor; ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <script>
                                        $(function () {
                                            $('#customBottomFontColor').colorpicker();
                                            $('#customBottomFontColor').on('colorpickerChange', function (event) {
                                                $('.jumbotron').css('background-color', event.color.toString());
                                            });
                                        });
                                    </script>

                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="customBottomFontOutlineSize">Bottom Font Outline Size:</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="customBottomFontOutlineSize"
                                                        name="customBottomFontOutlineSize" value="<?php echo $customBottomFontOutlineSize; ?>">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">px</div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label for="customBottomFontOutlineColor">Bottom Font Outline Color:</label>
                                            <div class="input-group">
                                                <input type="text" id="customBottomFontOutlineColor" name="customBottomFontOutlineColor"
                                                        class="form-control" data-position="bottom left"
                                                        value="<?php echo $customBottomFontOutlineColor; ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <script>
                                        $(function () {
                                            $('#customBottomFontOutlineColor').colorpicker();
                                            $('#customBottomFontOutlineColor').on('colorpickerChange', function (event) {
                                                $('.jumbotron').css('background-color', event.color.toString());
                                            });
                                        });
                                    </script>
                                

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
