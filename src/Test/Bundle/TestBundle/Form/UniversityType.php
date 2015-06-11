<?php

namespace Test\Bundle\TestBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UniversityType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', 'text',['label'=>'University Name'])
            ->add('subdomain','text',['label'=>'Subdomain Name', 'attr'=>['maxlength'=>10] ])
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Test\Bundle\TestBundle\Entity\University'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'test_bundle_testbundle_university';
    }
}
