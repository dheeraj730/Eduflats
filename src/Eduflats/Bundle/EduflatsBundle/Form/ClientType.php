<?php
namespace Eduflats\Bundle\EduflatsBundle\Form;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

use FOS\UserBundle\Form\Type\RegistrationFormType as BaseType;

class ClientType extends BaseType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);
        
           
            if($options['vitalInfo']){
                $builder
                ->add('tFirstName', 'text', array('label'=>'First Name'))
                ->add('tLastName', 'text', array('label'=>'Last Name'))
                ->add('tPhoneNumber', 'integer', array('label'=>'Phone Number'))
                ->add('tLandline', 'integer', array('label'=>'Landline'));
                if($options['location']){ 
                    $builder
                    ->add('tAddressTitle', 'text', array('label'=>'Address Title'))
                    ->add('tAddressLine1', 'textarea', array('label'=>'Address Line 1'))
                    ->add('tAddressLine2', 'textarea', array('label'=>'Address Line 2'))
                    ->add('tCity', 'text', array('label'=>'City'))
                    ->add('tProvince', 'text', array('label'=>'Province'))
                    ->add('tZipCode', 'text', array('label'=>'Zip Code'))
                    ->add('nCountry', 'choice', array('choices'=>array(),'label'=>'Country'));
                }
            }
            $builder
            ->add('submit','submit',array('label'=>'Create Account'));
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Eduflats\Bundle\EduflatsBundle\Entity\Client', 'vitalInfo'=>true, 'location'=>true
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'eduflats_bundle_eduflatsbundle_client';
    }
}