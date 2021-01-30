<?php

function importFiles($fieldID = 'zip_file') {
    // Future Development:
    // - Set destination values within a config file (per file type)

    $PostMSG = '';

    $ShowMSG = FALSE;
    $SetRedirect = TRUE;
    $SetRedirect_target = "fonts.php";

    if ($_FILES[$fieldID]['name'] != '') {
        $FileInfo_NameRAW = $_FILES[$fieldID]['name'];
        $FileInfo_NameTMP = $_FILES[$fieldID]['tmp_name'];

        $FileInfo_Name = basename($FileInfo_NameRAW);
        $FileInfo_Array = explode(".", $FileInfo_Name);
        $name = $FileInfo_Array[0];

        $FileInfo_Ext = $FileInfo_Array[1];
        $FileInfo_Size = $_FILES[$fieldID]['size'];

        if (preg_match("{[zZ][iI][pP]}",$FileInfo_Ext)) {
            $destination = "../cache/fonts/";
            importFiles_ZIP($ShowMSG, $SetRedirect, $fieldID, $destination);
        }

        if (preg_match("{[tT][tT][fF]}",$FileInfo_Ext)) {
            $destination = "../cache/fonts/";
            importFiles_TTF($ShowMSG, $SetRedirect, $fieldID, $destination);
        }
    }
}

function importFiles_ZIP($ShowMSG = FALSE, $SetRedirect = FALSE, $fieldID = 'zip_file', $destination = '../cache/TMP/') {
    $PostMSG = '';

    // $ShowMSG = FALSE;
    // $SetRedirect = TRUE;
    $SetRedirect_target = "fonts.php";

    // Generate the directory if it does not exist.  (* Look at moving to separate function)
    if (!file_exists($destination)) {
        mkdir($destination, 0777, true);
    }

    $FileInfo_NameRAW = $_FILES[$fieldID]['name'];
    $FileInfo_NameTMP = $_FILES[$fieldID]['tmp_name'];

    $FileInfo_Name = basename($FileInfo_NameRAW);
    $FileInfo_Array = explode(".", $FileInfo_Name);
    $name = $FileInfo_Array[0];

    $FileInfo_Ext = $FileInfo_Array[1];
    $FileInfo_Size = $_FILES[$fieldID]['size'];

    // $location = $destination . $FileInfo_Name;
    $destination_FullName = $destination . $FileInfo_Name;

    if (move_uploaded_file($FileInfo_NameTMP, $destination_FullName)) {
        $zip = new ZipArchive();

        if ($zip->open($destination_FullName)) {
            $zip->extractTo($destination);
            $zip->close();
        }

        // Remove the file if it exits.  (* Look at moving to separate function)
        if (is_file($destination_FullName)) {
            unlink ($destination_FullName);
        }
        rmdir ($destination . $name);

        if ($ShowMSG == TRUE) {
            $PostMSG .= "The file ". htmlspecialchars($FileInfo_Name). " has been uploaded.<br>";
            echo $PostMSG;
        }

        if ($SetRedirect == TRUE) {
            header("Location: $SetRedirect_target");
            exit();
        }
    }
}

