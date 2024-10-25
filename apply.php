<?php

if(!empty($_FILES['advanced_psychological_assessment'])) {

    // Directory where the file will be saved
    $uploadDir = 'uploads/';

    // Access the uploaded file info
    $fileTmpPath = $_FILES['advanced_psychological_assessment']['tmp_name'];
    $fileName = $_FILES['advanced_psychological_assessment']['name'];

    // Define a new file name (you can change this according to your needs)
    $newFileName = 'renamed_file_' . time() . '.' . pathinfo($fileName, PATHINFO_EXTENSION);

    // Full path to save the file
    $destinationPath = $uploadDir . $newFileName;

    // Move the file from the temporary directory to the final destination
    if (move_uploaded_file($fileTmpPath, $destinationPath)) {
        echo "File uploaded and renamed to: " . $newFileName;
    } else {
        echo "There was an error moving the uploaded file.";
    }
}
die();
