<?php
namespace Eduflats\Bundle\EduflatsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Symfony\Component\HttpFoundation\Request;

use Eduflats\Bundle\EduflatsBundle\Entity\ListingsConfiguration;
use Eduflats\Bundle\EduflatsBundle\Form\ListingsConfigurationType;

use Eduflats\Bundle\EduflatsBundle\siteConfig;

class LisingsConfigurationController extends Controller {
    
    /**
     * Creates ListingsConfigurations Record and redirects to success page
     * 
     * @Route("/listingsConfiguration", name="listingsConfiguration")
     * @Template()
     */
    public function listingsConfigurationAction(Request $request){
        
        $em = $this->getDoctrine()->getEntityManager();
        $listingsConfiguration = new ListingsConfiguration();
        $form = $this->createForm(new ListingsConfigurationType(), $listingsConfiguration);
        $form->handleRequest($request);
        
        if($form->isValid()){
            $university = $this->getDoctrine()->getRepository('EduflatsBundle:University')->findOneById(siteConfig::$university_id);
            $createdAt = new \DateTime();
            $listingsConfiguration->setDCreatedAt($createdAt);
            $listingsConfiguration->setDUpdatedAt(null);
            $listingsConfiguration->setUniversity($university);
            
            $em->persist($listingsConfiguration);
            $em->flush();
            
            $this->get('session')->getFlashBag()->set('success', 'Your Listings Configurations have been save Successfully');
            return $this->redirect($this->generateUrl('success'));
        }
        return array('form'=>$form->createView());
    }
    
}