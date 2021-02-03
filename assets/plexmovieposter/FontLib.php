<?php

function GenerateCSS_FontSingle($CSSFullName, $fontPath = "/cache/fonts", $fontName = "CustomFont", $fontFile = "CustomFont") {
    // Font CSS Logic

    $publishString = "@font-face {\n";
    $publishString .= "    font-family: \"$fontName\";\n";
    $publishString .= "    src: url('$fontPath/$fontFile.eot');\n";
    $publishString .= "    src: url('$fontPath/$fontFile.eot?#iefix') format('embedded-opentype'),\n";
    $publishString .= "         url('$fontPath/$fontFile.woff') format('woff'),\n";
    $publishString .= "         url('$fontPath/$fontFile.ttf') format('truetype'),\n";
    $publishString .= "         url('$fontPath/$fontFile.svg#webfont') format('svg');\n";
    $publishString .= "}\n\n";

    // Open the file to get existing content
    $current = file_get_contents($CSSFullName);

    // Append a new entry to the file
    $current .= "$publishString";

    // Write the contents back to the file
    file_put_contents($CSSFullName, $current);

    // // Write the contents to the file,
    // // using the FILE_APPEND flag to append the content to the end of the file
    // // and the LOCK_EX flag to prevent anyone else writing to the file at the same time
    // file_put_contents($CSSFullName, $publishString, FILE_APPEND | LOCK_EX);

}

function GenerateCSS_Font($CSSPath = "../cache/fonts/", $CSSFile = "fonts_custom.css", $FontPath = "../cache/fonts") {
    // CSS File Settings
    $CSSFullName = $CSSPath . $CSSFile;

    // Generate the directory if it does not exist.
    if (!file_exists($CSSPath)) {
        mkdir($CSSPath, 0777, true);
    }

    // Remove the file if it exits.
    if (is_file($CSSFullName)) {
        unlink($CSSFullName);
    }

    // Generate the directory if it does not exist.  (* Look at moving to separate function)
    if (!file_exists($FontPath)) {
        mkdir($FontPath, 0777, true);
    }

    // Process Logic

    // $files = glob('folder/*.{jpg,png,gif}', GLOB_BRACE);
    // $files = glob("$FontPath/*.{[tT][tT][fF]}", GLOB_BRACE);

    $dir_iterator = new RecursiveDirectoryIterator("$FontPath");
    $files = new RecursiveIteratorIterator($dir_iterator, RecursiveIteratorIterator::SELF_FIRST);

    foreach($files as $file) {
        $file_parts = pathinfo($file);
        if (preg_match("{[tT][tT][fF]}",$file_parts['extension'])) {
            $fontPath = $file_parts['dirname'];
            $fontPath = str_replace('..','',$fontPath);
            $fontName = $file_parts['filename'];
            $fontFile = $file_parts['filename'];

            GenerateCSS_FontSingle($CSSFullName, $fontPath, $fontName, $fontFile);
        }
    }
}

function GenerateCSS_Font_Stock() {
    $CSSPath = "../assets/plexmovieposter/";
    $CSSFontFileName = "fonts_stock.css";
    $FontPath = "../assets/fonts";

    GenerateCSS_Font($CSSPath, $CSSFontFileName, $FontPath);
}

function GenerateCSS_Font_Custom() {
    $CSSPath = "../cache/fonts/";
    $CSSFontFileName = "fonts_custom.css";
    $FontPath = "../cache/fonts";

    GenerateCSS_Font($CSSPath, $CSSFontFileName, $FontPath);
}

function GenerateCSS_Font_ALL() {
    GenerateCSS_Font_Stock();
    GenerateCSS_Font_Custom();
}

