<?php
namespace Eduflats\Bundle\WebsiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class HomeController extends Controller
{
    /**
     * @Route("/", name="website_Home_home")
     * @Template()
     */
    public function homeAction()
    {
        return array(); 
    }
    
    /**
     * @Template()
     */
    public function notfoundAction()
    {
        return array(); 
    }

}