<?php
namespace Eduflats\Bundle\EduflatsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\Security\Core\SecurityContextInterface;
use Eduflats\Bundle\EduflatsBundle\Util;

class AuthenticationController extends Controller{
    
     /**
     * @Route("/login", name="login")
     * @Template()
     */
    public function loginAction(){
        return ['baseLayout'=>  "::".Util::$currentId."base.html.twig"];
    }

    /**
     * @Route("/logout", name="logout")
     * @Template()
     */
    public function logoutAction(){
        return ['baseLayout'=>  "::".Util::$currentId."base.html.twig"];
    }

    /**
     * @Route("/loginForm", name="loginForm")
     * @Template()
     */
    public function loginFormAction(Request $request){
        $session = $request->getSession();
        $error = $session->get(SecurityContextInterface::AUTHENTICATION_ERROR);
        $session->remove(SecurityContextInterface::AUTHENTICATION_ERROR);
        return ['baseLayout'=>  "::".Util::$currentId."base.html.twig",  'last_username' => $session->get(SecurityContextInterface::LAST_USERNAME),'error'=> $error];
    }
    
    /**
     * @Route("/resetPassword", name="resetPassword")
     * @Template()
     */
    public function resetPasswordAction(){
        return [];
    }
    
}