<?php
namespace Eduflats\Bundle\WebsiteBundle\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class HomeController extends Controller {
    
    /**
     * @Route("/home/admin", name="website_admin_home_home")
     * @Template()
     */
    public function homeAction(){
        return [];
    }
}
