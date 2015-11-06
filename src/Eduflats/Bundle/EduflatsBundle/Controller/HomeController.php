<?php
namespace Eduflats\Bundle\EduflatsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class HomeController extends Controller {
    
    /**
     * @Route("/", name="eduflats_Home_home")
     * @Template()
     */
    public function homeAction()
    {
        //never gets called, redirection handled in routing.yml
        return $this->redirectToRoute('search'); 
    }


}