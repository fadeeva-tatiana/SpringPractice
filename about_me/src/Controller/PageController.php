<?php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PageController extends AbstractController
{
    public function page(): Response
    {
        return $this->render('mypage.html.twig');
    }
}
