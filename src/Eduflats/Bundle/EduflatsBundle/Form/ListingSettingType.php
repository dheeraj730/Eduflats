<?php

namespace Eduflats\Bundle\EduflatsBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ListingSettingType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nAdvertisePeriod','text', array('label'=>'Advertise Period '))
            ->add('bEnableBadges','radio',  array('label'=>'Enable Badges'))
            ->add('bEnableStarRatings','radio', array('label'=>'Enable Star Ratings'))
            ->add('submit', 'submit', array('label'=>'Submit Listing'))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Eduflats\Bundle\EduflatsBundle\Entity\ListingSetting'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'eduflats_bundle_eduflatsbundle_listingSetting';
    }
}
