<?php

namespace App\Controller;


use App\Entity\Client;
use App\Form\ClientType;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Mapping\Id;

use Doctrine\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ClientController extends AbstractController
{




    /**
     * @Route("/administration/client", name="administrationclient")
     */
    public function list(): Response
    {
        $repository = $this->getDoctrine()->getRepository(Client::class);
        //$Clients = $repository->findAll();
        $Clients = $repository->findBy(array(), array('nom' => 'ASC'));
        return $this->render('administrationclient/index.html.twig', [
            'Clients' => $Clients,
        ]);
    }

        /**
     * @Route("/administration/client/add", name="administrationclientajout")
     */
    public function add(Client $user = null,  Request $request, EntityManagerInterface $objectManager): Response
    {
        if (!$user) {
        $user = new Client(); 
        }
        
        $form = $this->createForm(ClientType::class, $user);
        
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid() ) {
            $objectManager->persist($user);
            $objectManager->flush();
            $this->addFlash("success","Client enregistré");
            return $this->redirectToRoute("administrationclient");
        }


        return $this->render('administrationclient/clientadd.html.twig', [
            'controller_name' => 'AdministrationclientController',
            "form" => $form->createView()
        ]);
    }
    
        /**
     * @Route("/administration/client/{id}", name="administrationclientmodif")
     */
    public function change(Client $user, Request $request, EntityManagerInterface $objectManager): Response
    {
        $form = $this->createForm(ClientType::class,$user);
        
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid() ) {
            $objectManager->persist($user);
            $objectManager->flush();
            $this->addFlash("success","Client modifié");
            return $this->redirectToRoute("administrationclient");
        }


        return $this->render('administrationclient/clientmodif.html.twig', [
            "id" => $user,
            'controller_name' => 'AdministrationclientController',
            "form" => $form->createView()
        ]);
    }

        /**
     * @Route("/administration/client/delete/{id}", name="administrationclientdelete")
     */
    public function delete(Client $user, Request $request, EntityManagerInterface $objectManager): Response
    {
        if ($this->isCsrfTokenValid("SUP". $user->getId(),$request->get('_token') )){
            $objectManager->remove($user);
            $objectManager->flush();
            $this->addFlash("success","Client supprimé");
        return $this->redirectToRoute('administrationclient');
        }
    }


}
