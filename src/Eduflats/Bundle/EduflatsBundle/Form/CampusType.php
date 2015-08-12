<?php

namespace Eduflats\Bundle\EduflatsBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CampusType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('tName', 'text', array('label'=>'Campus Name'))
            ->add('isMain', 'radio', array('label'=>'Main campus'))
            ->add('tCampusCode', 'text', array('label'=>'Campus Code'))
            ->add('tAddressTitle', 'text', array('label'=>'Address Title'))
            ->add('tAddressLine1', 'text', array('label'=>'Address Line 1'))
            ->add('tAddressLine2', 'text', array('label'=>'Address Line 2'))
            ->add('tCity', 'text', array('label'=>'City'))
            ->add('tProvince', 'text', array('label'=>'Privince'))
            ->add('nCountry', 'choice', array('choices'=>array(),'label'=>'Country'))
            ->add('tZipcode', 'text', array('label'=>'Zip Code'))
                
//            ->add('nLatitude', 'text', ['label'=>'Latitude'])
//            ->add('nLongitude', 'text', ['label'=>'Longitude'])
//            ->add('dCreatedAt')
//            ->add('dUpdatedAt')
//            ->add('university')
//            ->add('property')
                
            ->add('submit', 'submit', array('label' => 'Create Campus'))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Eduflats\Bundle\EduflatsBundle\Entity\Campus'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'eduflats_bundle_eduflatsbundle_campus';
    }
}
