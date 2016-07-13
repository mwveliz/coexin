<?php

namespace MIPP\CoexinBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CostoType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('materialImportado')
            ->add('materialNacional')
            ->add('manoObra')
            ->add('depreciacion')
            ->add('otroCostoDirecto')
            ->add('gastoAdmim')
            ->add('gastoPublicidad')
            ->add('gastoVenta')
            ->add('otroGastoIndirecto')
            ->add('utilidad')
            ->add('precioPuertaFabrica')
            ->add('fleteInterno')
            ->add('precioFobExportacion')
            ->add('precioFcaExportacion')
            ->add('idProducto')
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'MIPP\CoexinBundle\Entity\Costo'
        ));
    }
}
