<?php

namespace App\Modules\AboutMe\Model;

class Hobbie
{
    private string $title = "";
    private array $photos = [];

    public function __construct(string $title, array $photos)
    {
        $this->setTitle($title);
        $this->setPhotos($photos);
    }

    public function setTitle(string $title): void
    {
        $this->title = $title; 
    }

    public function getTitle(): string
    {
        return $this->title;
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