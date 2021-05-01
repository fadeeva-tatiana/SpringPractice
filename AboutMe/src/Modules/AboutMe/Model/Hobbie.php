<?php

namespace App\Modules\AboutMe\Model;

class Hobbie
{
    private string $title;
    private array $photos = [];

    public function __counstruct(string $title, array $photos): void
    {
        $this->title = $title;
        $this->photos = $photos;
    }

    public function getTitle(): string
    {
        //return $this->title;
        return "Test";
    }

    public function getPhotos(): array
    {
        return $this->photos;
    }

    public function setPhotos(array $photos): void
    {
        $this->photos = $photos;
    }
}