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
        $h = [
            'hobbies' => [
                [
                    'title' => '1',
                    'photos' => [1,2,3],
                ],
                [
                    'title' => '1',
                    'photos' => [1,2,3],
                ]
            ]
        ];
        return $this->render('mypage.html.twig', $view->getOptions());
    }
}