function findFontFamily($CSSPath = "../assets/plexmovieposter/", $CSSFile = "fonts_stock.css", $HTMLdisplay = FALSE, $HTMLdropdown = FALSE, $fieldID) {
    // $file = '../assets/plexmovieposter/fonts_stock.css';
    $file = $CSSPath . $CSSFile;
    $searchfor = 'font-family:';

    // the following line prevents the browser from parsing this as HTML.
    header('Content-Type: text/plain');

    // get the file contents, assuming the file to be readable (and exist)
    $contents = file_get_contents($file);

    // escape special characters in the query
    $pattern = preg_quote($searchfor, '/');

    // finalise the regular expression, matching the whole line
    $pattern = "/^.*$pattern.*\$/m";

    // search, and store all matching occurrences in $matches
    if(preg_match_all($pattern, $contents, $matches)){
    //    echo "Found fonts:\n";
    //    echo implode("\n", $matches[0]);

        if ($HTMLdisplay == TRUE) {
            // PHP 7.x
            displayFontFamily($searchfor, $matches[0]);
            // PHP 8.x
            // displayFontFamily(searchfor: $searchfor, fontfamilyRAW: $matches[0]);
        }

        if ($HTMLdropdown == TRUE) {
            // PHP 7.x
            dropdownFontFamily($searchfor, $matches[0], $fieldID);
            // PHP 8.x
            // dropdownFontFamily(searchfor: $searchfor, fontfamilyRAW: $matches[0], fieldID: $fieldID);
        }
    }
    else{
    //    echo "\nNo fonts found";
    }
}

function findFontFamily_Full($HTMLdisplay = FALSE, $HTMLdropdown = FALSE, $fieldID) {
    // Settings
    $CSSFontPath_Placeholder = "../assets/plexmovieposter/";
    $CSSFontFileName_Placeholder = "fonts.css";
    $CSSFontFullName_Placeholder = $CSSFontPath_Placeholder . $CSSFontFileName_Placeholder;
    $contents_0 = file_get_contents($CSSFontFullName_Placeholder);
    // echo "<br> Debug (contents_A): <br> $contents_A <br>"; // Debug MSG

    $CSSFontPath_Stock = "../assets/plexmovieposter/";
    $CSSFontFileName_Stock = "fonts_stock.css";
    $CSSFontFullName_Stock = $CSSFontPath_Stock . $CSSFontFileName_Stock;
    $contents_1 = file_get_contents($CSSFontFullName_Stock);
    // echo "<br> Debug (contents_A): <br> $contents_A <br>"; // Debug MSG

    $CSSFontPath_Custom = "../cache/fonts/";
    $CSSFontFileName_Custom = "fonts_custom.css";
    $CSSFontFullName_Custom = $CSSFontPath_Custom . $CSSFontFileName_Custom;
    $contents_2 = file_get_contents($CSSFontFullName_Custom);
        // echo "<br> Debug (contents_B): <br> $contents_B <br>"; // Debug MSG

    $searchfor = 'font-family:';

    // the following line prevents the browser from parsing this as HTML.
    header('Content-Type: text/plain');

    // get the file contents, assuming the file to be readable (and exist)
    // $contents = file_get_contents($file);
    
    $contents_Full = $contents_0;
    $contents_Full .= $contents_1;
    $contents_Full .= $contents_2;
        // echo "<br> Debug (contents_Full): <br> $contents_Full <br>"; // Debug MSG

    // escape special characters in the query
    $pattern = preg_quote($searchfor, '/');

    // finalise the regular expression, matching the whole line
    $pattern = "/^.*$pattern.*\$/m";

    $contents = $contents_Full;
        // echo "<br> Debug (contents): <br> $contents <br>"; // Debug MSG

    // search, and store all matching occurrences in $matches
    if(preg_match_all($pattern, $contents, $matches)){
    //    echo "Found fonts:\n";
    //    echo implode("\n", $matches[0]);

        if ($HTMLdisplay == TRUE) {
            // PHP 7.x
            displayFontFamily($searchfor, $matches[0]);
            // PHP 8.x
            // displayFontFamily(searchfor: $searchfor, fontfamilyRAW: $matches[0]);
        }

        if ($HTMLdropdown == TRUE) {
            // PHP 7.x
            dropdownFontFamily($searchfor, $matches[0], $fieldID);
            // PHP 8.x
            // dropdownFontFamily(searchfor: $searchfor, fontfamilyRAW: $matches[0], fieldID: $fieldID);
        }
    }
    else{
    //    echo "\nNo fonts found";
    }
}

