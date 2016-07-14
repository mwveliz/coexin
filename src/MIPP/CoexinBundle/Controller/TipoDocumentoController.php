<?php

namespace MIPP\CoexinBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use MIPP\CoexinBundle\Entity\TipoDocumento;
use MIPP\CoexinBundle\Form\TipoDocumentoType;

/**
 * TipoDocumento controller.
 *
 * @Route("/tipodocumento")
 */
class TipoDocumentoController extends Controller
{
    /**
     * Lists all TipoDocumento entities.
     *
     * @Route("/", name="tipodocumento_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $tipoDocumentos = $em->getRepository('CoexinBundle:TipoDocumento')->findAll();

        return $this->render('tipodocumento/index.html.twig', array(
            'tipoDocumentos' => $tipoDocumentos,
        ));
    }

    /**
     * Creates a new TipoDocumento entity.
     *
     * @Route("/new", name="tipodocumento_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $tipoDocumento = new TipoDocumento();
        $form = $this->createForm('MIPP\CoexinBundle\Form\TipoDocumentoType', $tipoDocumento);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($tipoDocumento);
            $em->flush();

            return $this->redirectToRoute('tipodocumento_show', array('id' => $tipoDocumento->getId()));
        }

        return $this->render('tipodocumento/new.html.twig', array(
            'tipoDocumento' => $tipoDocumento,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a TipoDocumento entity.
     *
     * @Route("/{id}", name="tipodocumento_show")
     * @Method("GET")
     */
    public function showAction(TipoDocumento $tipoDocumento)
    {
        $deleteForm = $this->createDeleteForm($tipoDocumento);

        return $this->render('tipodocumento/show.html.twig', array(
            'tipoDocumento' => $tipoDocumento,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing TipoDocumento entity.
     *
     * @Route("/{id}/edit", name="tipodocumento_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, TipoDocumento $tipoDocumento)
    {
        $deleteForm = $this->createDeleteForm($tipoDocumento);
        $editForm = $this->createForm('MIPP\CoexinBundle\Form\TipoDocumentoType', $tipoDocumento);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($tipoDocumento);
            $em->flush();

            return $this->redirectToRoute('tipodocumento_edit', array('id' => $tipoDocumento->getId()));
        }

        return $this->render('tipodocumento/edit.html.twig', array(
            'tipoDocumento' => $tipoDocumento,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a TipoDocumento entity.
     *
     * @Route("/{id}", name="tipodocumento_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, TipoDocumento $tipoDocumento)
    {
        $form = $this->createDeleteForm($tipoDocumento);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($tipoDocumento);
            $em->flush();
        }

        return $this->redirectToRoute('tipodocumento_index');
    }

    /**
     * Creates a form to delete a TipoDocumento entity.
     *
     * @param TipoDocumento $tipoDocumento The TipoDocumento entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(TipoDocumento $tipoDocumento)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('tipodocumento_delete', array('id' => $tipoDocumento->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
