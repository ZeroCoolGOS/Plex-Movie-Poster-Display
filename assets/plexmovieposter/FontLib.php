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
    // $CSSFontPath = "/cache/fonts";
    $CSSFontPath = str_replace('..','',$FontPath);

    // Generate the directory if it does not exist.
    if (!file_exists($CSSPath)) {
        mkdir($CSSPath, 0777, true);
    }

    // Remove the file if it exits.
    if (is_file($CSSFullName)) {
        unlink($CSSFullName);
    }
    
    // Process Logic

    // $files = glob('folder/*.{jpg,png,gif}', GLOB_BRACE);
    $files = glob("$FontPath/*.{[tT][tT][fF]}", GLOB_BRACE);

    foreach($files as $file) {
        $file_parts = pathinfo($file);
        GenerateCSS_FontSingle($CSSFullName, $CSSFontPath, $file_parts['filename'], $file_parts['filename']);
    }
}

function findFontFamily($CSSPath = "../assets/plexmovieposter/", $CSSFile = "fonts_stock.css") {
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
    
    // search, and store all matching occurences in $matches
    if(preg_match_all($pattern, $contents, $matches)){
    //    echo "Found fonts:\n";
    //    echo implode("\n", $matches[0]);

        foreach($matches[0] as $fontfamily) {
            // Clean Up String
            $fontfamily = str_replace($searchfor,'',$fontfamily);
            $fontfamily = str_replace('"','',$fontfamily);
            $fontfamily = str_replace(';','',$fontfamily);
            $fontfamily = trim($fontfamily);
            
            displayFontFamily($fontfamily);
        }
        dropdownFontFamily($searchfor, $matches[0]);
    }
    else{
       echo "\nNo fonts found";
    }  
}

function displayFontFamily($fontfamily) {
    echo "<div class=\"form-group\">\n";
    echo "$fontfamily:&nbsp;\n";
    echo "<div style=\"font-family: '$fontfamily'; font-size: 20px; display: inline;\">\n";
    echo "Sample\n";
    echo "</div>\n";
    echo "</div>\n";
}

function dropdownFontFamily($searchfor, $fontfamilyRAW) {
    echo "<select id=\"customBottomFontID\" name=\"customBottomFontID\" style=\"font-size: 20px;\">";

    foreach($fontfamilyRAW as $fontfamily) {
        // Clean Up String
        $fontfamily = str_replace($searchfor,'',$fontfamily);
        $fontfamily = str_replace('"','',$fontfamily);
        $fontfamily = str_replace(';','',$fontfamily);
        $fontfamily = trim($fontfamily);
        
        dropdownFontFamilySub3($fontfamily);
    }
    echo "</select>";
}

function dropdownFontFamilySub($fontfamily) {
    echo "<option value=\"$fontfamily\" <?php if (\$customBottomFontID == '$fontfamily') { echo \"selected\"; } ?>>\n";
    echo "$fontfamily\n";
    echo "</option>";
}

function dropdownFontFamilySub2($fontfamily) {
    if ($customBottomFontID == $fontfamily) {
        echo "<option value=\"$fontfamily\" selected>\n";
    }
    echo "<option value=\"$fontfamily\">\n";
    echo "$fontfamily\n";
    echo "</option>\n";
}

function dropdownFontFamilySub3($fontfamily) {
    if ($customBottomFontID == $fontfamily) {
        echo "<option value=\"$fontfamily\" style=\"font-family: '$fontfamily';\" selected>\n";
    }
    else {
        echo "<option value=\"$fontfamily\" style=\"font-family: '$fontfamily';\">\n";
    }
    echo "$fontfamily";
    echo "</option>\n";
}

?>