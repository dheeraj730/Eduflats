<?php
namespace Eduflats\Bundle\EduflatsBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

use Eduflats\Bundle\EduflatsBundle\Form\ClientType;

class UniversityType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
            ->add('tUniversityName', 'text', array('label'=>'University Name'))
            ->add('tSubdomainName', 'text', array('label'=>'Subdomain Name'))
            ->add('client', 'collection', array('type'=>new ClientType(),
                                                'allow_add' => true,
                                                'prototype' => true,
                                                'by_reference' => false,
                                                'options'=>array('vitalInfo'=>false, 'location'=>false),
                                                'label'=>false
                                               ));
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Eduflats\Bundle\EduflatsBundle\Entity\University'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'eduflats_bundle_eduflatsbundle_university';
    }
}
