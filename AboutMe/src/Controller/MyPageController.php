<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Modules\App\HobbieService;
use App\View\AboutMe\AboutMePageView;

class MyPageController extends AbstractController
{
    public function page(): Response
    {
        $hobbies = new HobbieService();
        $view = new AboutMePageView($hobbies);

        return $this->render('mypage.html.twig', $view->getOptions());
    }
}
