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
            ->add('tName', 'text', ['label'=>'Campus Name'])
            ->add('isMain', 'radio', ['label'=>'Main campus'])
            ->add('tCampusCode', 'text', ['label'=>'Campus Code'])
            ->add('tAddressTitle', 'text', ['label'=>'Address Title'])
            ->add('tAddressLine1', 'text', ['label'=>'Address Line 1'])
            ->add('tAddressLine2', 'text', ['label'=>'Address Line 2'])
            ->add('tCity', 'text', ['label'=>'City'])
            ->add('tProvince', 'text', ['label'=>'Privince'])
            ->add('nCountry', 'choice', ['choices'=>[],'label'=>'Country'])
            ->add('tZipcode', 'text', ['label'=>'Zip Code'])
                
//            ->add('nLatitude', 'text', ['label'=>'Latitude'])
//            ->add('nLongitude', 'text', ['label'=>'Longitude'])
//            ->add('dCreatedAt')
//            ->add('dUpdatedAt')
//            ->add('university')
//            ->add('property')
                
            ->add('submit', 'submit', ['label' => 'Create Campus'])
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
