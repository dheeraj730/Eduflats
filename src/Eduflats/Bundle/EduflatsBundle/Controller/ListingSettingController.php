<?php
namespace Eduflats\Bundle\EduflatsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Symfony\Component\HttpFoundation\Request;

use Eduflats\Bundle\EduflatsBundle\Entity\ListingSetting;
use Eduflats\Bundle\EduflatsBundle\Form\ListingSettingType;

use Eduflats\Bundle\EduflatsBundle\siteConfig;

class ListingSettingController extends Controller {
    
    /**
     * Creates listingSetting Record and redirects to success page
     * 
     * @Route("/ListingSetting", name="listingSetting")
     * @Template()
     */
    public function listingSettingAction(Request $request){
        $this->accessControl('ROLE_ADMIN');
        $em = $this->getDoctrine()->getEntityManager();
        $listingSetting = new ListingSetting();
        $form = $this->createForm(new ListingSettingType(), $listingSetting);
        $form->handleRequest($request);
        
        if($form->isValid()){
            $university = $this->getDoctrine()->getRepository('EduflatsBundle:University')->findOneById(siteConfig::$university_id);
            $createdAt = new \DateTime();
            $listingSetting->setDCreatedAt($createdAt);
            $listingSetting->setDUpdatedAt(null);
            $listingSetting->setUniversity($university);
            
            $em->persist($listingSetting);
            $em->flush();
            
            $this->get('session')->getFlashBag()->set('success', 'Your Listings Configurations have been saved Successfully');
            return $this->redirect($this->generateUrl('success'));
        }
        return array('form'=>$form->createView());
    }

    public function accessControl($role){
        if(!$this->get('security.context')->isGranted($role)){
            throw $this->createAccessDeniedException('Needs '.$role." to access page");
        }
    }
    
}