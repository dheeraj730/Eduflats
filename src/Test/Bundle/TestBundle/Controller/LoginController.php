<?php
namespace Test\Bundle\TestBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\SecurityContextInterface;
use Test\Bundle\TestBundle\Entity\User;
use Test\Bundle\TestBundle\Form\UserType;

class LoginController extends Controller
{
    /**
     * @Route("/login", name="login")
     * @Template()
     */
    public function loginAction()
    {
        return [];
    }

    /**
     * @Route("/logout", name="logout")
     * @Template()
     */
    public function logoutAction()
    {
        return [];
    }

    /**
     * @Route("/loginForm", name="loginForm")
     * @Template()
     */
    public function loginFormAction(Request $request)
    {
        $session = $request->getSession();
        $error = $session->get(SecurityContextInterface::AUTHENTICATION_ERROR);
        $session->remove(SecurityContextInterface::AUTHENTICATION_ERROR);
        return [ 'last_username' => $session->get(SecurityContextInterface::LAST_USERNAME),'error'=> $error,];
    }

    /**
     * @Route("/registerForm/{userType}",name="registerForm", defaults={"userType" = 1})
     * @Template()
     */
    public function registerFormAction($userType, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $user= new User();
        $form = $this->createForm(new UserType(), $user);
        $form->add('submit', 'submit', ['label'=>'Create Account']);
        $form->handleRequest($request);
        
        switch ($userType) {
            case 'provider':
                if($form->isValid()){
                    $user->setUniversity($this->getUniversityObj($request));
                    $user->setRoles(array('ROLE_PROVIDER'));
                    $user->setPassword($this->encodePassword($user, $form["password"]->getData()));
                    $user->setEnabled(true);
                    $em->persist($user);
                    $em->flush();
                }
                return $this->render('TestBundle:Login:registerForm.html.twig', ['form'=>$form->createView()]);
            
            default:
                if($form->isValid()){
                    $user->setUniversity($this->getUniversityObj($request));
                    $user->setRoles(array('ROLE_STUDENT'));
                    $user->setPassword($this->encodePassword($user, $form["password"]->getData()));
                    $user->setEnabled(true);
                    $em->persist($this->getUniversityObj($request));
                    $em->persist($user);
                    $em->flush();
                }
                return $this->render('TestBundle:Login:registerForm.html.twig', ['form'=>$form->createView()]);
        }
    }
    
    /**
     * @Route("/resetPassword", name="resetPassword")
     * @Template()
     */
    public function resetPasswordAction(){
        return [];
    }

    public function getUniversityObj(Request $request){
        return $this->getDoctrine()->getRepository('TestBundle:University')->findOneBy(['subdomain'=>str_replace('.tracestay.co.in', '' , $this->getRequest()->getHost())]);
    }
    
    private function encodePassword(User $user, $plainPassword){
        $encoder = $this->container->get('security.encoder_factory')->getEncoder($user);
        return $encoder->encodePassword($plainPassword, $user->getSalt());
    }
}