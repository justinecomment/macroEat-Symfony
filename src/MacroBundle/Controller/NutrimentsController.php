<?php

namespace MacroBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use MacroBundle\Entity\categorie;
use MacroBundle\Entity\Profil;
use MacroBundle\Form\ProfilType;


class NutrimentsController extends Controller
{
    public function indexAction(Request $request)
    {
        return $this->render('default/index.html.twig');
    }

    public function nutrimentsAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $categories = $em->getRepository('MacroBundle:categorie')->findAll();

        $nomImage = null;
      
        return $this->render('MacroBundle:nutriments:nutriments.html.twig', array(
            'categories' => $categories,
            'nomImage'   => $nomImage
        ));
    }

    public function calculatriceAction(Request $request)
    {
        $profil = new Profil();
        $form = $this->createForm(ProfilType::class, $profil)->handleRequest($request);
        
        $calories       = null;
        $poidPerdre     = '_ _';
        $poidStabiliser = '_ _';
        $poidPrendre    = '_ _';

        if ($form->isSubmitted() && $form->isValid() ) {
            dump($profil);

            if($profil->getSexe() == "homme"){
                $poid = 13.7516 * $profil->getPoid();
                $taille = 500.33 * $profil->getMensuration();
                $age = 6.7550 * $profil->getAge();
                
                $base =  floor($poid + $taille - $age + 66.473);

                switch ($profil->getActivite()) {
                    case "Peu actif":
                        $calories = floor($base * 1.37);
                        break;
                    case "Moyennement actif":
                        $calories = floor($base * 1.55);
                        break;
                    case "Très actif":
                        $calories = floor($base * 1.80);
                        break;
                }

                $poidPerdre = $calories - 200;
                $poidStabiliser = $calories;
                $poidPrendre = $calories + 200;
            };

            if($profil->getSexe() == "femme"){
                $poid = 9.5634 * $profil->getPoid();
                $taille = 184.96 * $profil->getMensuration();
                $age = 4.6756 * $profil->getAge();
                
                $base =  floor($poid + $taille - $age + 655.0955);

                switch ($profil->getActivite()) {
                    case "Peu actif":
                        $calories = floor($base * 1.37);
                        break;
                    case "Moyennement actif":
                        $calories = floor($base * 1.55);
                        break;
                    case "Très actif":
                        $calories = floor($base * 1.80);
                        break;
                };

                $poidPerdre = $calories - 200;
                $poidStabiliser = $calories;
                $poidPrendre = $calories + 200;
            };

            return $this->render('MacroBundle:calculatrice:index.html.twig', array(
                'form' => $form->createView(),
                'poidPerdre' => $poidPerdre,
                'poidStabiliser' => $poidStabiliser,
                'poidPrendre' => $poidPrendre,
            ));
        };

        return $this->render('MacroBundle:calculatrice:index.html.twig', array(
            'form'     => $form->createView(),
            'poidPerdre' => $poidPerdre,
            'poidStabiliser' => $poidStabiliser,
            'poidPrendre' => $poidPrendre,
));

    }
    
}
