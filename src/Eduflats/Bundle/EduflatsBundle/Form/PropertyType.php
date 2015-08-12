<?php

namespace Eduflats\Bundle\EduflatsBundle\Form;

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
            ->add('tPropertyDescription', 'text', ['label'=> 'Property Description'])
            ->add('nPropertyType','choice', ['choices'=>[],'label'=>'Property Type'])
            ->add('nAvailabilityStatus','choice', ['choices'=>[],'label'=>'Availability Status'])
            ->add('dAvailableFrom','date', ['label'=>'Available from'])
            ->add('nMonthsOfOccupancy', 'integer', ['label'=> 'Months Of Occupancy'])
            ->add('nBedroom', 'integer', ['label'=> 'Number of Bedrooms'])
            ->add('nBathroom', 'integer', ['label'=> 'Number of Bathrooms'])
            ->add('nTotalFloors', 'integer', ['label'=> 'Total Floors'])
            ->add('nFloorNumber', 'integer', ['label'=> 'Floor Number'])
            ->add('nFurnishedStatus','choice', ['choices'=>[],'label'=>'Furnishing Status'])
            ->add('nBeds', 'integer', ['label'=> 'Number of Beds'])
            ->add('nMaximumOccupants', 'integer', ['label'=> 'Maximum Occupants'])
            ->add('nPrice', 'integer', ['label'=> 'Price'])
            ->add('nMaintainanceCharge', 'integer', ['label'=> 'Maintainance Charge'])
            ->add('bBrokersResponse', 'radio', ['label'=>'Brokerage Response'])
            ->add('nSQFTcovered', 'integer', ['label'=> 'Square Feet Covered'])
            ->add('bDisplayContactDetails', 'radio', ['label'=>'Display Contact Details'])
            ->add('tAddressTitle', 'text', ['label'=> 'Address itle'])
            ->add('tAddressLine1', 'textarea', ['label'=> 'Address Line 1'])
            ->add('tAddressLine2', 'textarea', ['label'=> 'Address Line 2'])
            ->add('tCity', 'text', ['label'=> 'City'])
            ->add('tProvince', 'text', ['label'=> 'Province'])
            ->add('tZipCode', 'integer', ['label'=> 'Zip Code'])
            ->add('nCountry','choice', ['choices'=>[],'label'=>'Availability Status'])
            ->add('tag', 'entity', array(
                    'class' => 'EduflatsBundle:Tag',
                    'property' => 'name',
                    'multiple' => true,
                    'expanded' => true,
                    ))
            ->add('submit', 'submit', ['label'=>'Create Property'])
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Eduflats\Bundle\EduflatsBundle\Entity\Property'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'eduflats_bundle_eduflatsbundle_property';
    }
}
