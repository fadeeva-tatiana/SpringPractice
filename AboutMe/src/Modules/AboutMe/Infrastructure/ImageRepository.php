<?php

namespace App\Modules\AboutMe\Infrastructure;

use App\Modules\AboutMe\App\ImageRepositoryInterface;
use App\Modules\AboutMe\Model\Image;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ObjectRepository;


class ImageRepository implements ImageRepositoryInterface
{
    private ObjectRepository $repository;
    private EntityManagerInterface $main;

    public function __construct(EntityManagerInterface $main)
    {
        $this->manager = $main;
        $this->repository = $this->manager->getRepository(Image::class);
    }
    //добавить удаление 
    //получение
    //изменение

}