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
        $caloriesMin = '_ _';
        $caloriesMax = '_ _';

        if ($form->isSubmitted() && $form->isValid() ) {
            dump($profil);
            // Calculer calories en fonction du resultat

            return $this->render('MacroBundle:calculatrice:index.html.twig', array(
                'form' => $form->createView(),
                'caloriesMin' => $caloriesMin,
                'caloriesMax' => $caloriesMax
            ));
        };

        return $this->render('MacroBundle:calculatrice:index.html.twig', array(
            'form'     => $form->createView(),
            'caloriesMin' => $caloriesMin,
            'caloriesMax' => $caloriesMax
    ));

    }
    
}
