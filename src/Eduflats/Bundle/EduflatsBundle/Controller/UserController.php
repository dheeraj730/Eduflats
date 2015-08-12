<?php
namespace Eduflats\Bundle\EduflatsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Symfony\Component\HttpFoundation\Request;

use Eduflats\Bundle\EduflatsBundle\Entity\User;
use Eduflats\Bundle\EduflatsBundle\Form\UserType;

use Eduflats\Bundle\EduflatsBundle\Form\StudentType;

use Eduflats\Bundle\EduflatsBundle\siteConfig;

class UserController extends Controller {
    
    /**
     * Creates Student user Record
     * 
     * @Route("/RegisterStudent", name="registerStudent")
     * @Template("EduflatsBundle:User:registerStudent.html.twig")
     */
    public function registerStudentAction(Request $request) {
        $em = $this->getDoctrine()->getEntityManager();
        $student = new User();
        $form = $this->createForm(new StudentType($student), $student,['vitalInfo'=>true, 'location'=>false]);
        
        $form->handleRequest($request);
        
        if($form->isValid()){
           
            $university = $this->getDoctrine()->getRepository('EduflatsBundle:University')->findOneById(siteConfig::$university_id);
            $student->setUniversity($university);
            $student->setDCreatedAt(new \DateTime());
            $student->addRole("ROLE_STUDENT");
            
            $student->setTAddressTitle(null);
            $student->setTAddressLine1(null);
            $student->setTAddressLine2(null);
            $student->setTCity(null);
            $student->setNCountry(null);
            $student->setTProvince(null);
            $student->setTZipCode(null);
            
            $em->persist($student);
            $em->flush();
        }
        
        return ['form'=>$form->createView()];
    }

    /**
     * Creates Provider user Record
     * 
     * @Route("/RegisterProvider", name="registerProvider")
     * @Template("EduflatsBundle:User:registerProvider.html.twig")
     */
    public function registerProviderAction(Request $request) {
        $em = $this->getDoctrine()->getEntityManager();
        $provider = new User();
        $form = $this->createForm(new UserType($provider), $provider, ['vitalInfo'=>true, 'location'=>true]);
        
        $form->handleRequest($request);
        
        if($form->isValid()){
            $university = $this->getDoctrine()->getRepository('EduflatsBundle:University')->findOneById(siteConfig::$university_id);
            $provider->setUniversity($university);
            $provider->setDCreatedAt(new \DateTime());
            $provider->addRole("ROLE_PROVIDER");
            
            $em->persist($provider);
            $em->flush();
        }
         
        return ['form'=>$form->createView()];
    }

    /**
     * Creates Admin User Record
     * 
     * @Route("/RegisterAdmin", name="registerAdmin")
     * @Template("EduflatsBundle:User:registerAdmin.html.twig")
     */
    public function registerAdminAction(Request $request) {
        $em = $this->getDoctrine()->getEntityManager();
        $admin = new User();
        $form = $this->createForm(new UserType($admin), $admin, ['vitalInfo'=>false, 'location'=>false]);
        
        $form->handleRequest($request);
        if($form->isValid()){
            $university = $this->getDoctrine()->getRepository('EduflatsBundle:University')->findOneById(siteConfig::$university_id);
            $admin->setUniversity($university);
            $admin->setDCreatedAt(new \DateTime());
            $admin->addRole("ROLE_ADMIN");
            
            $em->persist($admin);
            $em->flush();
        }
         
        return ['form'=>$form->createView()];
    }

}
