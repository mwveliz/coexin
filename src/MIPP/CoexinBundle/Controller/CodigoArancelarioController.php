<?php

namespace MIPP\CoexinBundle\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use MIPP\CoexinBundle\Entity\CodigoArancelario;
use MIPP\CoexinBundle\Form\CodigoArancelarioType;

/**
 * CodigoArancelario controller.
 *
 * @Route("/codigoarancelario")
 */
class CodigoArancelarioController extends Controller
{
    /**
     * Lists all CodigoArancelario entities.
     *
     * @Route("/", name="codigoarancelario_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $codigoArancelarios = $em->getRepository('CoexinBundle:CodigoArancelario')->findAll();

        return $this->render('codigoarancelario/index.html.twig', array(
            'codigoArancelarios' => $codigoArancelarios,
        ));
    }

    /**
     * Creates a new CodigoArancelario entity.
     *
     * @Route("/new", name="codigoarancelario_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $codigoArancelario = new CodigoArancelario();
        $form = $this->createForm('MIPP\CoexinBundle\Form\CodigoArancelarioType', $codigoArancelario);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($codigoArancelario);
            $em->flush();

            return $this->redirectToRoute('codigoarancelario_show', array('id' => $codigoArancelario->getId()));
        }

        return $this->render('codigoarancelario/new.html.twig', array(
            'codigoArancelario' => $codigoArancelario,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a CodigoArancelario entity.
     *
     * @Route("/{id}", name="codigoarancelario_show")
     * @Method("GET")
     */
    public function showAction(CodigoArancelario $codigoArancelario)
    {
        $deleteForm = $this->createDeleteForm($codigoArancelario);

        return $this->render('codigoarancelario/show.html.twig', array(
            'codigoArancelario' => $codigoArancelario,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing CodigoArancelario entity.
     *
     * @Route("/{id}/edit", name="codigoarancelario_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, CodigoArancelario $codigoArancelario)
    {
        $deleteForm = $this->createDeleteForm($codigoArancelario);
        $editForm = $this->createForm('MIPP\CoexinBundle\Form\CodigoArancelarioType', $codigoArancelario);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($codigoArancelario);
            $em->flush();

            return $this->redirectToRoute('codigoarancelario_edit', array('id' => $codigoArancelario->getId()));
        }

        return $this->render('codigoarancelario/edit.html.twig', array(
            'codigoArancelario' => $codigoArancelario,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a CodigoArancelario entity.
     *
     * @Route("/{id}", name="codigoarancelario_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, CodigoArancelario $codigoArancelario)
    {
        $form = $this->createDeleteForm($codigoArancelario);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($codigoArancelario);
            $em->flush();
        }

        return $this->redirectToRoute('codigoarancelario_index');
    }

    /**
     * Creates a form to delete a CodigoArancelario entity.
     *
     * @param CodigoArancelario $codigoArancelario The CodigoArancelario entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(CodigoArancelario $codigoArancelario)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('codigoarancelario_delete', array('id' => $codigoArancelario->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
    
    
    /**
     * Search autocomplete a CodigoNCM entity.
     *
     * @Route("/ajax/autocompletar", name="codigoarancelarioautocompletar")
     * @Method({"GET", "POST"})
     */   
    public function codigoarancelarioautocompletarAction(Request $request)
    {
    $em = $this->getDoctrine()->getManager();

    $cods= $em->getRepository('CoexinBundle:CodigoArancelario')->findAll();
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
