<?php

namespace Eduflats\Bundle\EduflatsBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PropertyCategoryType extends AbstractType
{
    
    public function __construct($options, $category) {
        $this->options = $options;
        $this->category = $category;
    }
    
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        
        foreach ($this->options as $key => $value) {
            
            var_dump($value->getCategory()->getName());
            var_dump($value->getCategory()->getRequired());
            var_dump($value->getCategory()->getIsMultiple());
            var_dump($value->getCategory()->getIsText());
            var_dump($value->getValue());
       
        if($value->getCategory()->getIsMultiple()){
            $type = 'choice';
            $optionlist = array($value->getValue());
        }else{
            $type = 'choice';
            $optionlist = array($value->getValue());
        }
        $builder
            ->add($value->getCategory()->getName(), $type, array('choices'=>$optionlist, "mapped"=>false, 'required'=>$value->getCategory()->getRequired()));
            
            
        }
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Eduflats\Bundle\EduflatsBundle\Entity\PropertyCategory'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'eduflats_bundle_eduflatsbundle_propertycategory';
    }
}
