<?php

$zipFile = 'path/to/public.zip'; // Path to the zip file you want to unzip
$extractTo = 'path/to/project'; // Path to the folder where you want to extract the files

$zip = new ZipArchive;

if ($zip->open($zipFile) === true) {
    $zip->extractTo($extractTo);
    $zip->close();
    echo 'Files extracted successfully.';
} else {
    echo 'Failed to extract files.';
}
