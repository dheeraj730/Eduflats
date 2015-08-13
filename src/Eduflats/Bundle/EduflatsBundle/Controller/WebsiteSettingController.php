<?php
namespace Eduflats\Bundle\EduflatsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Symfony\Component\HttpFoundation\Request;

use Eduflats\Bundle\EduflatsBundle\Entity\WebsiteSetting;
use Eduflats\Bundle\EduflatsBundle\Form\WebsiteSettingType;

use Eduflats\Bundle\EduflatsBundle\siteConfig;

class WebsiteSettingController extends Controller {
    
   /**
     * Creates Website Settings record and redirects to success page
     * 
     * @Route("/WebsiteSetting", name="websiteSetting")
     * @Template()
     */
    public function websiteSettingAction(Request $request){
        
        $em = $this->getDoctrine()->getEntityManager();
        $websiteSetting = new WebsiteSetting;
        $form = $this->createForm(new WebsiteSettingType, $websiteSetting);
        $form->handleRequest($request);
        
        if($form->isValid()){
            $university = $this->getDoctrine()->getRepository('EduflatsBundle:University')->findOneById(siteConfig::$university_id);
            $createdAt = new \DateTime();
            $websiteSetting->setDCreatedAt($createdAt);
            $websiteSetting->setDUpdatedAt(null);
            $websiteSetting->setUniversity($university);
            $em->persist($websiteSetting);
            $em->flush();
            
            $this->get('session')->getFlashBag()->set('success', 'Your Website Settings have been saved Successfully ');
            return $this->redirect($this->generateUrl('success'));
        }
        return array('form'=>$form->createView());
    }
    
}
