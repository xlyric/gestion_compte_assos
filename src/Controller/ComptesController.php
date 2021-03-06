<?php

namespace App\Controller;

use App\Entity\Client;
use App\Entity\Compte;
use App\Form\ComptaType;
use App\Form\ComptesType;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class ComptesController extends AbstractController
{
    /**
     * @Route("/administration/comptes/add", name="administrationajout")
     */
    public function add(Compte $ecriture=null, Request $request, EntityManagerInterface $objectManager): Response
    {
        if (!$ecriture) {
            $ecriture = new Compte(); 
            $ecriture->setComptable($this->getUser());
            } 
            
        $form = $this->createForm(ComptesType::class,$ecriture);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid() ) {
            $objectManager->persist($ecriture);
            $objectManager->flush();
            $this->addFlash("success","écriture ajoutée");
            return $this->redirectToRoute("administrationliste");
        }
        
        return $this->render('administrationcomptes/ajoutecriture.html.twig', [
            'form' => $form->createview(),
            'user' => $this->getUser()
        ]);
    }

      /**
     * @Route("/administration/comptes/{id}", name="administrationcomptemodification")
     */
    public function change(Compte $ecriture,Request $request, EntityManagerInterface $objectManager): Response
    {

        
        $form = $this->createForm(ComptesType::class,$ecriture);
        
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid() ) {
            $objectManager->persist($ecriture);
            $objectManager->flush();
            $this->addFlash("success","écriture modifiée");
            return $this->redirectToRoute("administrationliste");
        }

        return $this->render('administrationcomptes/modifiecriture.html.twig', [
            "ecriture" => $ecriture,
            'form' => $form->createview()
        ]);
    }

     /**
     * @Route("/administration/comptes", name="administrationliste")
     */
    public function list(): Response
    {
        $repository = $this->getDoctrine()->getRepository(Compte::class);
        $lastcomptes = $repository->findBy(array(), array('date' => 'DESC'));
        return $this->render('administrationcomptes/index.html.twig', [
            "lastcomptes" => $lastcomptes
            
        ]);
    }

     /**
     * @Route("/administration/comptes/delete/{id}", name="administrationcomptedelete")
     */
    public function delete(Compte $ecriture,Request $request, EntityManagerInterface $objectManager): Response
    {
            if ($this->isCsrfTokenValid("SUP". $ecriture->getId(),$request->get('_token') )){
                $objectManager->remove($ecriture);
                $objectManager->flush();
                $this->addFlash("success","écriture supprimée");
                return $this->redirectToRoute('administrationliste', [
                    
                ]);
            }

    }

     /**
     * @Route("/administration/client/detail/{id}", name="administrationclientdetail")
     */
    public function detail($id , Request $request, EntityManagerInterface $objectManager): Response
    {
        $repository = $this->getDoctrine()->getRepository(Compte::class);
        $lastcomptes = $repository->findBy(['client' => $id ], array('date' => 'DESC'));
        return $this->render('administrationcomptes/index.html.twig', [
            "lastcomptes" => $lastcomptes
            
        ]);
    }

    /**
     * @Route("/administration/comptes/valideecriture/{id}", name="administrationcomptevalideecriture")
     */
    public function valideecriture($id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $ecriture = $entityManager->getRepository(Compte::class)->find($id);
        
        if (!$ecriture) {
            $this->addFlash("error","écriture inexistante");
            throw $this->createNotFoundException(
                'No entry found for id '.$id
            );
        }

        $ecriture->setPayement('true');
        $entityManager->flush();

        $this->addFlash("success","écriture $id pointée");
                return $this->redirectToRoute('administrationliste', [
                    
                ]);

    }


}
