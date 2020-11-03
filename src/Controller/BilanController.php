<?php

namespace App\Controller;

use App\Entity\Compte;
use App\Repository\CompteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BilanController extends AbstractController
{
    /**
     * @Route("/bilan", name="bilan")
     */
    public function bilan(): Response
    {
        $repository = $this->getDoctrine()->getRepository(Compte::class);
        $lastcomptes = $repository->getbilan();
        return $this->render('bilan/index.html.twig', [
            "lastcomptes" => $lastcomptes
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
