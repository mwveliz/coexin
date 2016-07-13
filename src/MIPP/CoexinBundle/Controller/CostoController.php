<?php

namespace MIPP\CoexinBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use MIPP\CoexinBundle\Entity\Costo;
use MIPP\CoexinBundle\Form\CostoType;

/**
 * Costo controller.
 *
 * @Route("/costo")
 */
class CostoController extends Controller
{
    /**
     * Lists all Costo entities.
     *
     * @Route("/", name="costo_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $costos = $em->getRepository('CoexinBundle:Costo')->findAll();

        return $this->render('costo/index.html.twig', array(
            'costos' => $costos,
        ));
    }

    /**
     * Creates a new Costo entity.
     *
     * @Route("/new", name="costo_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $costo = new Costo();
        $form = $this->createForm('MIPP\CoexinBundle\Form\CostoType', $costo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($costo);
            $em->flush();

            return $this->redirectToRoute('costo_show', array('id' => $costo->getId()));
        }

        return $this->render('costo/new.html.twig', array(
            'costo' => $costo,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Costo entity.
     *
     * @Route("/{id}", name="costo_show")
     * @Method("GET")
     */
    public function showAction(Costo $costo)
    {
        $deleteForm = $this->createDeleteForm($costo);

        return $this->render('costo/show.html.twig', array(
            'costo' => $costo,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Costo entity.
     *
     * @Route("/{id}/edit", name="costo_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Costo $costo)
    {
        $deleteForm = $this->createDeleteForm($costo);
        $editForm = $this->createForm('MIPP\CoexinBundle\Form\CostoType', $costo);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($costo);
            $em->flush();

            return $this->redirectToRoute('costo_edit', array('id' => $costo->getId()));
        }

        return $this->render('costo/edit.html.twig', array(
            'costo' => $costo,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Costo entity.
     *
     * @Route("/{id}", name="costo_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Costo $costo)
    {
        $form = $this->createDeleteForm($costo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($costo);
            $em->flush();
        }

        return $this->redirectToRoute('costo_index');
    }

    /**
     * Creates a form to delete a Costo entity.
     *
     * @param Costo $costo The Costo entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Costo $costo)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('costo_delete', array('id' => $costo->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
