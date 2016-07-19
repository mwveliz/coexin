<?php

namespace MIPP\CoexinBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MaterialType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('descripcion')
            ->add('materialNacional')
            ->add('incidenciaSobreCosto')
            ->add('nombreProductor')
            ->add('nombreProveedor')
            ->add('isActive')
            ->add('idCodigoArancelario','entity_typeahead', array(
                'label' => 'Código Arancelario',
                'class' => 'CoexinBundle:CodigoArancelario;',
                'render' => 'id_codigo_arancelario',
                'route' => 'codigoarancelarioautocompletar',
                'attr' => array(
                    'class' => 'form-control form-group'
                ),
            ))
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'MIPP\CoexinBundle\Entity\Material'
        ));
    }
}
