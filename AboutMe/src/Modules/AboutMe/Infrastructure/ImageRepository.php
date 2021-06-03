<?php

namespace App\Modules\AboutMe\Infrastructure;

use App\Modules\AboutMe\App\ImageRepositoryInterface;
use App\Modules\AboutMe\Model\Image;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ObjectRepository;


class ImageRepository implements ImageRepositoryInterface
{
    private ObjectRepository $repository;
    private EntityManagerInterface $manager;

    public function __construct(EntityManagerInterface $main)
    {
        $this->manager = $main;                                              
        $this->repository = $this->manager->getRepository(Image::class);    //получение таблицы картинок из базы
    }
    
    public function get(string $title): ?array
    {
        return $this->repository->findBy([
            'keyword' => $title,
        ]);
    }

    public function update(string $keyword, array $images): void
    {
        $temp = $this->get($keyword);
        foreach ($temp as $image)
        {
            $this->delete($image);
        }

        foreach ($images as $image)
        {
            $this->add($image);
        }
        $this->flush();
    }

    private function add(Image $image): void
    {
        $this->manager->persist($image);
    }

    private function delete(Image $image): void
    {
        $this->manager->remove($image);
    }

    private function flush(): void
    {
        $this->manager->flush();
    }
}