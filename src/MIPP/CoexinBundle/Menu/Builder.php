<?php

// src/CoexinBundle/Menu/Builder.php
namespace MIPP\CoexinBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;

class Builder implements ContainerAwareInterface
{
    use ContainerAwareTrait;

    public function mainMenu(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('root');

        $menu->addChild('Inicio', array('route' => 'homepage'));

        // access services from the container!
        $em = $this->container->get('doctrine')->getManager();
        // findMostRecent and Blog are just imaginary examples
        //$registro = $em->getRepository('CoexinBundle:Registro')->findOneById(1);

        //$menu->addChild('ver Registro', array(
        //    'route' => 'registro_show',
        //    'routeParameters' => array('id' => $registro->getId())
       // ));

         $menu->addChild('Listar Registros', array('route' => 'registro_index'));
         $menu->addChild('Listar Empresas', array('route' => 'empresa_index'));
         $menu->addChild('Listar Usuarios', array('route' => 'persona_index'));
         $menu->addChild('Listar Materiales', array('route' => 'material_index'));
         $menu->addChild('Listar Productos', array('route' => 'producto_index'));
         $menu->addChild('Listar Documentos', array('route' => 'documentoempresa_index'));
         $menu->addChild('Listar Catálogos', array('route' => 'documentoproducto_index'));
         $menu->addChild('Cadenas de costos', array('route' => 'costo_index'));
         $menu->addChild('Sistema', array());
          
         $menu['Sistema']->addChild('Códigos NCM', array('route' => 'codigoncm_index')); 
         $menu['Sistema']->addChild('Códigos Arancelarios', array('route' => 'codigoarancelario_index')); 
         $menu['Sistema']->addChild('Países', array('route' => 'pais_index')); 
         $menu['Sistema']->addChild('Tipos de Documento', array('route' => 'tipodocumento_index')); 
          $menu['Sistema']->addChild('Tipos de Empresa', array('route' => 'tipoempresa_index')); 

         

        return $menu;
    }
}