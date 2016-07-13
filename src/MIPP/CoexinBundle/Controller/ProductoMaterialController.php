<?php

namespace MIPP\CoexinBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use MIPP\CoexinBundle\Entity\ProductoMaterial;
use MIPP\CoexinBundle\Form\ProductoMaterialType;

/**
 * ProductoMaterial controller.
 *
 * @Route("/productomaterial")
 */
class ProductoMaterialController extends Controller
{
    /**
     * Lists all ProductoMaterial entities.
     *
     * @Route("/", name="productomaterial_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $productoMaterials = $em->getRepository('CoexinBundle:ProductoMaterial')->findAll();

        return $this->render('productomaterial/index.html.twig', array(
            'productoMaterials' => $productoMaterials,
        ));
    }

    /**
     * Creates a new ProductoMaterial entity.
     *
     * @Route("/new", name="productomaterial_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $productoMaterial = new ProductoMaterial();
        $form = $this->createForm('MIPP\CoexinBundle\Form\ProductoMaterialType', $productoMaterial);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($productoMaterial);
            $em->flush();

            return $this->redirectToRoute('productomaterial_show', array('id' => $productoMaterial->getId()));
        }

        return $this->render('productomaterial/new.html.twig', array(
            'productoMaterial' => $productoMaterial,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a ProductoMaterial entity.
     *
     * @Route("/{id}", name="productomaterial_show")
     * @Method("GET")
     */
    public function showAction(ProductoMaterial $productoMaterial)
    {
        $deleteForm = $this->createDeleteForm($productoMaterial);

        return $this->render('productomaterial/show.html.twig', array(
            'productoMaterial' => $productoMaterial,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing ProductoMaterial entity.
     *
     * @Route("/{id}/edit", name="productomaterial_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, ProductoMaterial $productoMaterial)
    {
        $deleteForm = $this->createDeleteForm($productoMaterial);
        $editForm = $this->createForm('MIPP\CoexinBundle\Form\ProductoMaterialType', $productoMaterial);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($productoMaterial);
            $em->flush();

            return $this->redirectToRoute('productomaterial_edit', array('id' => $productoMaterial->getId()));
        }

        return $this->render('productomaterial/edit.html.twig', array(
            'productoMaterial' => $productoMaterial,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a ProductoMaterial entity.
     *
     * @Route("/{id}", name="productomaterial_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, ProductoMaterial $productoMaterial)
    {
        $form = $this->createDeleteForm($productoMaterial);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($productoMaterial);
            $em->flush();
        }

        return $this->redirectToRoute('productomaterial_index');
    }

    /**
     * Creates a form to delete a ProductoMaterial entity.
     *
     * @param ProductoMaterial $productoMaterial The ProductoMaterial entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(ProductoMaterial $productoMaterial)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('productomaterial_delete', array('id' => $productoMaterial->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
