<?php  // Unit 

namespace App\Modules\AboutMe\App;

use App\Modules\AboutMe\App\ImageProviderInterface;
use App\Modules\AboutMe\App\HobbiesConfigurationInterface;
use App\Modules\AboutMe\Model\Hobbie;

class HobbieService //создает массив адекватных данных из картинок и названий
{
    private array $hobbies = [];  //var
    private ImageProviderInterface $imageProvider;
    private HobbiesConfigurationInterface $hobbiesConfiguration;
    
    public function __construct(ImageProviderInterface $imageProvider, HobbiesConfigurationInterface $hobbiesConfiguration)
    {
        $this->imageProvider = $imageProvider;
        $this->hobbiesConfiguration = $hobbiesConfiguration;

        foreach ($this->hobbiesConfiguration::getHobbiesMap() as $value) //получить список хобби-заголовков 
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
        $photos = $this->imageProvider->getPhotos($title); //даст массив картинок по заголовку 
        $hobbie = new Hobbie($title, $photos);      //заполнили объект заголовком и картинкой
        $this->hobbies[] = $hobbie;                 // добавляем увлечения в множество-массив?
    }
}