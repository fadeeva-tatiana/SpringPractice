<?php

namespace App\Modules\AboutMe\Infrastructure;

class HobbiesRepository
{
    public static function getHobbiesMap(): array
    {
        return [
            'Программирование',
            'PHP',
            'Symfony',
            'Linux',
            'Assembler',
        ];
    }
}