<?php
namespace Eduflats\Bundle\EduflatsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Symfony\Component\HttpFoundation\Request;

use Eduflats\Bundle\EduflatsBundle\Entity\WebsiteSettings;
use Eduflats\Bundle\EduflatsBundle\Form\WebsiteSettingsType;

use Eduflats\Bundle\EduflatsBundle\siteConfig;

class WebsiteSettingsController extends Controller {
    
   /**
     * Creates Website Settings record and redirects to success page
     * 
     * @Route("/WebsiteSettings", name="websiteSettings")
     * @Template()
     */
    public function websiteSettingsAction(Request $request){
        
        $em = $this->getDoctrine()->getEntityManager();
        $websiteSettings = new WebsiteSettings;
        $form = $this->createForm(new WebsiteSettingsType, $websiteSettings);
        $form->handleRequest($request);
        
        if($form->isValid()){
            $university = $this->getDoctrine()->getRepository('EduflatsBundle:University')->findOneById(siteConfig::$university_id);
            $createdAt = new \DateTime();
            $websiteSettings->setDCreatedAt($createdAt);
            $websiteSettings->setDUpdatedAt(null);
            $websiteSettings->setUniversity($university);
            $em->persist($websiteSettings);
            $em->flush();
            
            $this->get('session')->getFlashBag()->set('success', 'Your Website Settings have been saved Successfully ');
            return $this->redirect($this->generateUrl('success'));
        }
        return array('form'=>$form->createView());
    }
    
}
