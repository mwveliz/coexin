<?php

namespace MIPP\CoexinBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PersonaType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('cedula')
            ->add('nacCedula')
            ->add('cargo')
            ->add('codArea')
            ->add('telf1')
            ->add('telf2')
            ->add('telf3')
            ->add('fax')
            ->add('lugarResidencia')
            ->add('numerosDestino')
            ->add('isActive')
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'MIPP\CoexinBundle\Entity\Persona'
        ));
    }
}