function displayFontFamily($searchfor, $fontfamilyRAW) {
    foreach($fontfamilyRAW as $fontfamily) {
        // Clean Up String
        $fontfamily = str_replace($searchfor,'',$fontfamily);
        $fontfamily = str_replace('"','',$fontfamily);
        $fontfamily = str_replace(';','',$fontfamily);
        $fontfamily = trim($fontfamily);

        // PHP 7.x
        displayFontFamilySub($fontfamily);
        // PHP 8.x
        // displayFontFamilySub(fontfamily: $fontfamily);
    }
}

function displayFontFamilySub($fontfamily) {
    $set_Inline = TRUE;

    if ($set_Inline == TRUE) {
        $displayInline = "display: inline;";
    }
    else {
        $displayInline = "";
    }
    
    $fontSample[0] = "Sample";
    $fontSample[1] = "The quick brown fox jumps over the lazy dog";

    echo "<div class=\"form-group\">\n";
    echo "$fontfamily:&nbsp;\n";
    echo "<div style=\"font-family: '$fontfamily'; font-size: 20px; $displayInline\">\n";
    echo "$fontSample[1]\n";
    echo "</div>\n";
    echo "</div>\n";
}

function dropdownFontFamily($searchfor, $fontfamilyRAW, $fieldID = "customTopFontID", $showFontSample = FALSE) {

    if ($showFontSample == TRUE) {
        $HTMLStyle = "style=\"font-size: 20px;\"";
    }
    else {
        $HTMLStyle = "";
    }

    echo "<select id=\"\" name=\"$fieldID\" $HTMLStyle >\n";
    echo "<option value=\"\">None</option>\n";

    foreach($fontfamilyRAW as $fontfamily) {
        // Clean Up String
        $fontfamily = str_replace($searchfor,'',$fontfamily);
        $fontfamily = str_replace('"','',$fontfamily);
        $fontfamily = str_replace(';','',$fontfamily);
        $fontfamily = trim($fontfamily);

        // PHP 7.x
        dropdownFontFamilySub($fontfamily, $fieldID, $showFontSample);
        // PHP 8.x
        // dropdownFontFamilySub3(fontfamily: $fontfamily, fieldID: $fieldID);

    }
    echo "</select>";
}

function dropdownFontFamilySub($fontfamily, $fieldID, $showFontSample = FALSE) {
    include '../config.php';

    if ($showFontSample == TRUE) {
        $HTMLStyle = "style=\"font-family: '$fontfamily';\"";
    }
    else {
        $HTMLStyle = "";
    }

    if ($$fieldID == $fontfamily) {
        $HTMLSelect = "selected";
    }
    else {
        $HTMLSelect = "";
    }

    echo "<option value=\"$fontfamily\" $HTMLStyle $HTMLSelect>";
    echo "$fontfamily";
    echo "</option>\n";
}

