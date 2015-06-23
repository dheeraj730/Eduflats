<?php
namespace Test\Bundle\TestBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\SecurityContextInterface;
use Test\Bundle\TestBundle\Entity\Admin;
use Test\Bundle\TestBundle\Form\AdminType;
use Test\Bundle\TestBundle\Entity\Student;
use Test\Bundle\TestBundle\Entity\PropertyProvider;
use Test\Bundle\TestBundle\Form\StudentType;
use Test\Bundle\TestBundle\Form\PropertyProviderType;
use Test\Bundle\TestBundle\Entity\University;
use Test\Bundle\TestBundle\Form\UniversityType;
use Test\Bundle\TestBundle\Entity\Campus;
use Test\Bundle\TestBundle\Form\CampusType;
use Test\Bundle\TestBundle\Entity\Tag;
use Test\Bundle\TestBundle\Form\TagType;
use Test\Bundle\TestBundle\Entity\Badge;
use Test\Bundle\TestBundle\Form\BadgeType;
use Test\Bundle\TestBundle\Util;

class LoginController extends Controller
{
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
        return ['baseLayout'=>  "::".Util::$currentId."base.html.twig",  'last_username' => $session->get(SecurityContextInterface::LAST_USERNAME),'error'=> $error, 'baseLayout'=>  "::".Util::$currentId."base.html.twig"];
    }

    /**
     * @Route("/registerForm/{userType}",name="registerForm", defaults={"userType" = 1})
     * @Template()
     */
    public function registerFormAction($userType, Request $request){  
        //create util functions for form creation
        //alternatives- collections/entity form types
        $em = $this->getDoctrine()->getManager();
        $student= new Student();
        $propertyProvider = new PropertyProvider();
        $admin = new Admin();
        switch ($userType) {
            case 'provider':
                $form = $this->createForm(new PropertyProviderType(), $propertyProvider);
                $form->add('submit', 'submit', ['label'=>'Create Account']);
                $form->handleRequest($request);
                if($form->isValid()){
                    $propertyProvider->setUniversity($this->getUniversityObj());
                    $propertyProvider->setRoles(['ROLE_PROVIDER']); //security flaw?
                    $propertyProvider->setPassword($this->encodePassword($propertyProvider, $form["password"]->getData()));
                    $em->persist($this->getUniversityObj());
                    $em->persist($propertyProvider);
                    $em->flush();
                }
                return $this->render('TestBundle:Login:RegisterPropertyProviderForm.html.twig', ['baseLayout'=>  "::".Util::$currentId."base.html.twig", 'form'=>$form->createView(), 'baseLayout'=>  "::".Util::$currentId."base.html.twig"]);
            
            case 'student':
                $form = $this->createForm(new StudentType(), $student);
                $form->add('submit', 'submit', ['label'=>'Create Account']);
                $form->handleRequest($request);
                if($form->isValid()){
                    $student->setUniversity($this->getUniversityObj());
                    $student->setRoles(['ROLE_STUDENT']);
                    $student->setPassword($this->encodePassword($student, $form["password"]->getData()));
                    $em->persist($this->getUniversityObj());
                    $em->persist($student);
                    $em->flush();
                }
                return $this->render('TestBundle:Login:RegisterStudentForm.html.twig', ['baseLayout'=>  "::".Util::$currentId."base.html.twig", 'form'=>$form->createView(), 'baseLayout'=>  "::".Util::$currentId."base.html.twig"]);
                
            case 'admin':
                $form = $this->createForm(new AdminType(), $admin);
                $form->add('submit', 'submit', ['label'=>'Create Account']);
                $form->handleRequest($request);
                if($form->isValid()){
                    $admin->setUniversity($this->getUniversityObj());
                    $admin->setRoles(['ROLE_ADMIN']);
                    $admin->setPassword($this->encodePassword($admin, $form["password"]->getData()));
                    $em->persist($this->getUniversityObj());
                    $em->persist($admin);
                    $em->flush();
                }
                return $this->render('TestBundle:Login:RegisterAdminForm.html.twig', ['baseLayout'=>  "::".Util::$currentId."base.html.twig", 'form'=>$form->createView(), 'baseLayout'=>  "::".Util::$currentId."base.html.twig"]);
                
            default:
                return $this->render('TestBundle:Login:RegisterStudentForm.html.twig', ['baseLayout'=>  "::".Util::$currentId."base.html.twig", 'form'=>null, 'baseLayout'=>  "::".Util::$currentId."base.html.twig"]); 
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
     * @Route("/registerUniversity", name="registerUniversity")
     * @Template()
     */
    public function registerUniversityAction(Request $request){
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
            return $this->redirect($this->generateUrl('createDomain',['subdomain'=>$form->getData()->getSubdomain()]));
        }
        return ['form'=>$form->createView(), 'baseLayout'=>  "::".Util::$currentId."base.html.twig"];
    }
    
    /**
     * @Route("/registerCampus", name="registerCampus")
     * @Template()
     */
    public function registerCampusAction(Request $request){
        $em = $this->getDoctrine()->getManager();
        $campus = new Campus();
        $form = $this->createForm(new CampusType(), $campus);
        $form->add('submit', 'submit', ['label'=>'Create Account']);
        $form->handleRequest($request);
        if($form->isValid()){
            $campus->setUniversity($this->getUniversityObj());
            $em->persist($campus);
            $em->flush();
        }
        return ['form'=>$form->createView(), 'baseLayout'=>  "::".Util::$currentId."base.html.twig"];
    }
    
    /**
     * @Route("/registerTag", name="registerTag")
     * @Template()
     */
    public function registerTagAction(Request $request){
        $this->accessControl('ROLE_ADMIN');
        $em = $this->getDoctrine()->getManager();
        $tag = new Tag();
        $form = $this->createForm(new TagType(), $tag);
        $form->add('submit', 'submit', ['label'=>'Create Tag']);
        $form->handleRequest($request);
        if($form->isValid()){
            $tag->setUniversity($this->getUniversityObj());
            $em->persist($tag);
            $em->flush();
        }
        return ['form'=>$form->createView(), 'baseLayout'=>  "::".Util::$currentId."base.html.twig"];
    }
    
    /**
     * @Route("/registerBadge", name="registerBadge")
     * @Template()
     */
    public function registerBadgeAction(Request $request){
        $this->accessControl('ROLE_ADMIN');
        $em = $this->getDoctrine()->getManager();
        $badge = new Badge();
        $form = $this->createForm(new BadgeType(), $badge);
        $form->add('submit', 'submit', ['label'=>'Create Badge']);
        $form->handleRequest($request);
        if($form->isValid()){
            $badge->setUniversity($this->getUniversityObj());
            $em->persist($badge);
            $em->flush();
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
    
    public function accessControl($role){
        if(!$this->container->get('security.context')->isGranted($role)){
            throw $this->createAccessDeniedException('Needs '.$role." to access page");
        }
    }
}