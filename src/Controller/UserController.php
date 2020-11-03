<?php

namespace App\Controller;


use App\Entity\Users;
use App\Form\UsersType;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\User\User;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Core\Validator\Constraints\UserPassword;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class UserController extends AbstractController
{
    /**
     * @Route("/administration/user", name="administrationuser")
     */
    public function list(): Response
    {
        $repository = $this->getDoctrine()->getRepository(Users::class);
        $Clients = $repository->findBy(array(), array('nom' => 'ASC'));
        return $this->render('administrationuser/index.html.twig', [
            'users' => $Clients,
        ]);
    }

    /**
     * @Route("/administration/user/add", name="administrationuseradd")
     */
    public function add(Users $user = null, request $request, EntityManagerInterface $objectManager, UserPasswordEncoderInterface $encoder ): Response
    {
        if (!$user) {
            $user = new Users(); 
            } 

        $form = $this->createForm(UsersType::class, $user);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid() ) {
            $passwordCrypyte = $encoder->encodePassword($user,$user->getPassword());
            $user->setPassword($passwordCrypyte);
            $objectManager->persist($user);
            $objectManager->flush();
            $this->addFlash("success","admin ajouté");
            return $this->redirectToRoute("administrationuser");
        }

        return $this->render('administrationuser/useradd.html.twig', [
            "form" => $form->createView()
        ]);
    }

    /**
     * @Route("/administration/user/{id}", name="administrationusermodif")
     */
    public function change(Users $user,Request $request, EntityManagerInterface $objectManager , UserPasswordEncoderInterface $encoder ): Response
    {
        $form = $this->createForm(UsersType::class,$user);
        
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid() ) {
            
            $passwordCrypyte = $encoder->encodePassword($user,$user->getPassword());
            $user->setPassword($passwordCrypyte);

            $objectManager->persist($user);
            $objectManager->flush();
            $this->addFlash("success","admin modifié");
            return $this->redirectToRoute("administrationuser");
        }

        return $this->render('administrationuser/usermodif.html.twig', [
            "user" => $user,
            "form" => $form->createView()
        ]);
    }

        /**
     * @Route("/administration/user/delete/{id}", name="administrationuserdelete")
     */
    public function delete(Users $user,Request $request, EntityManagerInterface $objectManager): Response
    {
        if ($this->isCsrfTokenValid("SUP". $user->getId(),$request->get('_token') )){
            $objectManager->remove($user);
            $objectManager->flush();
            $this->addFlash("success","admin supprimé");
        return $this->redirectToRoute('administrationuser');
        }
    }

     /**
     * @Route("/login", name="connexion")
     */
    public function login(AuthenticationUtils $utils): Response
    {


        return $this->render('index/login.html.twig', [
            "lastUserName" => $utils->getLastUsername(),
            "error" => $utils->getLastAuthenticationError()

        ]);
    }

      /**
     * @Route("/logout", name="deconnexion")
     */
    public function logout()
    {


    }

}
