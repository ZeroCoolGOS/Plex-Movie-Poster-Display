<?php

function GenerateCSS_FontSingle($fontName, $fontFile) {
    $target_dir = "../cache/fonts/";
    $target_fileName = "GenFonts.css";
    // $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $target_file = $target_dir . $target_fileName;

    // Generate the Upload directory if it does not exist.
    if (!file_exists($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    // $publishString = "test\n";

    // Font CSS Logic

    $fontPath = "/cache/fonts";
    // $fontName = "CustomFont";
    // $fontFile = "CustomFont";

    $publishString = "@font-face {\n";
    $publishString .= "    font-family: \"$fontName\";\n";
    $publishString .= "    src: url('$fontPath/$fontFile.eot');\n";
    $publishString .= "    src: url('$fontPath/$fontFile.eot?#iefix') format('embedded-opentype'),\n";
    $publishString .= "         url('$fontPath/$fontFile.woff') format('woff'),\n";
    $publishString .= "         url('$fontPath/$fontFile.ttf') format('truetype'),\n";
    $publishString .= "         url('$fontPath/$fontFile.svg#webfont') format('svg');\n";
    $publishString .= "}\n\n";

    // Open the file to get existing content
    $current = file_get_contents($target_file);

    // Append a new entry to the file
    $current .= "$publishString";

    // Write the contents back to the file
    file_put_contents($target_file, $current);

    // // Write the contents to the file,
    // // using the FILE_APPEND flag to append the content to the end of the file
    // // and the LOCK_EX flag to prevent anyone else writing to the file at the same time
    // file_put_contents($target_file, $publishString, FILE_APPEND | LOCK_EX);

}

function GenerateCSS_Font() {
    $target_dir = "../cache/fonts/";
    $target_fileName = "GenFonts.css";
    $target_file = $target_dir . $target_fileName;

    if (is_file($target_file)) {
        unlink($target_file);
    }

    // $files = glob('folder/*.{jpg,png,gif}', GLOB_BRACE);
    $files = glob("$target_dir/*.{[tT][tT][fF]}", GLOB_BRACE);

    foreach($files as $file) {
    //do your work here
        $file_parts = pathinfo($file);

        GenerateCSS_FontSingle($file_parts['filename'],$file_parts['filename']);
    }
}


?>