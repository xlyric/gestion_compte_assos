<?php

namespace App\Controller;

use App\Entity\Compte;
use App\Repository\CompteRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class BilanController extends AbstractController
{
    /**
     * @Route("/bilan", name="bilan")
     */
    public function bilan(Request $request): Response
    {
        $repository = $this->getDoctrine()->getRepository(Compte::class);
        $annee="2020";

        
        if ( $request->getMethod() == "POST" ) {
        $annee=$request->get('annee');;
        
        }
        $lastcomptes = $repository->getbilan($annee);

        return $this->render('bilan/index.html.twig', [
            "lastcomptes" => $lastcomptes,
            "annee" => $annee
        ]);
    }

    /**
     * @Route("/bilan/{id}", name="bilandetail")
     */
    public function detail(CompteRepository $repository,$id): Response
    {
        //$repository = $this->getDoctrine()->getRepository(Compte::class);
        $lastcomptes = $repository->getbilancode($id);
        return $this->render('bilan/detail.html.twig', [
            "lastcomptes" => $lastcomptes
        ]);
    }

}
