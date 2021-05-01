<?php

namespace App\Modules\AboutMe\Infrastructure;

use IvanUskov\ImageSpider\ImageSpider;

class ImageProvider
{
    private const QUANTITY_PHOTOS = 5;
    public function getPhotos(string $search): array
    {
        $images = ImageSpider::find($search);
        $result = [];
        shuffle($images);

        for ($i = 0; $i <= self::QUANTITY_PHOTOS; ++$i)
        { 
            $result[] = $images[$i]; 
        }

        return $result;
    } 
}