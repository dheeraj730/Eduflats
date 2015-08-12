<?php
namespace Eduflats\Bundle\EduflatsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Symfony\Component\HttpFoundation\Request;

use Eduflats\Bundle\EduflatsBundle\siteConfig;

use Eduflats\Bundle\EduflatsBundle\Entity\Property;
use Eduflats\Bundle\EduflatsBundle\Form\PropertyType;

class RegisterPropertyController extends Controller {
    
    /**
     * Creates Property Record
     * 
     * @Route("/RegisterProperty", name="registerProperty")
     * @Template("EduflatsBundle:Property:registerProperty.html.twig")
     */
    public function registerPropertyAction(Request $request) {
        $em = $this->getDoctrine()->getEntityManager();
        $property = new Property();
        $form = $this->createForm(new PropertyType(), $property);
        
        $form->handleRequest($request);
        
        if($form->isValid()){
            $university = $this->getDoctrine()->getRepository('EduflatsBundle:University')->findOneById(siteConfig::$university_id);
            $property->setUniversity($university);
            $property->setIsApprovedNotRejected(true);
            $property->setIsActiveNotExpired(true);
            $property->setTNonApprovalReason(null);
            $property->setDApprovalRequestedOn(null);
            $property->setDApprovedOn(null);
            $property->setIsBlacklisted(false);
            $property->setDClosureDate(null);
            $property->setDCreatedAt(new \DateTime());
            $property->setDUpdatedAt(null);
            $property->setNViews(NULL);
            $property->setNStarRating(null);
            $property->setNLatitude(NULL);
            $property->setNLongitude(NULL);
            
            $em->persist($property);
            $em->flush();
        }
        return array('form'=>$form->createView());
    }
    
}