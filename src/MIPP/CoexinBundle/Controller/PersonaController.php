<?php

namespace MIPP\CoexinBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use MIPP\CoexinBundle\Entity\Persona;
use MIPP\CoexinBundle\Form\PersonaType;
use MIPP\CoexinBundle\Utility;

/**
 * Persona controller.
 *
 * @Route("/persona")
 */
class PersonaController extends Controller
{
    /**
     * Lists all Persona entities.
     *
     * @Route("/", name="persona_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $personas = $em->getRepository('CoexinBundle:Persona')->findAll();

        return $this->render('persona/index.html.twig', array(
            'personas' => $personas,
        ));
    }

    /**
     * Creates a new Persona entity.
     *
     * @Route("/new", name="persona_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $persona = new Persona();
        $form = $this->createForm('MIPP\CoexinBundle\Form\PersonaType', $persona);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($persona);
            $em->flush();

            return $this->redirectToRoute('persona_show', array('id' => $persona->getId()));
        }

        return $this->render('persona/new.html.twig', array(
            'persona' => $persona,
            'form' => $form->createView(),
        ));
    }
/**
     * Creates via ajax a new Persona entity.
     *
     * @Route("/nueva", name="nueva_persona")
     * @Method({"GET", "POST"})
     */
    public function nuevapersonaAction(Request $request)
    {
        
        $persona= new Persona();
        $persona->setCedula($request->get('persona_ci'));
        $persona->setUsername($request->get('persona_ci'));
        $persona->setPassword($request->get('persona_ci'));
        $persona->setCargo($request->get('persona_cargo'));
        $persona->setCodArea($request->get('persona_zipcode'));
        $persona->setEmail($request->get('persona_email'));
        $persona->setFax($request->get('persona_fax'));
        $persona->setTelf1($request->get('persona_tlfs'));
        $persona->setNacCedula($request->get('persona_nombre'));
        $role = "ROLE_USER";
        $persona->setRoles(array(serialize($role)));


        
            $em = $this->getDoctrine()->getManager();
            $em->persist($persona);
            $em->flush();
            
        
        return new Response('Ok');
    }
/**
 * Buscar persona CNE via ajax
 *  * @Route("/buscarpersona", name="buscar_persona")
     * @Method({"GET", "POST"})
 */    
    public function buscarpersonaAction(Request $request)
    {
    $result='No se encontro la cédula, verifique';
    $cedula=$request->get('cedula');
    $cne = Utility::getNombreCne($cedula);
    
                if(strlen($cne)>0){
                $result= strip_tags( html_entity_decode($cne, ENT_QUOTES, 'UTF-8'));
                }
      return new Response($result);
    }
    
    /**
     * Finds and displays a Persona entity.
     *
     * @Route("/{id}", name="persona_show")
     * @Method("GET")
     */
    public function showAction(Persona $persona)
    {
        $deleteForm = $this->createDeleteForm($persona);

        return $this->render('persona/show.html.twig', array(
            'persona' => $persona,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Persona entity.
     *
     * @Route("/{id}/edit", name="persona_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Persona $persona)
    {
        $deleteForm = $this->createDeleteForm($persona);
        $editForm = $this->createForm('MIPP\CoexinBundle\Form\PersonaType', $persona);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($persona);
            $em->flush();

            return $this->redirectToRoute('persona_edit', array('id' => $persona->getId()));
        }

        return $this->render('persona/edit.html.twig', array(
            'persona' => $persona,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Persona entity.
     *
     * @Route("/{id}", name="persona_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Persona $persona)
    {
        $form = $this->createDeleteForm($persona);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($persona);
            $em->flush();
        }

        return $this->redirectToRoute('persona_index');
    }

    /**
     * Creates a form to delete a Persona entity.
     *
     * @param Persona $persona The Persona entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Persona $persona)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('persona_delete', array('id' => $persona->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
