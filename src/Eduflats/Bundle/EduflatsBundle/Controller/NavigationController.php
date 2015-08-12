<?php
namespace Eduflats\Bundle\EduflatsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class NavigationController extends Controller {
    
    /**
     * Home page display
     * 
     * @Route("/", name="home")
     * @Template()
     */
    public function homeAction(){
        
        return [];   
    }
    
    /**
     * @Route("/Users", name="users")
     * @Template()
     */
    public function userAction(){
        
        return [];
    }

}
