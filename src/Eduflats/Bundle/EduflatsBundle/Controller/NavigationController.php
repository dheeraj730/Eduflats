<?php
namespace Eduflats\Bundle\EduflatsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Eduflats\Bundle\EduflatsBundle\Util;

class NavigationController extends Controller
{
    /**
     * @Route("/", name="home")
     * @Template()
     */
    public function homeAction(){
        return array('baseLayout'=>  "::".Util::$currentId."base.html.twig");
    }
    
}