function importFiles_TTF($ShowMSG = FALSE, $SetRedirect = FALSE, $fieldID = 'zip_file', $destination = '../cache/TMP/') {
    $PostMSG = '';

    // $ShowMSG = FALSE;
    // $SetRedirect = TRUE;
    $SetRedirect_target = "fonts.php";

    // Generate the directory if it does not exist.  (* Look at moving to separate function)
    if (!file_exists($destination)) {
        mkdir($destination, 0777, true);
    }

    $FileInfo_NameRAW = $_FILES[$fieldID]['name'];
    $FileInfo_NameTMP = $_FILES[$fieldID]['tmp_name'];

    $FileInfo_Name = basename($FileInfo_NameRAW);
    $FileInfo_Array = explode(".", $FileInfo_Name);
    $name = $FileInfo_Array[0];

    $FileInfo_Ext = $FileInfo_Array[1];
    $FileInfo_Size = $_FILES[$fieldID]['size'];

    $UseFileName = true;

    $CustomFont_fileName = "CustomFont.ttf";

    // Check file size
    $fileSizeMax = 500000;  // 500 KB

    if ($UseFileName == TRUE) {
        $destination_FullName = $destination . $FileInfo_Name;
    }
    else {
        $destination_FullName = $destination . $CustomFont_fileName;
    }

    $uploadOk = 1;

    // Check if file already exists
    if (file_exists($destination_FullName)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check file size
    if ($FileInfo_Size > $fileSizeMax) {
        if ($ShowMSG == TRUE) {
            echo "Sorry, your file is too large.";
        }
        $uploadOk = 0;
    }

    if(!preg_match("{[tT][tT][fF]}",$FileInfo_Ext)) {
        if ($ShowMSG == TRUE) {
            echo "Sorry, only ttf files are allowed.";
        }
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        if ($ShowMSG == TRUE) {
            echo "Sorry, your file was not uploaded.<br>";
        }
        // if everything is ok, try to upload file
    }
    else {
        if (move_uploaded_file($FileInfo_NameTMP, $destination_FullName)) {
            if ($ShowMSG == TRUE) {
                $PostMSG .= "The file ". htmlspecialchars($FileInfo_Name). " has been uploaded.<br>";
                echo $PostMSG;
            }

            if ($SetRedirect == TRUE) {
                header("Location: $SetRedirect_target");
                exit();
            }
        }
        else {
            if ($ShowMSG == TRUE) {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }
}

function exportFiles($source = "../cache/fonts", $destination = "../cache/archive", $exportFileName = "FontArchive_Custom.zip", $exportType = "zip", $SetRedirect = TRUE) {
    // exportFiles_ZIP("../assets/fonts","../cache/archive", "FontArchive_Stock.zip");
    // exportFiles_ZIP("../cache/fonts","../cache/archive", "FontArchive_Custom.zip");

    $exportType = "pmp";

    $PostMSG = '';

    $ShowMSG = FALSE;
    // $SetRedirect = TRUE;
    $SetRedirect_target = "fonts.php";

    if (preg_match("{[zZ][iI][pP]}",$exportType)) {
        // $source = "$source";
        // $destination = "$destination";
        exportFiles_ZIP($ShowMSG, $SetRedirect, $source, $destination, $exportFileName);
    }

    if (preg_match("{[pP][mM][pP]}",$exportType)) {
        // $source = "$source";
        // $destination = "$destination";
        $exportFileName = "PlexMoviePosterBackup.pmp";
        exportFiles_PMP($ShowMSG, $SetRedirect, $source, $destination, $exportFileName);
    }
}

function exportFiles_ZIP($ShowMSG = FALSE, $SetRedirect = FALSE, $source, $destination = "../cache/archive", $FileInfo_Name) {
    if (!extension_loaded('zip') || !file_exists($source)) {
        return false;
    }

    $PostMSG = '';

    // $ShowMSG = FALSE;
    // $SetRedirect = TRUE;
    $SetRedirect_target = "fonts.php";

    // Generate the directory if it does not exist.  (* Look at moving to separate function)
    if (!file_exists($destination)) {
        mkdir($destination, 0777, true);
    }

    // $destination_FullName = $destination . $FileInfo_Name;
    // $destination_FullName = "$destination/$FileInfo_Name";
    $destination_FullName = join('/', array(trim($destination, '/'), trim($FileInfo_Name, '/')));

    // Remove the file if it exits.  (* Look at moving to separate function)
    if (is_file($destination_FullName)) {
        unlink ($destination_FullName);
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

            if (in_array(substr($file, strrpos($file, '/')+1), array('.', '..')))
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

    // return $zip->close();
    $zip->close();
    header('Content-type: application/zip');
    header('Content-Disposition: attachment; filename='.basename($destination));

    if ($ShowMSG == TRUE) {
        $PostMSG .= "The file ". htmlspecialchars($FileInfo_Name). " has been uploaded.<br>";
        echo $PostMSG;
    }

    if ($SetRedirect == TRUE) {
        header("Location: $SetRedirect_target");
        exit();
    }
}

function exportFiles_PMP($ShowMSG = FALSE, $SetRedirect = FALSE, $source, $destination = "../cache/archive", $FileInfo_Name) {
    if (!extension_loaded('zip') || !file_exists($source)) {
        return false;
    }

    $PostMSG = '';

    $PMPFontsDir = "fonts/";

    // $ShowMSG = FALSE;
    // $SetRedirect = TRUE;
    $SetRedirect_target = "fonts.php";

    // Generate the directory if it does not exist.  (* Look at moving to separate function)
    if (!file_exists($destination)) {
        mkdir($destination, 0777, true);
    }

    // $destination_FullName = $destination . $FileInfo_Name;
    // $destination_FullName = "$destination/$FileInfo_Name";
    $destination_FullName = join('/', array(trim($destination, '/'), trim($FileInfo_Name, '/')));

    // Remove the file if it exits.  (* Look at moving to separate function)
    if (is_file($destination_FullName)) {
        unlink ($destination_FullName);
    }

    $zip = new ZipArchive();

    if (!$zip->open($destination_FullName, ZIPARCHIVE::CREATE)) {
        return false;
    }

    $source = str_replace('\\', '/', realpath($source));

    if (strpos($source, "../../")) {
        $configRootPath = "../../";
    }
    else {
        $configRootPath = "../";
    }

    $zip->addFile("$configRootPath/config.php","config.php");

    if (is_dir($source) === true) {
        $files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($source), RecursiveIteratorIterator::SELF_FIRST);

        foreach ($files as $file) {
            $file = str_replace('\\', '/', $file);

            if (in_array(substr($file, strrpos($file, '/')+1), array('.', '..')))
            continue;
            $file = realpath($file);

            if (is_dir($file) === true) {
                $zip->addEmptyDir(str_replace($source . '/', "$PMPFontsDir", $file . '/'));
            }
            else if (is_file($file) === true) {
                $zip->addFromString(str_replace($source . '/', "$PMPFontsDir", $file), file_get_contents($file));
            }
        }
    }
    else if (is_file($source) === true) {
        $zip->addFromString(basename($source), file_get_contents($source));
    }

    // return $zip->close();
    $zip->close();
    //header('Content-type: application/zip');
    //header('Content-Disposition: attachment; filename='.basename($destination));

    if ($ShowMSG == TRUE) {
        $PostMSG .= "The file ". htmlspecialchars($FileInfo_Name). " has been uploaded.<br>";
        echo $PostMSG;
    }

    if ($SetRedirect == TRUE) {
        header("Location: $SetRedirect_target");
        exit();
    }
}

function exportFiles_DownloadLink($fieldID = "DownloadLink", $destination = "../cache/archive", $FileInfo_Name = "FontArchive_Custom.zip") {
    $destination_FullName = join('/', array(trim($destination, '/'), trim($FileInfo_Name, '/')));

    if(file_exists($destination_FullName)) {
        $GLOBALS["$fieldID"] = "Download Bundle: <a href=\"$destination_FullName\">Here</a>";
    }
    else {
        $GLOBALS["$fieldID"] = "Download Bundle: <i>None</i>";
    }
}

?>