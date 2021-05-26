<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Modules\App\HobbieService;
use App\View\AboutMe\AboutMePageView;

class AboutMeController extends AbstractController
{
    public function page(): Response
    {
        $hobbies = new HobbieService();             //складывает в наборы
        $view = new AboutMePageView($hobbies);      //(Привязка к View)'

        return $this->render('mypage.html.twig', $view->getOptions()); 
    }
}
