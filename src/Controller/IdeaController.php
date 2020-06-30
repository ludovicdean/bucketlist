<?php
namespace App\Controller;

use App\Entity\Idea;
use App\Form\IdeaType;
use Doctrine\ORM\EntityManagerInterface;
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

    /**
     * @param EntityManagerInterface $em
     * @Route("/idea/add", name="idea_add")
     */
    public function addIdea(EntityManagerInterface $em, Request $request)
    {
        $idea = new Idea();
        $idea->setDateCreated(new \DateTime());
        $idea->setIsPublished(true);

        $ideaForm = $this->createForm(IdeaType::class, $idea);

        $ideaForm->handleRequest($request);
        if ($ideaForm->isSubmitted() && $ideaForm->isValid()){
            $em->persist($idea);
            $em->flush();

            $this->addFlash('success', 'The idea has been saved !');
            /*return $this->redirectToRoute('idea_detail', ['id' => $idea->getId()]);
            */
        }


        return $this->render('/idea/add.html.twig',[
            "ideaForm" => $ideaForm->createView()
        ]);
    }
}