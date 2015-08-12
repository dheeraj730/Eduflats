<?php
namespace Eduflats\Bundle\EduflatsBundle\Form;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

use FOS\UserBundle\Form\Type\RegistrationFormType as BaseType;

class UserType extends BaseType
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
                ->add('tFirstName', 'text', ['label'=>'First Name'])
                ->add('tLastName', 'text', ['label'=>'Last Name'])
                ->add('tPhoneNumber', 'text', ['label'=>'Phone Number'])
                ->add('tLandline', 'text', ['label'=>'Landline']);
                if($options['location']){ 
                    $builder
                    ->add('tAddressTitle', 'text', ['label'=>'Address Title'])
                    ->add('tAddressLine1', 'textarea', ['label'=>'Address Line 1'])
                    ->add('tAddressLine2', 'textarea', ['label'=>'Address Line 2'])
                    ->add('tCity', 'text', ['label'=>'City'])
                    ->add('tProvince', 'text', ['label'=>'Province'])
                    ->add('tZipCode', 'text', ['label'=>'Zip Code'])
                    ->add('nCountry', 'choice', ['choices'=>[],'label'=>'Country']);
                }
            }
            $builder
            ->add('submit','submit',['label'=>'Create Account']);
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Eduflats\Bundle\EduflatsBundle\Entity\User', 'vitalInfo'=>true, 'location'=>true
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'eduflats_bundle_eduflatsbundle_user';
    }
}
