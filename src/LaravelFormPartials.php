<?php

namespace DavideCasiraghi\LaravelFormPartials;

use Intervention\Image\ImageManagerStatic as Image;

class LaravelFormPartials
{
    /**
     * Upload image on server.
     * $imageFile - the file to upload
     * $imageSubdir is the subdir in /storage/app/public/images/..
     *
     * @param  array $imageFile
     * @param  string $imageName
     * @param  string $imageSubdir
     * @param  string $imageWidth
     * @param  string $thumbWidth
     * @return void
     */
    public static function uploadImageOnServer($imageFile, $imageName, $imageSubdir, $imageWidth, $thumbWidth)
    {

        // Create dir if not exist (in /storage/app/public/images/..)
        if (! \Storage::disk('public')->has('images/'.$imageSubdir.'/')) {
            \Storage::disk('public')->makeDirectory('images/'.$imageSubdir.'/');
        }

        $destinationPath = 'app/public/images/'.$imageSubdir.'/';

        // Resize the image with Intervention - http://image.intervention.io/api/resize
        // -  resize and store the image to a width of 300 and constrain aspect ratio (auto height)
        // - save file as jpg with medium quality
        $image = Image::make($imageFile->getRealPath())
                                ->resize((int) $imageWidth, null,
                                    function ($constraint) {
                                        $constraint->aspectRatio();
                                    })
                                ->save(storage_path($destinationPath.$imageName), 75);

        // Create the thumb
        $image->resize((int) $thumbWidth, null,
                    function ($constraint) {
                        $constraint->aspectRatio();
                    })
                ->save(storage_path($destinationPath.'thumb_'.$imageName), 75);
    }
    
    /*****************************************************************/
    
    /**
     * Save image file.
     * $imageSubdir is the subdir in /storage/app/public/images/..
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string $imageSubdir
     * @param  string $imageWidth
     * @param  string $thumbWidth
     * @return string $ret
     */
    public static function saveImageFile($request, $imageSubdir, $imageWidth, $thumbWidth)
    {
        if ($imageFile) {
            $imageFile = $request->file('image_file_name');
            $imageName = $imageFile->hashName();

            $this->uploadImageOnServer($imageFile, $imageName, $imageSubdir, $imageWidth, $thumbWidth);
            $ret = $imageName;
        } else {
            $ret = $request->image_file_name;
        }
        
        return $ret;
    }
}
