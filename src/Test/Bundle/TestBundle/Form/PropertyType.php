<?php

namespace Test\Bundle\TestBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PropertyType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('address','textarea', ['label'=>'Address'])
            ->add('postalcode','integer', ['label'=>'Postal Code'])
            ->add('rent','integer', ['label'=>'Rent per month'])
            ->add('leaseperiod','integer', ['label'=>'Lease Period'])
            ->add('utilities', 'choice', ['choices'=>[1=>'Internet Connection', 2=>'Serves Food']])
            ->add('bedrooms','integer', ['label'=>'Bedrooms available'])
            ->add('bathrooms','integer', ['label'=>'Bathrooms available'])
            ->add('additionaldetails', 'textarea', ['label'=>'Some additional Details'])
            ->add('tag', 'entity', array(
                    'class' => 'TestBundle:Tag',
                    'property' => 'name',
                    'multiple' => true,
                    'expanded' => true,
                    ));
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Test\Bundle\TestBundle\Entity\Property'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'test_bundle_testbundle_property';
    }
}
