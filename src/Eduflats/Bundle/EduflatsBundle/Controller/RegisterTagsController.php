<?php

namespace Eduflats\Bundle\EduflatsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Symfony\Component\HttpFoundation\Request;

use Eduflats\Bundle\EduflatsBundle\Entity\Tags;
use Eduflats\Bundle\EduflatsBundle\Form\TagsType;

class RegisterTagsController extends Controller {
    
    /**
     * @Route("/RegisterTags", name="registerTags")
     * @Template()
     */
    public function registerTagsAction(Request $request){
        $em = $this->getDoctrine()->getEntityManager();
        $tags = new Tags();
        $form = $this->createForm(new TagsType(), $tags);
        $form->handleRequest($request);
        
        if($form->isValid()){
            
            $em->persist($tags);
            $em->flush();
        }
        
        return ['form'=>$form->createView()];
    }

}
