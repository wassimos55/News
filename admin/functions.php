<?php

function create_slug($arg)
{
    $arg = trim($arg);
    $arg = str_replace(' ', '-', $arg);
    $arg = strtolower($arg);
    return $arg;
}


function upload(array $image, $dir = "", $encode = false)
{
    $fileName = $image['name'];
    $size = $image['size'];
    $fileExt = explode('.', $fileName);
    $type = strtolower(end($fileExt));
    $allowed = ['png', 'jpeg', 'jpg', 'gif'];
    if (!in_array($type, $allowed)) {
        throw new Exception($type . " is not allowed", 1);
    } else if ($size > 10000000) {
        throw new Exception($fileName . " is larger than 10MB", 1);
    } else {
        if ($encode) {
            $fileName = uniqid("PWC") . "." . $type;
        }

        $target = $dir . basename($fileName);
        if (move_uploaded_file($image['tmp_name'], $target)) {
            return $target;
        } else {
            throw new Exception("Cannot upload file", 1);
        }
    }
}
