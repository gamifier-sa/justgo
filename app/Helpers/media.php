<?php

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

/**
 * @Target this file to make function to help about media for all system
 * can call it in all system
 */
/**
 * @result get image from server but
 * @param $imageName => image i want from server
 * @param $model => Model Name
 */
function getImage($model, $imageName)
{
    if ($imageName) {

        $url = Storage::url($model.'/'.$imageName);
        return asset($url);
    }
    return asset('dashboard-assets/media/svg/files/blank-image.png');
}
/**
 * @Target this file to make function to help about media for all system
 * can call it in all system
 */
/**
 * @result get image from server but
 * @param $image => image i want from server
 * @param $model => Model Name
 */

 function storeImage($modelName, $image)
 {
     if ($image instanceof \Illuminate\Http\UploadedFile) {
         // Get the file name and extension.
         $fileName = $image->getClientOriginalName();
         $extension = $image->getClientOriginalExtension();
         $additionalName = uniqid();
         // Generate a unique file name.
         $fileName = $additionalName . '.' . $fileName;

         // Create a directory for the model.
         $modelDirectory = storage_path('app/public/' . $modelName);

         if (!file_exists($modelDirectory)) {
             mkdir($modelDirectory, 0777, true);
         }

         // Save the image to the directory.
         $image->move($modelDirectory, $fileName);

         // Return the file name.
         return $fileName;
     }

     return null; // Return null if the image is not an instance of UploadedFile
 }

function deleteImage($model, $imageName)
{
    Storage::disk('public')->delete($model."/".$imageName);
}
