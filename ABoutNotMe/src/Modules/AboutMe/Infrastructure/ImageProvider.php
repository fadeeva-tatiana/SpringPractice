<?php

namespace App\Modules\AboutMe\Infrastructure;

use IvanUskov\ImageSpider\ImageSpider;                  // фабрика по производству конфет

class ImageProvider                                     //фантик
{
    private const QUANTITY_PHOTOS = 4;                  //количество конфеток в фантике (количество картинок в полосочке) 
    public function getPhotos(string $search): array    //Упаковываем конфету в фантик со кусом search (По заголовку ищет картинки и выдает)
    {
        $images = ImageSpider::find($search);           //много конфет с одинаковым вкусом 
        $result = [];                                   //Пустой фантик со вкусом
        shuffle($images);                               //Перемешивает конфеты с одинаковым вкусом

        for ($i = 0; $i < self::QUANTITY_PHOTOS; ++$i)  //Складывает n конфет в фантик
        { 
            $result[] = $images[$i]; 
        }

        return $result;                                 //Забираем готовую конфету
    } 
}