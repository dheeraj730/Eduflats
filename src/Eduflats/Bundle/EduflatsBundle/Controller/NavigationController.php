<?php
namespace Eduflats\Bundle\EduflatsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class NavigationController extends Controller {
    
    /**
     * @Route("/Agents", name="agents")
     * @Template()
     */
    public function agentsAction(){
        return array();
    }
    
    /**
     * @Route("/FAQ", name="faq")
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