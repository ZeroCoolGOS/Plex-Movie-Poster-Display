<?php
//For feedback, suggestions, or issues please visit https://www.mattsshack.com/plex-movie-poster-display/
include_once('config.php');
$pmpImageSpeed = ($pmpImageSpeed * 1000);
?>

<html>
<head>
    <!-- <meta charset="utf-8"> -->
    <title>Plex Movie Poster Display</title>

    <!-- <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> -->
    <meta name="description" content="">
    <meta name="author" content="www.mattsshack.com">

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
    <script src="/assets/jquery-3.4.0/jquery.marquee.min.js"></script>
    <script src="/assets/jquery-3.4.0/jquery.easing.min.js"></script>

    <!-- Text Scaler Javascript -->
    <script src="/assets/fitty/fitty.js"></script>

    <!-- Bootstrap Javascript & CSS -->
    <script src="/assets/bootstrap-4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="/assets/bootstrap-4.3.1/css/bootstrap.min.css">

    <!-- Plex Movie Poster Display CSS -->
    <link rel="stylesheet" href="/assets/styles/default/poster.css">

    <style>
        .comingSoonTop {
            font-size: <?php echo $comingSoonTopFontSize?>px;
        }
        .comingSoonBottom {
            font-size: <?php echo $comingSoonBottomFontSize?>px;
        }
        .nowPlayingTop {
            font-size: <?php echo $nowShowingTopFontSize?>px;
        }
        .nowPlayingBottom {
            font-size: <?php echo $nowShowingBottomFontSize?>px;
        }
    </style>

    <script>
        $(function () {
            $.getJSON('getData.php', function (data) {
                $.each(data, function (key, val) {
                    if (key == "middle") {
                        $('#' + key).css('background-image', val);
                    } else {
                        $('#' + key).html(val);
                    }
                });
            });

            $(document).keypress(function(event){
                var keycode = (event.keyCode ? event.keyCode : event.which);
                console.log("Keypress: " + keycode);
                if(keycode == '115'){
                    $('#myModal').modal({show:true});
                    $("#settingFrame").attr('src', 'admin.php');
                }

            });

                $('#myModal').on('hidden.bs.modal', function(){
                    $('#settingFrame').html("").attr("src", "");
                });

            setInterval(function () {
                $.getJSON('getData.php', function (data) {
                    $.each(data, function (key, val) {
                        if (key == "middle") {
                            $('#' + key).css('background-image', val);
                        } else {
                            $('#' + key).html(val);
                        }
                    });
                });
            }, <?php echo $pmpImageSpeed; ?>);
        });

    </script>
</head>

<body>
<div id="container">
    <div id="alert" align="center" class="center"></div>
    <div id="top" style="overflow: hidden;" align="center" class="center"></div>
    <div id="middle" class="middle"></div>
    <div id="bottom" style="overflow: hidden;" align="center" class="center"></div>
</div>
<div class="modal fade" id="myModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content bmd-modalContent">

            <div class="modal-body">

                <div class="close-button">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <iframe class="embed-responsive-item" id='settingFrame' frameborder="0"></iframe>

            </div>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</body>

</html>
