<?php

namespace App\Modules\AboutMe\App;

interface ImageRepositoryInterface
{
    //функции, которые в IR(App) нужно добавить:
    public function update(string $keyword, array $images): void;
    public function get(string $keyword): ?array;
}