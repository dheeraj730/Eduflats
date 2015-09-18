<?php
namespace Eduflats\Bundle\EduflatsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;

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

    /**
     * @Route("/notfound", name="notfound")
     */
    public function pagenotfoundAction(){
        throw new Symfony\Component\HttpKernel\Exception\HttpException(500, "Some description");
        throw $this->createNotFoundException('page not found');
    }
    
}
