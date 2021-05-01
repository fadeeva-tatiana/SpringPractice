<?php

namespace App\Modules\AboutMe\Infrastructure;

use IvanUskov\ImageSpider\ImageSpider;

class ImageProvider
{
    private const QUANTITY_PHOTOS = 5;
    public function getPhotos(string $search): array
    {
        $urls = ImageSpider::find($search);
        return array_rand($urls, self::QUANTITY_PHOTOS);
    } 
}