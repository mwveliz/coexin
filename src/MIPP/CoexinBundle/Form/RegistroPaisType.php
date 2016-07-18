<?php

namespace MIPP\CoexinBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RegistroPaisType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('idPais','entity_typeahead', array(
                'label' => 'Lugar (País)',
                'class' => 'CoexinBundle:Pais',
                'render' => 'id_pais',
                'route' => 'paisautocompletar',
                'attr' => array(
                    'class' => 'form-control form-group, fila_importado'
                ),
            ))
           // ->add('idRegistro')
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'MIPP\CoexinBundle\Entity\RegistroPais'
        ));
    }
}
