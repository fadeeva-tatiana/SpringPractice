<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Modules\AboutMe\App\HobbieService;
use App\View\AboutMe\AboutMePageView;

class AboutMeController extends AbstractController
{
    public function page(HobbieService $hobbies): Response
    {
        $view = new AboutMePageView($hobbies->getHobbies());      //(Привязка к View)'

        return $this->render('mypage.html.twig', $view->getOptions()); 
    }

    public function update(HobbieService $hobbies): Response
    {
        // вызвать обновление картинок в HSer
        $hobbies->update();
        
        return new Response('OK');
    }
}
