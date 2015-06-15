<?php

namespace Test\Bundle\TestBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class RentalType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('address')
            ->add('postalCode')
            ->add('propertyType')
            ->add('rent')
            ->add('leasePeriod')
            ->add('bedrooms')
            ->add('bathrooms')
            ->add('additionalDetails')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Test\Bundle\TestBundle\Entity\Rental'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'test_bundle_testbundle_rental';
    }
}
