<?php

namespace MIPP\CoexinBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use MIPP\CoexinBundle\Entity\ProductoEmpresa;
use MIPP\CoexinBundle\Form\ProductoEmpresaType;

/**
 * ProductoEmpresa controller.
 *
 * @Route("/productoempresa")
 */
class ProductoEmpresaController extends Controller
{
    /**
     * Lists all ProductoEmpresa entities.
     *
     * @Route("/", name="productoempresa_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $productoEmpresas = $em->getRepository('CoexinBundle:ProductoEmpresa')->findAll();

        return $this->render('productoempresa/index.html.twig', array(
            'productoEmpresas' => $productoEmpresas,
        ));
    }

    /**
     * Creates a new ProductoEmpresa entity.
     *
     * @Route("/new", name="productoempresa_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $productoEmpresa = new ProductoEmpresa();
        $form = $this->createForm('MIPP\CoexinBundle\Form\ProductoEmpresaType', $productoEmpresa);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($productoEmpresa);
            $em->flush();

            return $this->redirectToRoute('productoempresa_show', array('id' => $productoEmpresa->getId()));
        }

        return $this->render('productoempresa/new.html.twig', array(
            'productoEmpresa' => $productoEmpresa,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a ProductoEmpresa entity.
     *
     * @Route("/{id}", name="productoempresa_show")
     * @Method("GET")
     */
    public function showAction(ProductoEmpresa $productoEmpresa)
    {
        $deleteForm = $this->createDeleteForm($productoEmpresa);

        return $this->render('productoempresa/show.html.twig', array(
            'productoEmpresa' => $productoEmpresa,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing ProductoEmpresa entity.
     *
     * @Route("/{id}/edit", name="productoempresa_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, ProductoEmpresa $productoEmpresa)
    {
        $deleteForm = $this->createDeleteForm($productoEmpresa);
        $editForm = $this->createForm('MIPP\CoexinBundle\Form\ProductoEmpresaType', $productoEmpresa);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($productoEmpresa);
            $em->flush();

            return $this->redirectToRoute('productoempresa_edit', array('id' => $productoEmpresa->getId()));
        }

        return $this->render('productoempresa/edit.html.twig', array(
            'productoEmpresa' => $productoEmpresa,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a ProductoEmpresa entity.
     *
     * @Route("/{id}", name="productoempresa_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, ProductoEmpresa $productoEmpresa)
    {
        $form = $this->createDeleteForm($productoEmpresa);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($productoEmpresa);
            $em->flush();
        }

        return $this->redirectToRoute('productoempresa_index');
    }

    /**
     * Creates a form to delete a ProductoEmpresa entity.
     *
     * @param ProductoEmpresa $productoEmpresa The ProductoEmpresa entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(ProductoEmpresa $productoEmpresa)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('productoempresa_delete', array('id' => $productoEmpresa->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
