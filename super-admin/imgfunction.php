<?php
function saveImage($value)
{
    $filename = $value['image']['name'];
    $destination = '../public/images/' . $filename;
    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    $file = $_FILES['image']['tmp_name'];
    $size = $_FILES['image']['size'];

    if (!in_array($extension, ['jpg', 'png', 'jpeg'])) {
        return "extension";
    } elseif ($value['image']['size'] > 2000000) { // file shouldn't be larger than 1Megabyte
        return "size";
    } else {
        // move the uploaded (temporary) file to the specified destination
        move_uploaded_file($file, $destination);
        return $filename;
    }
};
