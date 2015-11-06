<?php
namespace Eduflats\Bundle\EduflatsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Symfony\Component\HttpFoundation\Request;

use Eduflats\Bundle\EduflatsBundle\Entity\Client;
use Eduflats\Bundle\EduflatsBundle\Form\ClientType;

use Eduflats\Bundle\EduflatsBundle\siteConfig;

class RegisterClientController extends Controller {
    
    /**
     * Creates Student user Record
     * 
     * @Route("/RegisterStudent", name="registerStudent")
     * @Template("EduflatsBundle:Client:registerStudent.html.twig")
     */
    public function registerStudentAction(Request $request) {
        $em = $this->getDoctrine()->getEntityManager();
        $student = new Client();
        $form = $this->createForm(new ClientType($student), $student,array('vitalInfo'=>true, 'location'=>false));
        
        $form->handleRequest($request);
        
        if($form->isValid()){
           
            $university = $this->getDoctrine()->getRepository('EduflatsBundle:University')->findOneById(siteConfig::$university_id);
            $student->setUniversity($university);
            $student->setDCreatedAt(new \DateTime());
            $student->addRole("ROLE_STUDENT");
            
            $em->persist($student);
            $em->flush();
            $this->get('session')->getFlashBag()->set('success', 'Student Account has been saved Successfully ');
            return $this->redirect($this->generateUrl('success'));
        }
        
        return array('form'=>$form->createView());
    }

    /**
     * Creates Provider user Record
     * 
     * @Route("/RegisterProvider", name="registerProvider")
     * @Template("EduflatsBundle:Client:registerProvider.html.twig")
     */
    public function registerProviderAction(Request $request) {
        $em = $this->getDoctrine()->getEntityManager();
        $provider = new Client();
        $form = $this->createForm(new ClientType($provider), $provider, array('vitalInfo'=>true, 'location'=>true));
        
        $form->handleRequest($request);
        
        if($form->isValid()){
            $university = $this->getDoctrine()->getRepository('EduflatsBundle:University')->findOneById(siteConfig::$university_id);
            $provider->setUniversity($university);
            $provider->setDCreatedAt(new \DateTime());
            $provider->addRole("ROLE_PROVIDER");
            
            $em->persist($provider);
            $em->flush();
            $this->get('session')->getFlashBag()->set('success', 'Property Porvider Account been saved Successfully ');
            return $this->redirect($this->generateUrl('success'));
        }
         
        return array('form'=>$form->createView());
    }

}
