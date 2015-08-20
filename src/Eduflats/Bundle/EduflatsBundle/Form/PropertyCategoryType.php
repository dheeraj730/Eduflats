<?php
namespace Eduflats\Bundle\EduflatsBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PropertyCategoryType extends AbstractType
{
    
    public function __construct($options) {
        $this->options = $options;
    }
    
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        
        foreach ($this->options as $key => $value) {
            if($value->getCategory()->getIsMultiple()){
                $checkbox[$value->getCategory()->getName()][] = $value->getValue();
                $type = 'choice';
                $options = array('choices'=>$checkbox[$value->getCategory()->getName()],'multiple'=>true, "mapped"=>false, 'expanded'  => true, 'required'=>$value->getCategory()->getRequired());
            
                
            }elseif($value->getCategory()->getIsText()){
                $type = 'text';
                $options = array( "mapped"=>false, 'required'=>$value->getCategory()->getRequired());
            
                
            }elseif($value->getCategory()->getIsText() == false && $value->getCategory()->getIsMultiple() == false){
                $ddl[$value->getCategory()->getName()][] = $value->getValue();
                $type = 'choice';
                $options = array('choices'=>$ddl[$value->getCategory()->getName()],'multiple'=>false, "mapped"=>false, 'required'=>$value->getCategory()->getRequired()); 
           
            }
            
            $builder
                ->add($value->getCategory()->getName(), $type, $options);
        }
        $builder
                ->add('submit', 'submit', array('label'=>'submit', 'attr'=>array('class'=>'btn btn-danger')));
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