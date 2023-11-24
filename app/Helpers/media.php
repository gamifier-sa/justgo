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
         // Generate a unique file name.
         $fileName = uniqid() . '.' . $image->getClientOriginalExtension();

         // Create a directory for the model.
         $modelDirectory = 'public/' . $modelName;

         // Save the image to the directory.
         Storage::makeDirectory($modelDirectory);
         $image->storeAs($modelDirectory, $fileName);

         // Return the file name.
         return $fileName;
     }

     return null; // Return null if the image is not an instance of UploadedFile
 }



function deleteImage($model, $imageName)
{
    Storage::disk('public')->delete($model."/".$imageName);
}
