<?php

namespace MacroBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;


class NutrimentsController extends Controller
{
    public function indexAction(Request $request)
    {
        return $this->render('default/index.html.twig');
    }

    public function nutrimentsAction()
    {
        return $this->render('MacroBundle:nutriments:nutriments.html.twig');
    }
    
}
