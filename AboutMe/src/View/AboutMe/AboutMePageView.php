<?php

namespace App\View\AboutMe;

use App\Modules\AboutMe\App\HobbieService;

class AboutMePageView
{
    private array $options = [];
    public function __construct(array $hobbies) //инициализация 
    {
        $result = [
            'hobbies' => [],
        ];

        foreach ($hobbies as $value)  //создает нормальные наборы
        {
            $result['hobbies'][] = [
                'title' => $value->getTitle(),
                'photos' => $value->getPhotos(),
            ];
        }

        $this->options = $result;
    }

    public function getOptions(): array
    {
        return $this->options;
    }
}