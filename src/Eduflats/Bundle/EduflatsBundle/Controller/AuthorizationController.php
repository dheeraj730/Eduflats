<?php
namespace Eduflats\Bundle\EduflatsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Eduflats\Bundle\EduflatsBundle\Entity\Client;
use Eduflats\Bundle\EduflatsBundle\Form\PropertyProviderType;
use Eduflats\Bundle\EduflatsBundle\Form\StudentType;
use Eduflats\Bundle\EduflatsBundle\Form\AdminType;
use Eduflats\Bundle\EduflatsBundle\Entity\University;
use Eduflats\Bundle\EduflatsBundle\Form\UniversityType;
use Eduflats\Bundle\EduflatsBundle\Entity\Campus;
use Eduflats\Bundle\EduflatsBundle\Form\CampusType;
use Eduflats\Bundle\EduflatsBundle\Util;
use Symfony\Component\HttpFoundation\Request;

class AuthorizationController extends Controller{
    
    
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
            $subdomain = $em->getRepository('EduflatsBundle:University')->findOneBy(['subdomain'=>$form->getData()->getSubdomain()])->getSubdomain();
            
            $currentDir = getcwd();
            chdir('/etc/');
            $ip = '127.0.0.1';
            exec("sudo chmod 777 /etc/hosts");

            $file = 'hosts';
            $current = file_get_contents($file);
            $current.= "\n " . $ip . ' ' . $subdomain . '.tracestay.co.in';
            //replace hardcoded string with $_server url
            $link = file_put_contents($file, $current) ? "http://{$subdomain}.tracestay.co.in/Eduflats/web/app_dev.php/" : "";

            exec("sudo chmod 644 /etc/hosts");
            chdir($currentDir);
            return $this->redirect($link);
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
            $campus->setUniversity($this->container->get('Helper_Functions')->getUniversityObj());
            exit;
            $em->persist($campus);
            $em->flush();
        }
        return ['form'=>$form->createView(), 'baseLayout'=>  "::".Util::$currentId."base.html.twig"];
    }
    
    /**
     * @Route("/registerUser/{userType}",name="registerUser", defaults={"userType" = 1})
     */
    public function registerUserAction($userType, Request $request){
        
        //create util functions for form creation
        //alternatives- collections/entity form types
        $em = $this->getDoctrine()->getManager();
        $student= new Client();
        $propertyProvider = new Client();
        $admin = new Client();
        switch ($userType) {
            case 'provider':
                $form = $this->createForm(new PropertyProviderType(), $propertyProvider);
                $form->add('submit', 'submit', ['label'=>'Create Account']);
                $form->handleRequest($request);
                if($form->isValid()){
                    $propertyProvider->setUniversity($this->getUniversityObj());
                    $propertyProvider->setRoles(['ROLE_PROVIDER']); //security flaw?
                    $propertyProvider->setAddress('');
                    $propertyProvider->setPassword($this->encodePassword($propertyProvider, $form["password"]->getData()));
                    $em->persist($this->getUniversityObj());
                    $em->persist($propertyProvider);
                    $em->flush();
                }
                $template =  $this->render('EduflatsBundle:Login:RegisterPropertyProviderForm.html.twig', ['form'=>$form->createView(), 'baseLayout'=>  "::".Util::$currentId."base.html.twig"]);
                break;
                
            case 'student':
                $form = $this->createForm(new StudentType(), $student);
                $form->add('submit', 'submit', ['label'=>'Create Account']);
                $form->handleRequest($request);
                if($form->isValid()){
                    $student->setUniversity($this->getUniversityObj());
                    $student->setRoles(['ROLE_STUDENT']);
                    $student->setAddress('');
                    $student->setFirstname('');
                    $student->setLastname('');
                    $student->setPassword($this->encodePassword($student, $form["password"]->getData()));
                    $em->persist($this->getUniversityObj());
                    $em->persist($student);
                    $em->flush();
                }
                $template = $this->render('EduflatsBundle:Login:RegisterStudentForm.html.twig', ['baseLayout'=>  "::".Util::$currentId."base.html.twig", 'form'=>$form->createView()]);
                break;
                
            case 'admin':
                $form = $this->createForm(new AdminType(), $admin);
                $form->add('submit', 'submit', ['label'=>'Create Account']);
                $form->handleRequest($request);
                if($form->isValid()){
                    $admin->setUniversity($this->getUniversityObj());
                    $admin->setRoles(['ROLE_ADMIN']);
                    $admin->setAddress('');
                    $admin->setFirstname('');
                    $admin->setLastname('');
                    $admin->setPassword($this->encodePassword($admin, $form["password"]->getData()));
                    $em->persist($this->getUniversityObj());
                    $em->persist($admin);
                    $em->flush();
                }
                $template = $this->render('EduflatsBundle:Login:RegisterAdminForm.html.twig', ['baseLayout'=>  "::".Util::$currentId."base.html.twig", 'form'=>$form->createView()]);
                break;
                
            default:
                $template = $this->render('EduflatsBundle:Login:RegisterStudentForm.html.twig', ['baseLayout'=>  "::".Util::$currentId."base.html.twig", 'form'=>null]); 
                break;
            }
            return $template;
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
    
}
