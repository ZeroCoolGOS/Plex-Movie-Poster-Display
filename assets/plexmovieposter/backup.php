<?php
include "importExportLib.php";

// This file is meant to be a headless action of the backup of the fully Plex movie poster Configuration
// Build a full backup system
// include config.php
// fonts
// Use date/time for file  name (included)
// file ext .pmp (works with zip ext)

// ToDos: 
//  - Fix issue when the cache folder does not exist

$rootDir = "../../";

$d = date("Y-m-d");
echo "Date: $d <br>";

$BackupFile = "PlexMoviePosterBackup_$d.pmp";
echo "Backup File: $BackupFile";

exportFiles("$rootDir/cache/fonts", "$rootDir/cache/archive", "$BackupFile", "pmp", FALSE);

echo "<br>Download Backup: <a href=\"$rootDir/cache/archive/$BackupFile\">Here</a>";

