<?php
namespace Eduflats\Bundle\EduflatsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class SuccessController extends Controller {

     /**
      * Success page Display
      * 
     * @Route("/success", name="success")
     * @Template()
     */
    public function successAction(){
        
        return array();
    }

}
