<?php
namespace Eduflats\Bundle\EduflatsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Eduflats\Bundle\EduflatsBundle\Form\AddBadgesType;
use Symfony\Component\HttpFoundation\Request;

class BadgesAndTagsController extends Controller {

    /**
     * @Route("/AddBadges", name="addBadges")
     * @Template()
     */
    public function addBadgesAction(Request $request) {
        
        $this->accessControl('ROLE_ADMIN');
        $em = $this->getDoctrine()->getManager();
        
        $form = $this->createForm(new AddBadgesType());
        $form->handleRequest($request);
        
        if($form->isSubmitted()){
            $data = $form->getData();
            $property = $this->getDoctrine()->getRepository('EduflatsBundle:Property')->findOneById($data['property']);
            $property->setBadges($data['badges']);
            $em->persist($property);
            $em->flush();
        }
        return array("form"=>$form->createView());    
    }
    
    /**
     * @Route("/AddTags", name="addTags")
     * @Template()
     */
    public function addTagsAction(Request $request) {
        
        $this->accessControl('ROLE_PROVIDER');
        $em = $this->getDoctrine()->getManager();
        
        $form = $this->createForm(new AddTagsType());
        $form->handleRequest($request);
        
        if($form->isSubmitted()){
            $data = $form->getData();
            $property = $this->getDoctrine()->getRepository('EduflatsBundle:Property')->findOneById($data['property']);
            $property->setBadges($data['badges']);
            $em->persist($property);
            $em->flush();
        }
        return array("form"=>$form->createView());    
    }
    
    public function accessControl($role){
        if(!$this->get('security.context')->isGranted($role)){
            throw $this->createAccessDeniedException('Needs '.$role." to access page");
        }
    }
    
}