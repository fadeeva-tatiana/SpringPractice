<?php

namespace App\Modules\AboutMe\App;

interface ImageProviderInterface
{
    public function getPhotos(string $search): array;
}