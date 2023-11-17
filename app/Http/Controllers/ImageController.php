<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function cropImage(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif',
            'x' => 'required|numeric',
            'y' => 'required|numeric',
            'width' => 'required|numeric',
            'height' => 'required|numeric',
        ]);

        $image = $request->file('image');
        $x = (int) $request->input('x');
        $y = (int) $request->input('y');
        $width = (int) $request->input('width');
        $height = (int) $request->input('height');

        // Create an image resource from the uploaded file
        $img = imagecreatefromjpeg($image->path()); // You can also use imagecreatefrompng() or imagecreatefromgif()

        // Create a new image with the cropped dimensions
        $croppedImage = imagecreatetruecolor($width, $height);

        // Crop the image
        imagecopyresampled($croppedImage, $img, 0, 0, $x, $y, $width, $height, $width, $height);

        // Save the cropped image (you can replace this with your desired path)
        $croppedImagePath = public_path('img') . '/' . $image->getClientOriginalName();
        imagejpeg($croppedImage, $croppedImagePath, 100); // You can also use imagepng() or imagegif()

        // Free up memory
        imagedestroy($img);
        imagedestroy($croppedImage);

        return 'Image cropped and saved successfully.';
    }
}
