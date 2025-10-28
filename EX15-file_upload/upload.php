<?php
$targetDirectory = "uploads/";  // Folder to save uploaded files

// Create the folder if it doesn't exist
if (!is_dir($targetDirectory)) {
    mkdir($targetDirectory, 0755, true);
}

$targetFile = $targetDirectory . basename($_FILES["fileToUpload"]["name"]);
$fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

// Check if a file was uploaded
if (isset($_FILES["fileToUpload"])) {
    // Check for upload errors
    if ($_FILES["fileToUpload"]["error"] == 0) {
        // Move file from temporary directory to uploads folder
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $targetFile)) {
            echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded successfully.";
        } else {
            echo "Error: File could not be uploaded.";
        }
    } else {
        echo "Error: " . $_FILES["fileToUpload"]["error"];
    }
} else {
    echo "No file was uploaded.";
}
?>
