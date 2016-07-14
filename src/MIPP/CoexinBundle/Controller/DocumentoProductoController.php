<?php

namespace MIPP\CoexinBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use MIPP\CoexinBundle\Entity\DocumentoProducto;
use MIPP\CoexinBundle\Form\DocumentoProductoType;

/**
 * DocumentoProducto controller.
 *
 * @Route("/documentoproducto")
 */
class DocumentoProductoController extends Controller
{
    /**
     * Lists all DocumentoProducto entities.
     *
     * @Route("/", name="documentoproducto_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $documentoProductos = $em->getRepository('CoexinBundle:DocumentoProducto')->findAll();

        return $this->render('documentoproducto/index.html.twig', array(
            'documentoProductos' => $documentoProductos,
        ));
    }

    /**
     * Creates a new DocumentoProducto entity.
     *
     * @Route("/new", name="documentoproducto_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $documentoProducto = new DocumentoProducto();
        $form = $this->createForm('MIPP\CoexinBundle\Form\DocumentoProductoType', $documentoProducto);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($documentoProducto);
            $em->flush();

            return $this->redirectToRoute('documentoproducto_show', array('id' => $documentoProducto->getId()));
        }

        return $this->render('documentoproducto/new.html.twig', array(
            'documentoProducto' => $documentoProducto,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a DocumentoProducto entity.
     *
     * @Route("/{id}", name="documentoproducto_show")
     * @Method("GET")
     */
    public function showAction(DocumentoProducto $documentoProducto)
    {
        $deleteForm = $this->createDeleteForm($documentoProducto);

        return $this->render('documentoproducto/show.html.twig', array(
            'documentoProducto' => $documentoProducto,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing DocumentoProducto entity.
     *
     * @Route("/{id}/edit", name="documentoproducto_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, DocumentoProducto $documentoProducto)
    {
        $deleteForm = $this->createDeleteForm($documentoProducto);
        $editForm = $this->createForm('MIPP\CoexinBundle\Form\DocumentoProductoType', $documentoProducto);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($documentoProducto);
            $em->flush();

            return $this->redirectToRoute('documentoproducto_edit', array('id' => $documentoProducto->getId()));
        }

        return $this->render('documentoproducto/edit.html.twig', array(
            'documentoProducto' => $documentoProducto,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a DocumentoProducto entity.
     *
     * @Route("/{id}", name="documentoproducto_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, DocumentoProducto $documentoProducto)
    {
        $form = $this->createDeleteForm($documentoProducto);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($documentoProducto);
            $em->flush();
        }

        return $this->redirectToRoute('documentoproducto_index');
    }

    /**
     * Creates a form to delete a DocumentoProducto entity.
     *
     * @param DocumentoProducto $documentoProducto The DocumentoProducto entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(DocumentoProducto $documentoProducto)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('documentoproducto_delete', array('id' => $documentoProducto->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
