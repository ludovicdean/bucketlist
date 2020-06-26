<?php
namespace App\Controller;

use App\Entity\Idea;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class IdeaController extends Controller
{
    /**
     * @Route("/list", name="list")
     */
    public function list()
    {
        $ideaRepo = $this->getDoctrine()->getRepository(Idea::class);
        $ideas = $ideaRepo->findAll();
        return $this->render("idea/list.html.twig",["ideas" =>$ideas]);
    }

    /**
     * @Route("/list/idea/{id}",
     *     name="idea_detail",
     *     requirements={"id": "\d+"},
     *     methods={"GET"}
     * )
     */
    public function detail($id, Request $request)
    {
        $ideaRepo = $this->getDoctrine()->getRepository(Idea::class);
        $idea = $ideaRepo->find($id);
        return $this->render("idea/detail.html.twig",["idea" =>$idea]);
    }
}