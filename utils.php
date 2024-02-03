<?php

function dd($value)
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";
    die();
}

function urlIs($value)
{
    return $_SERVER['REQUEST_URI'] = $value;
}

// gets the url query params and returns it as an array
function getQueryParams()
{
    $request = parse_url($_SERVER['REQUEST_URI']);
    $query = isset($request['query']) ? $request['query'] : null;
    if ($query !== null) {
        parse_str($query, $queryParams);
        return $queryParams;
    } else {
        return null;
    }
}

// checks if the image is a valid jpeg or png file
// this functions returns true if the image is valid and false otherwise
function validateImg($file_path)
{
    // Open the file in binary mode
    $file_handle = fopen($file_path, 'rb');

    // Read the first few bytes to determine the file type
    $file_signature = fread($file_handle, 4);

    // Close the file handle
    fclose($file_handle);

    // Validate the file signature to determine the file type
    if (
        // JPEG magic number: 0xFFD8
        strncmp($file_signature, "\xFF\xD8", 2) === 0 ||
        // PNG magic number: 0x89504E47
        strncmp($file_signature, "\x89\x50\x4E\x47", 4) === 0
    ) {
        return true;
    } else {
        return false;
    }
}

function getMIMEType($img_data)
{
    $finfo = new finfo(FILEINFO_MIME_TYPE);
    $mime_type = $finfo->buffer($img_data);
    return $mime_type;
}
