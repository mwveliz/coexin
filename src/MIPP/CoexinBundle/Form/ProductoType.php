<?php

namespace MIPP\CoexinBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProductoType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            //->add('denominacionComercial')
            //->add('unidadMedida')
            //->add('procesoProductivoLiteral')
            //->add('isActive')
            ->add('idCodigoArancelario','entity_typeahead', array(
                'label' => 'Código Arancelario',
                'class' => 'CoexinBundle:CodigoArancelario;',
                'render' => 'id_codigo_arancelario',
                'route' => 'codigoarancelarioautocompletar',
                'attr' => array(
                    'class' => 'form-control form-group'
                ),
            ))
                ->add('idCodigoNcm','entity_typeahead', array(
                'label' => 'Código Arancelario NCM 2012',
                'class' => 'CoexinBundle:CodigoNcm;',
                'render' => 'id_codigo_ncm',
                'route' => 'codigoncmautocompletar',
                'attr' => array(
                    'class' => 'form-control form-group'
                ),
            ))
            //->add('idMoneda')
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'MIPP\CoexinBundle\Entity\Producto'
        ));
    }
}
