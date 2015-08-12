<?php

namespace Eduflats\Bundle\EduflatsBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class WebsiteSettingsType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('tLogo', 'text', ['label'=>'Logo URL'])
            ->add('tWebsiteName', 'text', ['label'=>'Website Name'])
            ->add('tTagLine', 'text', ['label'=>'Tag Line'])
            ->add('tBackgroundColor', 'text', ['label'=>'Background Color'])
            ->add('tFontColor', 'text', ['label'=>'Font Color'])
            ->add('submit', 'submit', ['label'=>'Finish'])
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Eduflats\Bundle\EduflatsBundle\Entity\WebsiteSettings'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'eduflats_bundle_eduflatsbundle_websitesettings';
    }
}
