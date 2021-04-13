<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MyPageController extends AbstractController
{
    public function page(): Response
    {
        return $this->render('mypage.html.twig');
    }
}
