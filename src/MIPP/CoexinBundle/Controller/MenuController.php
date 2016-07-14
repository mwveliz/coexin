<?php

namespace MIPP\CoexinBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use MIPP\CoexinBundle\Entity\Moneda;
use MIPP\CoexinBundle\Form\MonedaType;

/**
 * Menu controller.
 *
 * @Route("/menu")
 */
class MenuController extends Controller
{
    /**
     * Load 1st template
     *
     * @Route("/one", name="one")
     * @Method("GET")
     */
    public function oneAction()
    {
        
        return $this->render('menu/one.html.twig', array(
            //'monedas' => $monedas,
        ));
    }
    
    
    /**
     * Load 1st template via ajax
     *
     * @Route("/uno", name="uno")
     * @Method("GET")
     */
    public function unoAction()
{
    $template = $this->renderView('menu/1.html.twig');
    return new Response($template);
}
    


    
    
    /**
     * Load 2nd template via ajax
     *
     * @Route("/dos", name="dos")
     * @Method("GET")
     */
    public function dosAction()
{
    $template = $this->renderView('menu/2.html.twig');
    return new Response($template);
}



    /**
     * Load 3rd template via ajax
     *
     * @Route("/tres", name="tres")
     * @Method("GET")
     */
    public function tresAction()
{
    $template = $this->renderView('menu/3.html.twig');
    return new Response($template);
}
    
   
 /**
     * Load 4th template via ajax
     *
     * @Route("/cuatro", name="cuatro")
     * @Method("GET")
     */
    public function cuatroAction()
{
    $template = $this->renderView('menu/4.html.twig');
    return new Response($template);
}

 /**
     * Load 5th template via ajax
     *
     * @Route("/cinco", name="cinco")
     * @Method("GET")
     */
    public function cincoAction()
{
    $template = $this->renderView('menu/5.html.twig');
    return new Response($template);
}

 /**
     * Load 6th template via ajax
     *
     * @Route("/seis", name="seis")
     * @Method("GET")
     */
    public function seisAction()
{
    $template = $this->renderView('menu/6.html.twig');
    return new Response($template);
}
 /**
     * Load 7th template via ajax
     *
     * @Route("/siete", name="siete")
     * @Method("GET")
     */
    public function sieteAction()
{
    $template = $this->renderView('menu/7.html.twig');
    return new Response($template);
}

/**
     * Load 8th template via ajax
     *
     * @Route("/ocho", name="ocho")
     * @Method("GET")
     */
    public function ochoAction()
{
    $template = $this->renderView('menu/8.html.twig');
    return new Response($template);
}

}
