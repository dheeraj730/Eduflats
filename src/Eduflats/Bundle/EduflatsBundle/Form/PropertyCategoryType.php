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
            if($value->getCategory()->getIsMultiple()){
                $checkList[] = $value->getValue();
                $builder
                ->add($value->getCategory()->getName(), 'choice', array('expanded'  => true, 'choices'=>$checkList,'multiple'=>true, "mapped"=>false, 'required'=>$value->getCategory()->getRequired()));
               
            }elseif($value->getCategory()->getIsText()){
                 $builder
                ->add($value->getCategory()->getName(), 'text', array( "mapped"=>false, 'required'=>$value->getCategory()->getRequired()));
            }elseif($value->getCategory()->getIsText() == false && $value->getCategory()->getIsMultiple() == false){
                $dropdownlist[] = $value->getValue();

                $builder
                ->add($value->getCategory()->getName(), 'choice', array('choices'=>$dropdownlist,'multiple'=>false, "mapped"=>false, 'required'=>$value->getCategory()->getRequired())); 
               
            }
            
        }
        $builder
                ->add('submit', 'submit', ['label'=>'submit', 'attr'=>array('class'=>'btn btn-danger')]);
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
