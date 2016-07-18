<?php

namespace MIPP\CoexinBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use MIPP\CoexinBundle\Entity\Producto;
use MIPP\CoexinBundle\Entity\ProductoEmpresa;
use MIPP\CoexinBundle\Entity\Material;
use MIPP\CoexinBundle\Entity\ProductoMaterial;
use MIPP\CoexinBundle\Form\ProductoType;


/**
 * Producto controller.
 *
 * @Route("/producto")
 */
class ProductoController extends Controller
{
    /**
     * Lists all Producto entities.
     *
     * @Route("/", name="producto_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $productos = $em->getRepository('CoexinBundle:Producto')->findAll();

        return $this->render('producto/index.html.twig', array(
            'productos' => $productos,
        ));
    }

    /**
     * Creates a new Producto entity.
     *
     * @Route("/new", name="producto_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $producto = new Producto();
        $form = $this->createForm('MIPP\CoexinBundle\Form\ProductoType', $producto);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($producto);
            $em->flush();

            return $this->redirectToRoute('producto_show', array('id' => $producto->getId()));
        }

        return $this->render('producto/new.html.twig', array(
            'producto' => $producto,
            'form' => $form->createView(),
        ));
    }

    /**
     * Creates via ajax a new Persona entity.
     *
     * @Route("/nuevo_registroproducto", name="nuevo_registroproducto")
     * @Method({"GET", "POST"})
     */
    public function nuevoregistroproductoAction(Request $request)
    {   
        
        $em = $this->getDoctrine()->getManager();

       $producto= new Producto();
       $producto->setDenominacionComercial($request->get('producto_nombre'));
       $producto->setIdCodigoNcm($request->get('producto[idCodigoNcm]'));
       $producto->setUnidadMedida($request->get('producto_unidad'));
       $em->persist($producto);
       $em->flush();
        
        //salvando el producto relacionado a la empresa a traves del registro
        $id_producto=$producto->getId();
        $id_registro=$request->get('producto_registro');
        $producto_empresa = new ProductoEmpresa();
        $producto_empresa->setIdProducto($em->getReference('MIPP\CoexinBundle\Entity\Producto', $id_producto));
        $producto_empresa->setIdRegistro($em->getReference('MIPP\CoexinBundle\Entity\Registro', $id_registro));
        $em->persist($producto_empresa);
        $em->flush();
        
        //salvando materiales
        //importados
        $mis=$request->get('mi_mi_material_importado');
        $micas=$request->get('material_idCodigoArancelario_text_material_importado');
        $mips=$request->get('registro_pais_idPais_text_material_importado');
        $miis=$request->get('mi_incidencia_material_importado');
      
        foreach ($mis as $indice => $mi){
           $material= new Material(); 
           $material->setDescripcion($mi);
           //$material->setIdCodigoArancelario($em->getReference('MIPP\CoexinBundle\Entity\CodigoArancelario', $micas[$indice]));
           $material->setIncidenciaSobreCosto($miis[$indice]);
           $em->persist($material);
           $em->flush();
        }
        
   
          //nacionales
        $mns=$request->get('mn_mn_material_nacional');
        $mncas=$request->get('producto_idCodigoArancelario_text_material_nacional');
       $mnprods=$request->get('mn_productor_material_nacional');
       $mnprovs=$request->get('mn_proveedor_material_nacional');
       $mnis=$request->get('mn_incidencia_material_nacional');
       
       
      
        foreach ($mns as $indice=>$mn ){
           $material= new Material(); 
           $material->setDescripcion($mn);
           //$material->setIdCodigoArancelario($em->getReference('MIPP\CoexinBundle\Entity\CodigoArancelario', $mncas[$indice]));
           $material->setIncidenciaSobreCosto($mnis[$indice]);
           $material->setNombreProductor($mnprods[$indice]);
           $material->setNombreProveedor($mnprovs[$indice]);
           $material->setMaterialNacional(true);
           $em->persist($material);
           $em->flush();
        }
        
           
        //salvando relacion de materiales con el prod
        
        $arreglo=array( 'id_producto'=>$producto->getId(),
                        'producto_nombre'=>$producto->getDenominacionComercial(),
                        'producto_unidadmedida'=> $producto->getUnidadMedida());
        
        
        return new JsonResponse($arreglo);
    }
    /**
     * Finds and displays a Producto entity.
     *
     * @Route("/{id}", name="producto_show")
     * @Method("GET")
     */
    public function showAction(Producto $producto)
    {
        $deleteForm = $this->createDeleteForm($producto);

        return $this->render('producto/show.html.twig', array(
            'producto' => $producto,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Producto entity.
     *
     * @Route("/{id}/edit", name="producto_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Producto $producto)
    {
        $deleteForm = $this->createDeleteForm($producto);
        $editForm = $this->createForm('MIPP\CoexinBundle\Form\ProductoType', $producto);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($producto);
            $em->flush();

            return $this->redirectToRoute('producto_edit', array('id' => $producto->getId()));
        }

        return $this->render('producto/edit.html.twig', array(
            'producto' => $producto,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Producto entity.
     *
     * @Route("/{id}", name="producto_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Producto $producto)
    {
        $form = $this->createDeleteForm($producto);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($producto);
            $em->flush();
        }

        return $this->redirectToRoute('producto_index');
    }

    /**
     * Creates a form to delete a Producto entity.
     *
     * @param Producto $producto The Producto entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Producto $producto)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('producto_delete', array('id' => $producto->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
