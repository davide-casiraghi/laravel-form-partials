<?php

namespace DavideCasiraghi\LaravelFormPartials\Tests;

use Illuminate\Support\Facades\Storage;
use DavideCasiraghi\LaravelFormPartials\Facades\LaravelFormPartials;

class LaravelFormPartialsTest extends TestCase
{
    /** @test */
    public function it_uploads_an_image()
    {
        $imageSubdir = 'test_subdir';

        // Delete directory
        //dd(Storage::directories('public/images')); // List directories
        $directory = 'public/images/'.$imageSubdir.'/';
        Storage::deleteDirectory($directory);

        // Symulate the upload
        $local_test_file = __DIR__.'/test-files/large-avatar.png';
        $uploadedFile = new \Illuminate\Http\UploadedFile(
                    $local_test_file,
                    'large-avatar.png',
                    'image/png',
                    null,
                    null,
                    true
                );

        // Call the function uploadImageOnServer()
        $imageFile = $uploadedFile;
        $imageName = $imageFile->hashName();
        $imageWidth = '1067';
        $thumbWidth = '690';

        LaravelFormPartials::uploadImageOnServer($imageFile, $imageName, $imageSubdir, $imageWidth, $thumbWidth);

        // Leave this lines here - they can be very useful for new tests
        //$directory = "/";
        //dump(Storage::allDirectories($directory));
        //dd(Storage::allFiles($directory));

        $filePath = 'public/images/'.$imageSubdir.'/'.$imageName;

        Storage::assertExists($filePath);
    }
}
