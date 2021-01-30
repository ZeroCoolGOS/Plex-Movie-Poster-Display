<?php

function importFiles($fieldID = 'zip_file') {
    // Future Development:
    // - Set destination values within a config file (per file type)

    $ShowMSG = FALSE;
    $SetRedirect = FALSE;
    $SetRedirect_target = "fonts.php";

    $PostMSG = '';

    if ($_FILES[$fieldID]['name'] != '') {
        $file_name = basename($_FILES[$fieldID]['name']);
        $array = explode(".", $file_name);
        $name = $array[0];
        $ext = $array[1];

        if ($ext == 'zip') {
            $destination = "../cache/fonts/";
            importFiles_ZIP($ShowMSG, $SetRedirect, $fieldID, $destination);
        }
    }
}

function importFiles_ZIP($ShowMSG = FALSE, $SetRedirect = FALSE, $fieldID = 'zip_file', $destination = '../cache/TMP/') {
    $PostMSG = '';

    $SetRedirect_target = "fonts.php";

    // Generate the directory if it does not exist.  (* Look at moving to separate function)
    if (!file_exists($destination)) {
        mkdir($destination, 0777, true);
    }

    $fileName_RAW = $_FILES[$fieldID]['name'];
    $fileName_TMP = $_FILES[$fieldID]['tmp_name'];

    $file_name = basename($fileName_RAW);
    $array = explode(".", $file_name);
    $name = $array[0];
    $ext = $array[1];

    // $location = $destination . $file_name;
    $destination_FullName = $destination . $file_name;

    if (move_uploaded_file($fileName_TMP, $destination_FullName)) {
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

        if ($ShowMSG == true) {
            $PostMSG .= "The file ". htmlspecialchars($file_name). " has been uploaded.<br>";
            echo $PostMSG;
        }

        if ($SetRedirect == true) {
            header("Location: $SetRedirect_target");
            exit();
        }
    }
}

function exportFiles($source = "../cache/fonts", $destination = "../cache/archive", $exportFileName = "FontArchive_Custom.zip", $exportType = "zip") {
    // exportFiles_ZIP("../assets/fonts","../cache/archive", "FontArchive_Stock.zip");
    // exportFiles_ZIP("../cache/fonts","../cache/archive", "FontArchive_Custom.zip");

    $ShowMSG = FALSE;
    $SetRedirect = FALSE;
    $SetRedirect_target = "fonts.php";

    $PostMSG = '';

    if ($exportType == 'zip') {
        // $source = "$source";
        // $destination = "$destination";
        exportFiles_ZIP($source, $destination, $exportFileName);
    }
}

function exportFiles_ZIP($source, $destination = "../cache/archive", $file_Name) {
    if (!extension_loaded('zip') || !file_exists($source)) {
        return false;
    }

    $PostMSG = '';

    $SetRedirect_target = "fonts.php";

    // $destination_FullName = $destination . $file_Name;
    // $destination_FullName = "$destination/$file_Name";
    $destination_FullName = join('/', array(trim($destination, '/'), trim($file_Name, '/')));

    // Generate the directory if it does not exist.  (* Look at moving to separate function)
    if (!file_exists($destination)) {
        mkdir($destination, 0777, true);
    }

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

    return $zip->close();
    header('Content-type: application/zip');
    header('Content-Disposition: attachment; filename='.basename($destination));
}

function exportFiles_DownloadLink($destination = "../cache/archive", $file_Name = "FontArchive_Custom.zip") {
    $destination_FullName = join('/', array(trim($destination, '/'), trim($file_Name, '/')));

    if(file_exists($destination_FullName)) {
        $GLOBALS['DownloadLink'] = "<a href=\"$destination_FullName\">TEST</a>";
    }
}

?>