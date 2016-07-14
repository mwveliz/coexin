<?php

namespace MIPP\CoexinBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EmpresaType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('rif')
            ->add('descripcion')
            ->add('direccionAdmin')
            ->add('codigoArea')
            ->add('telf1')
            ->add('telf2')
            ->add('telf3')
            ->add('codPostalAdmin')
            ->add('faxAdmin')
            ->add('website')
            ->add('email')
            ->add('direccionPlanta')
            ->add('codPostalPlanta')
            ->add('telf4')
            ->add('telf5')
            ->add('telf6')
            ->add('faxPlanta')
            ->add('fechaRegistro', 'date')
            ->add('isActive')
            ->add('comercializador')
            ->add('productor')
            ->add('idPersona')
            ->add('idTipoEmpresa')
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'MIPP\CoexinBundle\Entity\Empresa'
        ));
    }
}
