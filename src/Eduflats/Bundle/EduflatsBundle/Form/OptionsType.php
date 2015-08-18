<?php

namespace Eduflats\Bundle\EduflatsBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class OptionsType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('value')
            ->add('submit', 'submit', ['label'=>'Create Option'])
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Eduflats\Bundle\EduflatsBundle\Entity\Options'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'eduflats_bundle_eduflatsbundle_options';
    }
}
