<?php
namespace Eduflats\Bundle\EduflatsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Symfony\Component\HttpFoundation\Request;

use Eduflats\Bundle\EduflatsBundle\Entity\Campus;
use Eduflats\Bundle\EduflatsBundle\Form\CampusType;

use Eduflats\Bundle\EduflatsBundle\siteConfig;

class RegisterCampusController extends Controller {
    
    /**
     * Creates Campus Record
     * 
     * @Route("/RegisterCampus", name="registerCampus")
     * @Template("EduflatsBundle:Campus:registerCampus.html.twig")
     */
    public function registerCampusAction(Request $request){
        
        $em = $this->getDoctrine()->getEntityManager();
        $campus = new Campus();
        $form = $this->createForm(new CampusType(), $campus);
        
        $form->handleRequest($request);
        
        if($form->isValid()){
            $university = $this->getDoctrine()->getRepository('EduflatsBundle:University')->findOneById(siteConfig::$university_id);
            $campus->setNLongitude(null);
            $campus->setNLatitude(null);
            $campus->setDCreatedAt(new \DateTime());
            $campus->setDUpdatedAt(null);
            $campus->setUniversity($university);
            
            $em->persist($campus);
            $em->flush();
            $this->get('session')->getFlashBag()->set('success', 'Campus has been saved Successfully ');
            return $this->redirect($this->generateUrl('success'));
        }
        
        return array('form'=>$form->createView());
    }
    
}