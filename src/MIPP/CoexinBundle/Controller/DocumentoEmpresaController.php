<?php

namespace MIPP\CoexinBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use MIPP\CoexinBundle\Entity\DocumentoEmpresa;
use MIPP\CoexinBundle\Form\DocumentoEmpresaType;

/**
 * DocumentoEmpresa controller.
 *
 * @Route("/documentoempresa")
 */
class DocumentoEmpresaController extends Controller
{
    /**
     * Lists all DocumentoEmpresa entities.
     *
     * @Route("/", name="documentoempresa_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $documentoEmpresas = $em->getRepository('CoexinBundle:DocumentoEmpresa')->findAll();

        return $this->render('documentoempresa/index.html.twig', array(
            'documentoEmpresas' => $documentoEmpresas,
        ));
    }

    /**
     * Creates a new DocumentoEmpresa entity.
     *
     * @Route("/new", name="documentoempresa_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $documentoEmpresa = new DocumentoEmpresa();
        $form = $this->createForm('MIPP\CoexinBundle\Form\DocumentoEmpresaType', $documentoEmpresa);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($documentoEmpresa);
            $em->flush();

            return $this->redirectToRoute('documentoempresa_show', array('id' => $documentoEmpresa->getId()));
        }

        return $this->render('documentoempresa/new.html.twig', array(
            'documentoEmpresa' => $documentoEmpresa,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a DocumentoEmpresa entity.
     *
     * @Route("/{id}", name="documentoempresa_show")
     * @Method("GET")
     */
    public function showAction(DocumentoEmpresa $documentoEmpresa)
    {
        $deleteForm = $this->createDeleteForm($documentoEmpresa);

        return $this->render('documentoempresa/show.html.twig', array(
            'documentoEmpresa' => $documentoEmpresa,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing DocumentoEmpresa entity.
     *
     * @Route("/{id}/edit", name="documentoempresa_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, DocumentoEmpresa $documentoEmpresa)
    {
        $deleteForm = $this->createDeleteForm($documentoEmpresa);
        $editForm = $this->createForm('MIPP\CoexinBundle\Form\DocumentoEmpresaType', $documentoEmpresa);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($documentoEmpresa);
            $em->flush();

            return $this->redirectToRoute('documentoempresa_edit', array('id' => $documentoEmpresa->getId()));
        }

        return $this->render('documentoempresa/edit.html.twig', array(
            'documentoEmpresa' => $documentoEmpresa,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a DocumentoEmpresa entity.
     *
     * @Route("/{id}", name="documentoempresa_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, DocumentoEmpresa $documentoEmpresa)
    {
        $form = $this->createDeleteForm($documentoEmpresa);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($documentoEmpresa);
            $em->flush();
        }

        return $this->redirectToRoute('documentoempresa_index');
    }

    /**
     * Creates a form to delete a DocumentoEmpresa entity.
     *
     * @param DocumentoEmpresa $documentoEmpresa The DocumentoEmpresa entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(DocumentoEmpresa $documentoEmpresa)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('documentoempresa_delete', array('id' => $documentoEmpresa->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
