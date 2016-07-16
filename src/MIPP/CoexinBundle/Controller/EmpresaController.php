<?php

namespace MIPP\CoexinBundle\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use MIPP\CoexinBundle\Entity\Empresa;
use MIPP\CoexinBundle\Form\EmpresaType;
use MIPP\CoexinBundle\Entity\Registro;

/**
 * Empresa controller.
 *
 * @Route("/empresa")
 */
class EmpresaController extends Controller
{
    /**
     * Lists all Empresa entities.
     *
     * @Route("/", name="empresa_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $empresas = $em->getRepository('CoexinBundle:Empresa')->findAll();

        return $this->render('empresa/index.html.twig', array(
            'empresas' => $empresas,
        ));
    }

    /**
     * Creates a new Empresa entity.
     *
     * @Route("/new", name="empresa_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $empresa = new Empresa();
        $form = $this->createForm('MIPP\CoexinBundle\Form\EmpresaType', $empresa);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($empresa);
            $em->flush();

            return $this->redirectToRoute('empresa_show', array('id' => $empresa->getId()));
        }

        return $this->render('empresa/new.html.twig', array(
            'empresa' => $empresa,
            'form' => $form->createView(),
        ));
    }
/**
     * Creates via ajax a new Empresa entity.
     *
     * @Route("/nueva", name="nueva_empresa")
     * @Method({"GET", "POST"})
     */
    public function nuevaempresaAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        
        $empresa= new Empresa();
        $empresa->setDescripcion($request->get('empresa_nombre'));
        $empresa->setRif($request->get('empresa_rif'));
        $empresa->setDireccionAdmin($request->get('empresa_direccionadmin'));
        $empresa->setCodigoArea($request->get('empresa_empresa_areaadmin'));
        $empresa->setCodPostalAdmin($request->get('empresa_zipcodeadmin'));
        $empresa->setTelf1($request->get('empresa_telfsadmin'));
        $empresa->setFaxAdmin($request->get('empresa_faxadmin'));
        $empresa->setWebsite($request->get('empresa_website'));
        $empresa->setEmail($request->get('empresa_email'));
        $empresa->setDireccionPlanta($request->get('empresa_direccionplanta'));
        $empresa->setCodigoArea($request->get('empresa_empresa_areaplanta'));
        $empresa->setCodPostalPlanta($request->get('empresa_zipcodeplanta'));
        $empresa->setTelf4($request->get('empresa_telfsplanta'));
        $empresa->setFaxPlanta($request->get('empresa_faxplanta'));
        $empresa->setIdPersona($em->getReference('MIPP\CoexinBundle\Entity\Persona', 0));
        $empresa->setComercializador($request->get('empresa_comercializador'));
        $em->persist($empresa);
        $em->flush();
       
        ////creo el codigo de registro
        $registro = new Registro();
        $registro->setIdEmpresa($em->getReference('MIPP\CoexinBundle\Entity\Empresa', $empresa->getId()));
        $registro->setFecha(new \DateTime);
        $em->persist($registro);
        $registro->setFecha(new \DateTime);
        $registro->setCodigoRegistro(time());
        $em->flush();
        
        $arreglo=array( 'idempresa'=>$empresa->getId(),
                        'idregistro'=>$registro->getId(),
                        'codregistro'=> $registro->getCodigoRegistro());
        
        return new JsonResponse($arreglo);
    }
    /**
     * Finds and displays a Empresa entity.
     *
     * @Route("/{id}", name="empresa_show")
     * @Method("GET")
     */
    public function showAction(Empresa $empresa)
    {
        $deleteForm = $this->createDeleteForm($empresa);

        return $this->render('empresa/show.html.twig', array(
            'empresa' => $empresa,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Empresa entity.
     *
     * @Route("/{id}/edit", name="empresa_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Empresa $empresa)
    {
        $deleteForm = $this->createDeleteForm($empresa);
        $editForm = $this->createForm('MIPP\CoexinBundle\Form\EmpresaType', $empresa);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($empresa);
            $em->flush();

            return $this->redirectToRoute('empresa_edit', array('id' => $empresa->getId()));
        }

        return $this->render('empresa/edit.html.twig', array(
            'empresa' => $empresa,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Empresa entity.
     *
     * @Route("/{id}", name="empresa_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Empresa $empresa)
    {
        $form = $this->createDeleteForm($empresa);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($empresa);
            $em->flush();
        }

        return $this->redirectToRoute('empresa_index');
    }

    /**
     * Creates a form to delete a Empresa entity.
     *
     * @param Empresa $empresa The Empresa entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Empresa $empresa)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('empresa_delete', array('id' => $empresa->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
