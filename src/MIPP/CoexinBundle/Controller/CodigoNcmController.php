<?php

namespace MIPP\CoexinBundle\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;


use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use MIPP\CoexinBundle\Entity\CodigoNcm;
use MIPP\CoexinBundle\Form\CodigoNcmType;

/**
 * CodigoNcm controller.
 *
 * @Route("/codigoncm")
 */
class CodigoNcmController extends Controller
{
    /**
     * Lists all CodigoNcm entities.
     *
     * @Route("/", name="codigoncm_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $codigoNcms = $em->getRepository('CoexinBundle:CodigoNcm')->findAll();

        return $this->render('codigoncm/index.html.twig', array(
            'codigoNcms' => $codigoNcms,
        ));
    }

    /**
     * Creates a new CodigoNcm entity.
     *
     * @Route("/new", name="codigoncm_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $codigoNcm = new CodigoNcm();
        $form = $this->createForm('MIPP\CoexinBundle\Form\CodigoNcmType', $codigoNcm);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($codigoNcm);
            $em->flush();

            return $this->redirectToRoute('codigoncm_show', array('id' => $codigoNcm->getId()));
        }

        return $this->render('codigoncm/new.html.twig', array(
            'codigoNcm' => $codigoNcm,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a CodigoNcm entity.
     *
     * @Route("/{id}", name="codigoncm_show")
     * @Method("GET")
     */
    public function showAction(CodigoNcm $codigoNcm)
    {
        $deleteForm = $this->createDeleteForm($codigoNcm);

        return $this->render('codigoncm/show.html.twig', array(
            'codigoNcm' => $codigoNcm,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing CodigoNcm entity.
     *
     * @Route("/{id}/edit", name="codigoncm_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, CodigoNcm $codigoNcm)
    {
        $deleteForm = $this->createDeleteForm($codigoNcm);
        $editForm = $this->createForm('MIPP\CoexinBundle\Form\CodigoNcmType', $codigoNcm);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($codigoNcm);
            $em->flush();

            return $this->redirectToRoute('codigoncm_edit', array('id' => $codigoNcm->getId()));
        }

        return $this->render('codigoncm/edit.html.twig', array(
            'codigoNcm' => $codigoNcm,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a CodigoNcm entity.
     *
     * @Route("/{id}", name="codigoncm_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, CodigoNcm $codigoNcm)
    {
        $form = $this->createDeleteForm($codigoNcm);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($codigoNcm);
            $em->flush();
        }

        return $this->redirectToRoute('codigoncm_index');
    }

    /**
     * Creates a form to delete a CodigoNcm entity.
     *
     * @param CodigoNcm $codigoNcm The CodigoNcm entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(CodigoNcm $codigoNcm)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('codigoncm_delete', array('id' => $codigoNcm->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
    
    /**
     * Search autocomplete a CodigoNCM entity.
     *
     * @Route("/ajax/autocompletar", name="codigoncmautocompletar")
     * @Method({"GET", "POST"})
     */   
    public function codigoncmautocompletarAction(Request $request)
    {
    $em = $this->getDoctrine()->getManager();

    $cods= $em->getRepository('CoexinBundle:CodigoNcm')->findAll();
    $objeto=array();
    $arreglo=array();

    foreach($cods as $cod){
        $indice=(string) $cod->getId();
        $objeto['id']=(string) $cod->getId();
        $objeto['value']= $cod->getDescripcion();
        array_push($arreglo, $objeto);
    }

    return new JsonResponse($arreglo);
    }
    
}
