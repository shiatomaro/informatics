<?php
// Ensure the file parameter is set and not empty
if(isset($_GET['file']) && !empty($_GET['file'])){
    $file = $_GET['file'];

    // Check if the file exists
    if(file_exists($file)){
        // Set headers for file download
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="'.basename($file).'"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($file));
        ob_clean();
        flush();
        readfile($file);
        exit;
    } else {
        // File not found
        echo 'File not found.';
    }
} else {
    // File parameter is missing
    echo 'File parameter is missing.';
}
?>
