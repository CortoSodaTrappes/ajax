<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\Joueurs;

class AjaxController extends Controller
{
    public function index()
    {
        $repository = $this->getDoctrine()->getRepository(Joueurs::class);
        $liste = $repository->findAll();

        return $this->render('ajax/index.html.twig', [
             'liste' => $liste 
        ]);
    }

    

    public function show(Request $request){
        // var_dump($request);

        try{
            $joueur = $this->getDoctrine()
                    ->getRepository(Joueurs::class);
            $joueurs = $joueur->find($request->get("id"));
        }catch(\Doctrine\ORM\ServerException $e){
            return new Response(json_encode($e), 200, array("Content-Type"=> "application/json"));
        }


        if($joueur){

        }



        //return $this->render('ajax/index.html.twig', ['liste' => $joueur->getPseudo()]);
        return new Response(json_encode($joueurs->getIdentiter()), 200, array("Content-Type"=> "application/json"));
    }
}
