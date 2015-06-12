<?php
namespace Test\Bundle\TestBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\SecurityContextInterface;
use Test\Bundle\TestBundle\Entity\Student;
use Test\Bundle\TestBundle\Entity\PropertyProvider;
use Test\Bundle\TestBundle\Form\StudentType;
use Test\Bundle\TestBundle\Form\PropertyProviderType;
use Test\Bundle\TestBundle\Entity\University;
use Test\Bundle\TestBundle\Form\UniversityType;
use Test\Bundle\TestBundle\Util;

class LoginController extends Controller
{
    /**
     * @Route("/login", name="login")
     * @Template()
     */
    public function loginAction(){
        return [];
    }

    /**
     * @Route("/logout", name="logout")
     * @Template()
     */
    public function logoutAction(){
        return [];
    }

    /**
     * @Route("/loginForm", name="loginForm")
     * @Template()
     */
    public function loginFormAction(Request $request){
        $session = $request->getSession();
        $error = $session->get(SecurityContextInterface::AUTHENTICATION_ERROR);
        $session->remove(SecurityContextInterface::AUTHENTICATION_ERROR);
        return [ 'last_username' => $session->get(SecurityContextInterface::LAST_USERNAME),'error'=> $error, 'baseLayout'=>  "::".Util::$currentId."base.html.twig"];
    }

    /**
     * @Route("/registerForm/{userType}",name="registerForm", defaults={"userType" = 1})
     * @Template()
     */
    public function registerFormAction($userType, Request $request){
        $em = $this->getDoctrine()->getManager();
        $student= new Student();
        $propertyProvider = new PropertyProvider();
        switch ($userType) {
            case 'provider':
                $form = $this->createForm(new PropertyProviderType(), $propertyProvider);
                $form->add('submit', 'submit', ['label'=>'Create Account']);
                $form->handleRequest($request);
                if($form->isValid()){
                    $propertyProvider->setUniversity($this->getUniversityObj());
                    $propertyProvider->setRoles(array('ROLE_PROVIDER'));
                    $propertyProvider->setPassword($this->encodePassword($propertyProvider, $form["password"]->getData()));
                    $em->persist($this->getUniversityObj());
                    $em->persist($propertyProvider);
                    $em->flush();
                }
                return $this->render('TestBundle:Login:RegisterPropertyProviderForm.html.twig', ['form'=>$form->createView(), 'baseLayout'=>  "::".Util::$currentId."base.html.twig"]);
            
            default:
                $form = $this->createForm(new StudentType(), $student);
                $form->add('submit', 'submit', ['label'=>'Create Account']);
                $form->handleRequest($request);
                if($form->isValid()){
                    $student->setUniversity($this->getUniversityObj());
                    $student->setRoles(array('ROLE_STUDENT'));
                    $student->setPassword($this->encodePassword($student, $form["password"]->getData()));
                    $em->persist($this->getUniversityObj());
                    $em->persist($student);
                    $em->flush();
                }
                return $this->render('TestBundle:Login:RegisterStudentForm.html.twig', ['form'=>$form->createView(), 'baseLayout'=>  "::".Util::$currentId."base.html.twig"]);
        }
    }
    
    /**
     * @Route("/resetPassword", name="resetPassword")
     * @Template()
     */
    public function resetPasswordAction(){
        return [];
    }

    /**
     * @Route("/registerWebsite", name="registerWebsite")
     * @Template()
     */
    public function registerWesiteAction(Request $request){
        $em = $this->getDoctrine()->getManager();
        $university = new University();
        $form = $this->createForm(new UniversityType(), $university);
        $form->add('submit', 'submit', ['label'=>'Create Account']);
        $form->handleRequest($request);
        if($form->isValid()){
            $university->setEnabled(true);
            $em->persist($university);
            $em->flush();
            $university = $em->getRepository('TestBundle:University')->findOneBy(['subdomain'=>$form->getData()->getSubdomain()]);
            echo $university->getId();
            echo $university->getSubdomain();
            return $this->redirect($this->generateUrl('createDomain',['subdomain'=>$form->getData()->getSubdomain()]));
        }
        return ['form'=>$form->createView(), 'baseLayout'=>  "::".Util::$currentId."base.html.twig"];
    }


    public function getUniversityObj(){
        return $this->getDoctrine()->getRepository('TestBundle:University')->findOneById(Util::$currentId);
    }
    
    private function encodePassword($user, $plainPassword){
        $encoder = $this->container->get('security.encoder_factory')->getEncoder($user);
        return $encoder->encodePassword($plainPassword, $user->getSalt());
    }
    
    /**
     * @Route("/createDomain/{subdomain}", name="createDomain")
     */
    public function createDomainAction($subdomain){
        $currentDir = getcwd();
        chdir('/etc/');
        $ip = '127.0.0.1';
        exec("sudo chmod 777 /etc/hosts");
        
        $file = 'hosts';
        $current = file_get_contents($file);
        $current.= "\n " . $ip . ' ' . $subdomain . '.tracestay.co.in';
        
        $link = file_put_contents($file, $current) ? "http://{$subdomain}.tracestay.co.in/Test/web/app_dev.php/" : "";
        
        exec("sudo chmod 644 /etc/hosts");
        chdir($currentDir);
        return $this->redirect($link);
    }
}