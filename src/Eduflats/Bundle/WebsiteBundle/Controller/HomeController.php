<?php
namespace Eduflats\Bundle\WebsiteBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class HomeController extends Controller {
    
    /**
     * @Route("/", name="website_home_home")
     * @Template()
     */
    public function homeAction(Request $request) {
        return []; 
    }
    
}