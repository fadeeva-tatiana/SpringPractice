<?php  // Unit 

namespace App\Modules\AboutMe\App;

use App\Modules\AboutMe\App\ImageProviderInterface;
use App\Modules\AboutMe\App\HobbiesConfigurationInterface;
use App\Modules\AboutMe\Infrastructure\ImageRepository;
use App\Modules\AboutMe\Model\Hobbie;
use App\Modules\AboutMe\Model\Image;

class HobbieService //создает массив адекватных данных из картинок и названий
{
    private array $hobbies = [];  //var
    private ImageProviderInterface $imageProvider;
    private HobbiesConfigurationInterface $hobbiesConfiguration;
    private ImageRepositoryInterface $imageRepository;
    
    public function __construct(ImageProviderInterface $imageProvider, HobbiesConfigurationInterface $hobbiesConfiguration, ImageRepositoryInterface $imageRepository)
    {
        $this->imageProvider = $imageProvider;
        $this->hobbiesConfiguration = $hobbiesConfiguration;
        $this->imageRepository = $imageRepository;

        foreach ($this->hobbiesConfiguration::getHobbiesMap() as $value) //получить список хобби-заголовков 
        {
            $this->addHobbie($value);
        }
    }

    public function getHobbies(): array
    {
        return $this->hobbies;
    }

    public function getImages(string $title): array
    {
        $images = $this->imageRepository->get($title);
        return $images;
    }

    public function addHobbie(string $title): void
    {
        $photos = $this->getImages($title);         //даст массив картинок по заголовку 
        $hobbie = new Hobbie($title, $photos);      //заполнили объект заголовком и картинкой
        $this->hobbies[] = $hobbie;                 // добавляем увлечения в множество-массив?
    }

    public function update(): void
    {
        foreach ($this->getHobbies() as $hobby)
        {
            $urls = $this->imageProvider->getPhotos($hobby->getTitle());
            $images = [];
            foreach ($urls as $url)
            {
                $images[] = new Image($hobby->getTitle(), $url);
            }
            $this->imageRepository->update($hobby->getTitle(), $images);
        }
    }
}