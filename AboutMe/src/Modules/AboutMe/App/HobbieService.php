<?php

namespace App\Modules\App;

use App\Modules\AboutMe\Infrastructure\HobbiesRepository;
use App\Modules\AboutMe\Model\Hobbie;
use App\Modules\AboutMe\Infrastructure\ImageProvider;

class HobbieService
{
    private array $hobbies = [];
    private ImageProvider $imageProvider;

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
        $this->hobbies[] = new Hobbie($title, $imageProvider->getPhotos($title));
    }
}