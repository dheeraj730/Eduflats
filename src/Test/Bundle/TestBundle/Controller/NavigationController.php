<?php

namespace Test\Bundle\TestBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Test\Bundle\TestBundle\Util;

class NavigationController extends Controller
{
    /**
     * @Route("/user", name="user")
     * @Template()
     */
    public function userAction()
    {
        $this->accessControl('ROLE_STUDENT');
        return array('baseLayout'=>  "::".Util::$currentId."base.html.twig");    
    }

    /**
     * @Route("/admin", name="admin")
     * @Template()
     */
    public function adminAction()
    {
        $this->accessControl('ROLE_ADMIN');
        return array('baseLayout'=>  "::".Util::$currentId."base.html.twig");    
    }

    /**
     * @Route("/", name="home")
     * @Template()
     */
    public function homeAction()
    {
        return array('baseLayout'=>  "::".Util::$currentId."base.html.twig");
    }
    
    public function accessControl($role){
        if(!$this->container->get('security.context')->isGranted($role)){
            throw $this->createAccessDeniedException('Needs '.$role." to access page");
        }
    }
}