<?php

use Illuminate\Support\Facades\File;

function imageUpload($file, $width = null, $height = null, $path = null, $newImageName = null)
{
    // Generate a unique image name if not provided
    $newImageName = $newImageName == null ? uniqid() : $newImageName;

    // Set default path if not provided
    $path = $path == null ? 'backend/assets/images/' : $path;


    // Ensure the directory exists
    if (!File::exists($path)) {
        File::makeDirectory($path, 0755, true);
    }


    if ($file->getClientOriginalExtension() == 'gif') {
        $uploadPath = $path;
        $extension = $file->getClientOriginalExtension();
        $name = $newImageName . '.' . $extension;
        $file->move($path, $name);
        return $path . $name;
    }

    // Get image size and type
    list($origWidth, $origHeight, $imageType) = getimagesize($file);

    // Use original dimensions if width and/or height are not provided
    $width = (int)$width == null || $width == 0 ? (int)$origWidth : (int)$width;
    $height = (int)$height == null || $height == 0 ?  (int)$origHeight : (int)$height;


    // Create a new image resource
    $newImage = imagecreatetruecolor($width, $height);

    // Load the original image based on type
    switch ($imageType) {
        case IMAGETYPE_JPEG:
            $sourceImage = imagecreatefromjpeg($file);
            $fileExtension = '.jpg'; // Set extension for JPEG
            break;
        case IMAGETYPE_PNG:
            $sourceImage = imagecreatefrompng($file);
            $fileExtension = '.png'; // Set extension for PNG
            break;
        case IMAGETYPE_WEBP:
            $sourceImage = imagecreatefromwebp($file);
            $fileExtension = '.webp'; // Set extension for WEBP
            break;
        case IMAGETYPE_GIF:
            $sourceImage = imagecreatefromgif($file);
            $fileExtension = '.gif'; // Set extension for GIF
            break;
        default:
            throw new Exception("Unsupported image type.");
    }

    // Resize the image
    imagecopyresampled($newImage, $sourceImage, 0, 0, 0, 0, $width, $height, $origWidth, $origHeight);

    // Determine the path for saving the resized image with the original extension
    $newFilePath = public_path("{$path}/{$newImageName}{$fileExtension}");

    // Save the resized image based on type
    switch ($imageType) {
        case IMAGETYPE_JPEG:
            imagejpeg($newImage, $newFilePath);
            break;
        case IMAGETYPE_PNG:
            imagepng($newImage, $newFilePath);
            break;
        case IMAGETYPE_WEBP:
            imagewebp($newImage, $newFilePath);
            break;
        case IMAGETYPE_GIF:
            imagegif($newImage, $newFilePath);
            break;
    }

    // Free up memory
    imagedestroy($newImage);
    imagedestroy($sourceImage);

    return "{$path}/{$newImageName}{$fileExtension}";
}
