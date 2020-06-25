<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="home")
     */
    public function home()
    {
        return $this->render("default/home.html.twig");
    }

    /**
     * @Route("/aboutus", name="aboutus")
     */
    public function aboutUs()
    {
        $json = file_get_contents('team.json', FILE_USE_INCLUDE_PATH);
        $json = json_decode($json);
        return $this->render("default/aboutUs.html.twig",["json"=>$json]);
    }
}