function uploadFont() {
    $ShowMSG = false;
    $SetRedirect = true;

    $UseFileName = true;

    // $target_dir = "uploads/";
    $target_dir = "../cache/fonts/";
    $target_fileName = "CustomFont.ttf";

    if ($UseFileName == TRUE) {
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    }
    else {
        $target_file = $target_dir . $target_fileName;
    }

    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Generate the Upload directory if it does not exist.
    if (!file_exists($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    // Check if image file is a actual image or fake image
    if (isset($_POST["uploadFont"])) {
        // $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]); // Disabled for php upload
        if ($check !== false) {
            if ($ShowMSG == true) {
                echo "File is an image - " . $check["mime"] . ".";
            }
            $uploadOk = 1;
        }
        else {
            if ($ShowMSG == true) {
                echo "File is not an image.";
            }
            $uploadOk = 0;
        }
    }

    // Check if file already exists
    // if (file_exists($target_file)) {
    //     echo "Sorry, file already exists.";
    //     $uploadOk = 0;
    // }

    // Check file size
    // $fileSizeMax = 500000; // 500 KB
    $fileSizeMax = 500000;  // 500 KB
    if ($_FILES["fileToUpload"]["size"] > $fileSizeMax) {
        if ($ShowMSG == true) {
            echo "Sorry, your file is too large.";
        }
        $uploadOk = 0;
    }

    // Allow certain file formats
    // if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
    //   echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    //   $uploadOk = 0;
    // }

    if($imageFileType != "ttf") {
        if ($ShowMSG == true) {
            echo "Sorry, only ttf files are allowed.";
        }
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        if ($ShowMSG == true) {
            echo "Sorry, your file was not uploaded.<br>";
        }
        // if everything is ok, try to upload file
    }
    else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            if ($ShowMSG == true) {
                echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.<br>";
            }
            if ($SetRedirect == true) {
                header("Location: fonts.php");
                exit();
            }
        }
        else {
            if ($ShowMSG == true) {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }
}

function exportFont() {

    $zip_file = '../cache/FontDump.zip';

    $zip = new ZipArchive();
	if ( $zip->open($zip_file, ZipArchive::CREATE) !== TRUE) {
	exit("Shit, that did not work.");
	}

    $zip->addFile('../assets/fonts/*');

    $download_file = file_get_contents( $file_url );
	$zip->addFromString(basename($file_url),$download_file);

    $zip->close();

}

function Zip($source, $destination, $compressFileName) {
    if (!extension_loaded('zip') || !file_exists($source)) {
     return false;
    }

    // Generate the directory if it does not exist.
    if (!file_exists($destination)) {
        mkdir($destination, 0777, true);
    }

    // $destination_FullName = $destination . $compressFileName;
    $destination_FullName = "$destination/$compressFileName";

    // Remove the file if it exits.
    if (is_file($destination_FullName)) {
        unlink($destination_FullName);
    }

    $zip = new ZipArchive();

    if (!$zip->open($destination_FullName, ZIPARCHIVE::CREATE)) {
     return false;
    }

    $source = str_replace('\\', '/', realpath($source));

    if (is_dir($source) === true) {
        $files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($source), RecursiveIteratorIterator::SELF_FIRST);

        foreach ($files as $file) {
            $file = str_replace('\\', '/', $file);

            if ( in_array(substr($file, strrpos($file, '/')+1), array('.', '..')) )
            continue;
            $file = realpath($file);

            if (is_dir($file) === true) {
                $zip->addEmptyDir(str_replace($source . '/', '', $file . '/'));
            }
            else if (is_file($file) === true) {
                $zip->addFromString(str_replace($source . '/', '', $file), file_get_contents($file));
            }
        }
    }
    else if (is_file($source) === true) {
        $zip->addFromString(basename($source), file_get_contents($source));
    }

    return $zip->close();
    header('Content-type: application/zip');
    header('Content-Disposition: attachment; filename='.basename($destination));
}

function uploadFiles() {
    $ShowMSG = false;
    $SetRedirect = true;

    $output = '';
    // $destination = '../upload/';
    $destination = '../cache/fonts/';


    if ($_FILES['zip_file']['name'] != '') {
        $file_name = basename($_FILES['zip_file']['name']);
        $array = explode(".", $file_name);
        $name = $array[0];
        $ext = $array[1];

        

        // Generate the directory if it does not exist.
        if (!file_exists($destination)) {
            mkdir($destination, 0777, true);
        }

        if ($ext == 'zip') {
            $location = $destination . $file_name;

            if (move_uploaded_file($_FILES['zip_file']['tmp_name'], $location)) {
                $zip = new ZipArchive;

                if ($zip->open($location)) {
                    $zip->extractTo($destination);
                    $zip->close();
                }

                // $files = scandir($destination . $name);
                // $name is extract folder from zip file

                // foreach ($files as $file) {
                //     $file_ext = end(explode(".", $file));
                //     $allowed_ext = array('jpg', 'png');

                //     if (in_array($file_ext, $allowed_ext)) {
                //         $new_name = md5(rand()).'.' . $file_ext;
                //         $output .= '<div class="col-md-6"><div style="padding:16px; border:1px solid #CCC;"><img src="upload/'.$new_name.'" width="170" height="240" /></div>';
                //         copy($destination.$name.'/'.$file, $destination . $new_name);
                //         unlink($destination.$name.'/'.$file);
                //     }
                // }

                unlink ($location);
                rmdir ($destination . $name);

                if ($ShowMSG == true) {
                    echo "The file ". htmlspecialchars( basename( $_FILES["zip_file"]["name"])). " has been uploaded.<br>";
                }
                if ($SetRedirect == true) {
                    header("Location: fonts.php");
                    exit();
                }
            }
        }
    }
}

?>