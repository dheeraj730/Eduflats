<?php
namespace Eduflats\Bundle\EduflatsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class NavigationController extends Controller {
    
    /**
     * @Route("/login_page", name="login")
     * @Template()
     */
    public function loginAction(){
        return array();
    }
    
    /**
     * @Route("/agents", name="agents")
     * @Template()
     */
    public function agentsAction(){
        return array();
    }
    
    /**
     * @Route("/agents-listings", name="navigation_agentlisting")
     * @Template()
     */
    public function agentlistingAction(){
        return array();
    }
    
    /**
     * @Route("/faq", name="faq")
     * @Template()
     */
    public function faqAction(){
        return array();
    }
    
    /**
     * @Route("/PageNotFound", name="pagenotfound")
     * @Template()
     */
    public function pagenotfoundAction(){
        return array();
    }
    
    /**
     * @Route("/Properties", name="properties")
     * @Template()
     */
    public function propertiesAction(){
        return array();
    }
    
    /**
     * @Route("/Properties-detail", name="propertydetail")
     * @Template()
     */
    public function propertydetailAction(){
        return array();
    }
    
    /**
     * @Route("/post-property", name="postproperty")
     * @Template()
     */
    public function postpropertyAction(\Symfony\Component\HttpFoundation\Request $request){
        
        //testing with form without an entity
        $form = $this->createFormBuilder()
            ->add('RadioButton', ChoiceType::class, array(
                    'label' => 'Radio Buttons',
                    'label_attr' => array(
                        'class' => 'ct-fw-600 text-uppercase ct-u-marginBottom10 center-block'
                    ),
                    'attr'=> array('class'=>'ct-radio--items ct-radio--custom ct-radio--customInline'),
                    'choices' => array(
                        'yes'   => 1,
                        'no'    => 0,
                        'maybe' => 2
                    ), 
                      'choices_as_values' => true,
                      'multiple' => false,
                      'expanded' => true,
                  ))
            ->add('CheckBoxes', ChoiceType::class, array(
                    'attr'=> array('class'=>''),
                    'choices' => array(
                        'a long lable for checkbox'   => 1,
                        'lable for checkbox'   => 2,
                        '3'   => 3,
                        '4'   => 4,
                        '5'   => 5,
                        '6'   => 6,
                        'a checkbox'   => 7,
                        '8'   => 8,
                        '9'   => 9
                    ), 
                      'choices_as_values' => true,
                      'multiple' => true,
                      'expanded' => true,
                  ))
            ->add('DropdownMenu', ChoiceType::class, array(
                    'attr'=> array('class'=>'select2-container ct-js-select ct-select2--light ct-select-lg'),
                    'choices' => array(
                        'yes'   => 1,
                        'no'    => 0,
                        'maybe' => 2
                    ), 
                      'choices_as_values' => true,
                      'multiple' => false,
                      'expanded' => false,
                  ))
            ->add('textbox', \Symfony\Component\Form\Extension\Core\Type\TextType::class,  array(
                    'attr'=> array('class'=>'form-control input-lg ct-input--border ct-u-marginBottom20'))
                    )
            ->add('textarea', \Symfony\Component\Form\Extension\Core\Type\TextareaType::class,  array(
                    'attr'=> array('class'=>'form-control input-lg ct-input--border ct-u-marginBottom40'))
                    )
            ->getForm();
        
        $form->handleRequest($request); 
        
        return array('form'=>$form->createView());
    }
    
    //ignore -  only for reference
    
    /**
     * @Route("/Shortcodes", name="shortcodes")
     * @Template()
     */
    public function shortcodesAction(){
        return array();
    }
    
     /**
     * @Route("/Blog", name="blog")
     * @Template()
     */
    public function blogAction(){
        return array();
    }
    
    /**
     * @Route("/Blog-detail", name="blogdetail")
     * @Template()
     */
    public function blogdetailAction(){
        return array();
    }
    
}