<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class IdeaController extends Controller
{
    /**
     * @Route("/list", name="list")
     */
    public function list()
    {
        return $this->render("idea/list.html.twig");
    }

    /**
     * @Route("/detail", name="detail")
     */
    public function detail()
    {
        return $this->render("idea/detail.html.twig");
    }
}