<?php

namespace MIPP\CoexinBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use MIPP\CoexinBundle\Entity\DescripcionArancelaria;
use MIPP\CoexinBundle\Form\DescripcionArancelariaType;

/**
 * DescripcionArancelaria controller.
 *
 * @Route("/descripcionarancelaria")
 */
class DescripcionArancelariaController extends Controller
{
    /**
     * Lists all DescripcionArancelaria entities.
     *
     * @Route("/", name="descripcionarancelaria_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $descripcionArancelarias = $em->getRepository('CoexinBundle:DescripcionArancelaria')->findAll();

        return $this->render('descripcionarancelaria/index.html.twig', array(
            'descripcionArancelarias' => $descripcionArancelarias,
        ));
    }

    /**
     * Creates a new DescripcionArancelaria entity.
     *
     * @Route("/new", name="descripcionarancelaria_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $descripcionArancelarium = new DescripcionArancelaria();
        $form = $this->createForm('MIPP\CoexinBundle\Form\DescripcionArancelariaType', $descripcionArancelarium);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($descripcionArancelarium);
            $em->flush();

            return $this->redirectToRoute('descripcionarancelaria_show', array('id' => $descripcionArancelarium->getId()));
        }

        return $this->render('descripcionarancelaria/new.html.twig', array(
            'descripcionArancelarium' => $descripcionArancelarium,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a DescripcionArancelaria entity.
     *
     * @Route("/{id}", name="descripcionarancelaria_show")
     * @Method("GET")
     */
    public function showAction(DescripcionArancelaria $descripcionArancelarium)
    {
        $deleteForm = $this->createDeleteForm($descripcionArancelarium);

        return $this->render('descripcionarancelaria/show.html.twig', array(
            'descripcionArancelarium' => $descripcionArancelarium,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing DescripcionArancelaria entity.
     *
     * @Route("/{id}/edit", name="descripcionarancelaria_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, DescripcionArancelaria $descripcionArancelarium)
    {
        $deleteForm = $this->createDeleteForm($descripcionArancelarium);
        $editForm = $this->createForm('MIPP\CoexinBundle\Form\DescripcionArancelariaType', $descripcionArancelarium);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($descripcionArancelarium);
            $em->flush();

            return $this->redirectToRoute('descripcionarancelaria_edit', array('id' => $descripcionArancelarium->getId()));
        }

        return $this->render('descripcionarancelaria/edit.html.twig', array(
            'descripcionArancelarium' => $descripcionArancelarium,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a DescripcionArancelaria entity.
     *
     * @Route("/{id}", name="descripcionarancelaria_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, DescripcionArancelaria $descripcionArancelarium)
    {
        $form = $this->createDeleteForm($descripcionArancelarium);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($descripcionArancelarium);
            $em->flush();
        }

        return $this->redirectToRoute('descripcionarancelaria_index');
    }

    /**
     * Creates a form to delete a DescripcionArancelaria entity.
     *
     * @param DescripcionArancelaria $descripcionArancelarium The DescripcionArancelaria entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(DescripcionArancelaria $descripcionArancelarium)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('descripcionarancelaria_delete', array('id' => $descripcionArancelarium->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
