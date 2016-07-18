<?php

namespace MIPP\CoexinBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use MIPP\CoexinBundle\Entity\Persona;
use MIPP\CoexinBundle\Form\PersonaType;
use MIPP\CoexinBundle\Entity\RegistroPais;
use MIPP\CoexinBundle\Form\RegistroPaisType;
use MIPP\CoexinBundle\Entity\Producto;
use MIPP\CoexinBundle\Form\ProductoType;
use MIPP\CoexinBundle\Entity\Material;
use MIPP\CoexinBundle\Form\MaterialType;
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
    public function dosAction(Request $request)
{   
        $persona= new Persona();
        
        $form = $this->createForm('MIPP\CoexinBundle\Form\PersonaType', $persona);
        $form->handleRequest($request);
        
          return $this->render('menu/2.html.twig', array(
            'form' => $form->createView(),
        ));
}



    /**
     * Load 3rd template via ajax
     *
     * @Route("/tres", name="tres")
     * @Method("GET")
     */
    public function tresAction(Request $request)
{
     $registropais= new RegistroPais();
        
        $form = $this->createForm('MIPP\CoexinBundle\Form\RegistroPaisType', $registropais);
        $form->handleRequest($request);
        
          return $this->render('menu/3.html.twig', array(
            'form' => $form->createView(),
        ));
    
}
 /**
     * Load 4th template via ajax
     *
     * @Route("/cuatro", name="cuatro")
     * @Method("GET")
     */
    public function cuatroAction(Request $request)
{
       $registropais= new RegistroPais();
       $producto= new Producto();
       $material= new Material();

       
       $form_pais = $this->createForm('MIPP\CoexinBundle\Form\RegistroPaisType', $registropais);
       $form_producto = $this->createForm('MIPP\CoexinBundle\Form\ProductoType', $producto);
       $form_material = $this->createForm('MIPP\CoexinBundle\Form\MaterialType', $material);
       //$form->handleRequest($request);
       //$form2->handleRequest($request);
        
        
          return $this->render('menu/4.html.twig', array(
            'form_pais' => $form_pais->createView(),
            'form_producto' => $form_producto->createView(),
            'form_material' => $form_material->createView(),
              
        ));
          
          
          
          
}

 /**
     * Load 5th template via ajax
     *
     * @Route("/cinco", name="cinco")
     * @Method("GET")
     */
    public function cincoAction(Request $request)
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
    public function seisAction(Request $request)
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
    public function sieteAction(Request $request)
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
    public function ochoAction(Request $request)
{
    $template = $this->renderView('menu/8.html.twig');
    return new Response($template);
}

}
