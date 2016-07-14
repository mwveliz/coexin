<?php

namespace MIPP\CoexinBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use MIPP\CoexinBundle\Entity\RegistroPais;
use MIPP\CoexinBundle\Form\RegistroPaisType;

/**
 * RegistroPais controller.
 *
 * @Route("/registropais")
 */
class RegistroPaisController extends Controller
{
    /**
     * Lists all RegistroPais entities.
     *
     * @Route("/", name="registropais_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $registroPais = $em->getRepository('CoexinBundle:RegistroPais')->findAll();

        return $this->render('registropais/index.html.twig', array(
            'registroPais' => $registroPais,
        ));
    }

    /**
     * Creates a new RegistroPais entity.
     *
     * @Route("/new", name="registropais_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $registroPai = new RegistroPais();
        $form = $this->createForm('MIPP\CoexinBundle\Form\RegistroPaisType', $registroPai);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($registroPai);
            $em->flush();

            return $this->redirectToRoute('registropais_show', array('id' => $registroPai->getId()));
        }

        return $this->render('registropais/new.html.twig', array(
            'registroPai' => $registroPai,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a RegistroPais entity.
     *
     * @Route("/{id}", name="registropais_show")
     * @Method("GET")
     */
    public function showAction(RegistroPais $registroPai)
    {
        $deleteForm = $this->createDeleteForm($registroPai);

        return $this->render('registropais/show.html.twig', array(
            'registroPai' => $registroPai,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing RegistroPais entity.
     *
     * @Route("/{id}/edit", name="registropais_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, RegistroPais $registroPai)
    {
        $deleteForm = $this->createDeleteForm($registroPai);
        $editForm = $this->createForm('MIPP\CoexinBundle\Form\RegistroPaisType', $registroPai);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($registroPai);
            $em->flush();

            return $this->redirectToRoute('registropais_edit', array('id' => $registroPai->getId()));
        }

        return $this->render('registropais/edit.html.twig', array(
            'registroPai' => $registroPai,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a RegistroPais entity.
     *
     * @Route("/{id}", name="registropais_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, RegistroPais $registroPai)
    {
        $form = $this->createDeleteForm($registroPai);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($registroPai);
            $em->flush();
        }

        return $this->redirectToRoute('registropais_index');
    }

    /**
     * Creates a form to delete a RegistroPais entity.
     *
     * @param RegistroPais $registroPai The RegistroPais entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(RegistroPais $registroPai)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('registropais_delete', array('id' => $registroPai->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
