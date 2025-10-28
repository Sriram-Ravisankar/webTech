<?php
// Specify the input and output file names
$inputFile = "input.txt";
$outputFile = "output.txt";

// Check if the input file exists
if (file_exists($inputFile)) {
    // Read the contents of the file
    $contents = file_get_contents($inputFile);

    // Convert the contents to uppercase
    $uppercaseContents = strtoupper($contents);

    // Write the uppercase contents to a new file
    file_put_contents($outputFile, $uppercaseContents);

    echo "File converted to uppercase successfully! Check '$outputFile'.";
} else {
    echo "Error: The file '$inputFile' does not exist.";
}
?>
