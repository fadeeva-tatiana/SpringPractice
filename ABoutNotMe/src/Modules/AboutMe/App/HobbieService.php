<?php  // Unit 

namespace App\Modules\App;

use App\Modules\AboutMe\Infrastructure\HobbiesRepository;
use App\Modules\AboutMe\Model\Hobbie;
use App\Modules\AboutMe\Infrastructure\ImageProvider;

class HobbieService //создает массив адекватных данных из картинок и названий
{
    private array $hobbies = [];  //var

    public function __construct()
    {
        foreach (HobbiesRepository::getHobbiesMap() as $value) //получить список хобби-заголовков 
        {
            $this->addHobbie($value);
        }
    }

    public function getHobbies(): array
    {
        return $this->hobbies;
    }

    public function addHobbie(string $title): void
    {
        $imageProvider = new ImageProvider();
        $photos = $imageProvider->getPhotos($title); //даст массив картинок по заголовку
        $hobbie = new Hobbie($title, $photos);      //заполнили объект заголовком и картинкой
        $this->hobbies[] = $hobbie;                 // добавляем увлечения в множество-массив?
    }
}