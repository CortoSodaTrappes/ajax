<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\Joueurs;

class AjaxController extends Controller
{
    public function index()
    {
        $id=1;
        $repository = $this->getDoctrine()->getRepository(Joueurs::class);

        // $joueur = $repository->find($id);
        // $joueur = $repository->findOneBy(['id' => 1]);
        $liste = $repository->findAll();

        $array = array('joueur1'=>"Pedro", 'joueur2' => "Andre") ;
        return $this->render('ajax/index.html.twig', [
             'liste' => $liste 
        ]);
    }
}
