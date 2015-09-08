<?php

namespace Eduflats\Bundle\EduflatsBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Eduflats\Bundle\EduflatsBundle\Form\PropertyCategoryType;

class PropertyType extends AbstractType
{
    public function __construct($options) {
        $this->options = $options;
    }
    
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('tPropertyDescription', 'textarea', array('label'=> 'Property Description'))
            ->add('nAvailabilityStatus','choice', array('choices'=>array(),'label'=>'Availability Status'))
            ->add('dAvailableFrom','date', array('label'=>'Available from'))
            ->add('nMonthsOfOccupancy', 'integer', array('label'=> 'Months Of Occupancy'))
            ->add('nBedroom', 'integer', array('label'=> 'Number of Bedrooms'))
            ->add('nBathroom', 'integer', array('label'=> 'Number of Bathrooms'))
            ->add('nTotalFloors', 'integer', array('label'=> 'Total Floors'))
            ->add('nFloorNumber', 'integer', array('label'=> 'Floor Number'))
            ->add('nFurnishedStatus','choice', array('choices'=>array(),'label'=>'Furnishing Status'))
            ->add('nBeds', 'integer', array('label'=> 'Number of Beds'))
            ->add('nMaximumOccupants', 'integer', array('label'=> 'Maximum Occupants'))
            ->add('nPrice', 'integer', array('label'=> 'Price'))
            ->add('nMaintainanceCharge', 'integer', array('label'=> 'Maintainance Charge'))
            ->add('bBrokersResponse', 'radio', array('label'=>'Brokerage Response'))
            ->add('nSQFTcovered', 'integer', array('label'=> 'Square Feet Covered'))
            ->add('bDisplayContactDetails', 'radio', array('label'=>'Display Contact Details'))
            ->add('tAddressTitle', 'text', array('label'=> 'Address itle'))
            ->add('tAddressLine1', 'textarea', array('label'=> 'Address Line 1'))
            ->add('tAddressLine2', 'textarea', array('label'=> 'Address Line 2'))
            ->add('tCity', 'text', array('label'=> 'City'))
            ->add('tProvince', 'text', array('label'=> 'Province'))
            ->add('tZipCode', 'integer', array('label'=> 'Zip Code'))
            ->add('nCountry','choice', array('choices'=>array(),'label'=>'Availability Status'))
            ->add('propertyCategory', new PropertyCategoryType($this->options), array('label'=>false))
            ->add('tag', 'entity', array(
                    'class' => 'EduflatsBundle:Tag',
                    'property' => 'name',
                    'multiple' => true,
                    'expanded' => true,
                    ))
            ->add('submit', 'submit', array('label'=>'Create Property', 'attr'=>array('class'=>'btn btn-primary')))
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