<?php

namespace App\Service;

use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class ImageConverter
{
    public function convertToWebp(string $path): string
    {
        $manager = new ImageManager(new Driver());

        $image = $manager->decodePath($path);

        $newPath = preg_replace(
            '/\.[^.]+$/',
            '.webp',
            $path
        );

        $image->save($newPath, quality: 85);

        if (file_exists($path)) {
            unlink($path);
        }

        return $newPath;
    }
}