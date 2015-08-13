<?php

namespace Eduflats\Bundle\EduflatsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Symfony\Component\HttpFoundation\Request;

use Eduflats\Bundle\EduflatsBundle\siteConfig;

use Eduflats\Bundle\EduflatsBundle\Entity\Tag;
use Eduflats\Bundle\EduflatsBundle\Form\TagType;

class RegisterTagsController extends Controller {
    
    /**
     * @Route("/RegisterTags", name="registerTags")
     * @Template()
     */
    public function registerTagsAction(Request $request){
        $em = $this->getDoctrine()->getEntityManager();
        $tags = new Tag();
        $form = $this->createForm(new TagType(), $tags);
        $form->handleRequest($request);
        
        if($form->isValid()){
            $university = $this->getDoctrine()->getRepository('EduflatsBundle:University')->findOneById(siteConfig::$university_id);
            $tags->setUniversity($university);
            
            $em->persist($tags);
            $em->flush();
            $this->get('session')->getFlashBag()->set('success', 'tag has been saved Successfully ');
            return $this->redirect($this->generateUrl('success'));
        }
        
        return array('form'=>$form->createView());
    }

}
