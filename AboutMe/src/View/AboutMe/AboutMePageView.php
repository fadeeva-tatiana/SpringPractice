<?php

namespace App\View\AboutMe;

use App\Modules\App\HobbieService;

class AboutMePageView
{
    private array $options = [];
    public function __construct(HobbieService $hobbies)
    {
        $result = [
            'hobbies' => [],
        ];

        foreach ($hobbies->getHobbies() as $value)
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