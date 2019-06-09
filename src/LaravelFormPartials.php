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
        if ($imageFile) {
            // Create dir if not exist (in /storage/app/public/images/..)
            if (! \Storage::disk('public')->has('images/'.$imageSubdir.'/')) {
                \Storage::disk('public')->makeDirectory('images/'.$imageSubdir.'/');
            }

            $destinationPath = 'app/public/images/'.$imageSubdir.'/';
            $imageName = $imageFile->hashName();
            // Resize the image with Intervention - http://image.intervention.io/api/resize
            // - resize and store the image to a specific width and constrain aspect ratio (auto height)
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

        $ret = $imageName;

        return $ret;
    }
}
