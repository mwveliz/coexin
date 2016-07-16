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

        $menu->addChild('Listar Registros', array(
            'route' => 'registro_index',
            
        //    'routeParameters' => array('id' => $registro->getId())
        ));
        
        
         $menu->addChild('Listar Empresas', array(
            'route' => 'empresa_index',
        //    'routeParameters' => array('id' => $registro->getId())
        ));

         $menu->addChild('Listar Usuarios', array(
            'route' => 'persona_index',
        //    'routeParameters' => array('id' => $registro->getId())
        ));
         
         $menu->addChild('Listar Materiales', array(
            'route' => 'material_index',
        //    'routeParameters' => array('id' => $registro->getId())
        ));
         
        $menu->addChild('Listar Productos', array(
            'route' => 'producto_index',
        //    'routeParameters' => array('id' => $registro->getId())
        ));
        
        $menu->addChild('Listar Paises', array(
            'route' => 'pais_index',
        //    'routeParameters' => array('id' => $registro->getId())
        ));
         
        $menu->addChild('Listar Documentos', array(
            'route' => 'documentoempresa_index',
        //    'routeParameters' => array('id' => $registro->getId())
        ));
       
        $menu->addChild('Listar Catalogos', array(
            'route' => 'documentoproducto_index',
        //    'routeParameters' => array('id' => $registro->getId())
        ));
         
        
          

        // create another menu item
        //$menu->addChild('About Me', array('route' => 'about'));
        // you can also add sub level's to your menu's as follows
       // $menu['About Me']->addChild('Edit profile', array('route' => 'edit_profile'));

        // ... add more children

        return $menu;
    }
}