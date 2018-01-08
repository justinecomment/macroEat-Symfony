<?php

namespace MacroBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use MacroBundle\Entity\categorie;


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

    public function calculatriceAction()
    {
        return $this->render('MacroBundle:calculatrice:index.html.twig', array());
    }
    
}
