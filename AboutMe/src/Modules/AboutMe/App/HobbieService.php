<?php

namespace App\Modules\App;

use App\Modules\AboutMe\Infrastructure\HobbiesRepository;
use App\Modules\AboutMe\Model\Hobbie;
use App\Modules\AboutMe\Infrastructure\ImageProvider;

class HobbieService
{
    private array $hobbies = [];

    public function __construct()
    {
        foreach (HobbiesRepository::getHobbiesMap() as $value)
        {
            $this->addHobbie($value);
        }
    }

    public function getHobbies(): array
    {
        return $this->hobbies;
    }

    public function addHobbie(string $title): void
    {
        $imageProvider = new ImageProvider();
        $photos = $imageProvider->getPhotos($title);
        $hobbie = new Hobbie($title, $photos);
        $this->hobbies[] = $hobbie;
    }
}