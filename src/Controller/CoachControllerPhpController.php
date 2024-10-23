<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CoachControllerPhpController extends AbstractController
{
    #[Route('/coach/controller/php', name: 'app_coach_controller_php')]
    public function index(): Response
    {
        return $this->render('coach_controller_php/index.html.twig', [
            'controller_name' => 'CoachControllerPhpController',
        ]);
    }
    #[Route('/AfficheCoach', name: 'app_AfficheCoach')]
    public function Affiche(CoachRepository $repository)
    {
        //récupérer les livres publiés
        $publishedCoach = $this->getDoctrine()->getRepository(Coach::class)->findBy(['published' => true]);
        //compter le nombre de livres pubbliés et non publiés
        $numPublishedCoach = count($publishedCoach);
        $numUnPublishedCoach= count($this->getDoctrine()->getRepository(Coach::class)->findBy(['published' => false]));

        if ($numPublishedCoach > 0) {
            return $this->render('book/Affiche.html.twig', ['publishedCoach' => $publishedCoach, 'numPublishedCoach' => $numPublishedCoach, 'numUnPublishedBooks' => $numUnPublishedBooks]);

        } else {
            //afficher un message si aucun livre n'a été trouvé$
            return $this->render('book/no_Coach_found.html.twig');
        }

    }
    public function  Add (Request  $request)
{
    $author=new Coach();
    $form =$this->CreateForm(CoachType::class,$Coach);
  $form->add('Ajouter',SubmitType::class);
    $form->handleRequest($request);
    if ($form->isSubmitted() && $form->isValid())
    {
        $em=$this->getDoctrine()->getManager();
        $em->persist($Coach);
        $em->flush();
        return $this->redirectToRoute('app_Affiche');
    }
    return $this->render('author/Add.html.twig',['f'=>$form->createView()]);

}
    #[Route('/edit/{id}', name: 'app_edit')]
    #[Route('/delete/{id}', name: 'app_delete')]
    public function delete($id, CoachRepository $repository)
    {
        $Coach = $repository->find($id);

        if (!$Coach) {
            throw $this->createNotFoundException('Coach non trouvé');
        }

        $em = $this->getDoctrine()->getManager();
        $em->remove($Coach);
        $em->flush();

        
        return $this->redirectToRoute('app_Affiche');
    }
}
