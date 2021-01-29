<?php

function importFiles() {
    $ShowMSG = FALSE;
    $SetRedirect = FALSE;

    $PostMSG = '';

    if ($_FILES['zip_file']['name'] != '') {
        $file_name = basename($_FILES['zip_file']['name']);
        $array = explode(".", $file_name);
        $name = $array[0];
        $ext = $array[1];

        if ($ext == 'zip') {
            $destination = '../cache/fonts/';
            importFiles_ZIP($ShowMSG, $SetRedirect, $destination);
        }
    }
}

function importFiles_ZIP($ShowMSG = FALSE, $SetRedirect = FALSE, $destination = '../cache/TMP/') {
    $PostMSG = '';

    // Generate the directory if it does not exist.
    if (!file_exists($destination)) {
        mkdir($destination, 0777, true);
    }

    $fileName_RAW = $_FILES['zip_file']['name'];
    $fileName_TMP = $_FILES['zip_file']['tmp_name'];

    $file_name = basename($fileName_RAW);
    $array = explode(".", $file_name);
    $name = $array[0];
    $ext = $array[1];

    // $location = $destination . $file_name;
    $destination_FullName = $destination . $file_name;

    if (move_uploaded_file($fileName_TMP, $destination_FullName)) {
        $zip = new ZipArchive;

        if ($zip->open($destination_FullName)) {
            $zip->extractTo($destination);
            $zip->close();
        }

        unlink ($destination_FullName);
        rmdir ($destination . $name);

        if ($ShowMSG == true) {
            $PostMSG .= "The file ". htmlspecialchars($file_name). " has been uploaded.<br>";
            echo $PostMSG;
        }
        if ($SetRedirect == true) {
            header("Location: fonts.php");
            exit();
        }
    }
}


?>