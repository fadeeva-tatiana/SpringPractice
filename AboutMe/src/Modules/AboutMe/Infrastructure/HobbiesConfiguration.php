<?php

namespace App\Modules\AboutMe\Infrastructure;

use App\Modules\AboutMe\App\HobbiesConfigurationInterface;

class HobbiesConfiguration implements HobbiesConfigurationInterface
{
    public static function getHobbiesMap(): array //хранит массив заголовков
    {
        return [
            'Программирование',
            'Котики',
            'Головоломки',
        ];
    }
}