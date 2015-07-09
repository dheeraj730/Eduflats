<?php
namespace Eduflats\Bundle\EduflatsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Eduflats\Bundle\EduflatsBundle\Util;
use Eduflats\Bundle\EduflatsBundle\Form\AddBadgesType;
use Eduflats\Bundle\EduflatsBundle\Entity\Property;
use Eduflats\Bundle\EduflatsBundle\Form\PropertyType;
use Symfony\Component\HttpFoundation\Request;

class ClientController extends Controller{
    
    /**
     * @Route("/user", name="user")
     * @Template()
     */
    public function userAction()
    {
        Util::accessControl('ROLE_STUDENT');
        return array('baseLayout'=>  "::".Util::$currentId."base.html.twig");    
    }

    /**
     * @Route("/admin", name="admin")
     * @Template()
     */
    public function adminAction(Request $request)
    {
        Util::accessControl('ROLE_ADMIN');
        $em = $this->getDoctrine()->getManager();
        
        $form = $this->createForm(new AddBadgesType())
        ->add('submit','submit');
        $form->handleRequest($request);
        
        if($form->isSubmitted()){
            $property = $this->getDoctrine()->getRepository('EduflatsBundle:Property')->findOneById($form->getData()['property']);
            $property->setBadges($form->getData()['badges']);
            $em->persist($property);
            $em->flush();
        }
        return array('baseLayout'=>  "::".Util::$currentId."base.html.twig", "form"=>$form->createView());    
    }
    
    /**
     * @Route("/provider/{propertyType}", defaults={"propertyType"=1}, name="provider")
     * @Template()
     */
    public function providerAction($propertyType, Request $request) {
        
        //create util functions for form creation
        Util::accessControl('ROLE_PROVIDER');
        $em = $this->getDoctrine()->getManager();
        $property = new Property();
        $form = $this->createForm(new PropertyType(), $property);
        $form->add("submit","submit",['label'=>'Post Listing']);
        //replace switch with functions
        switch ($propertyType) {
            case 'rental':
                $form->remove('utilities');
                $property->setUtilities(0);
                $property->setPropertytype(1);
                $form->handleRequest($request);
                if($form->isValid()){
                    $property->setUniversity(Util::getUniversityObj());
                    foreach($this->getCampusObjs() as $campus){
                        $property->addCampus($campus);
                    }
                    $em->persist($property);
                    $em->flush();
                }
                $template =  ['propertyType'=>null ,'baseLayout'=>  "::".Util::$currentId."base.html.twig", 'form'=>$form->createView()];
                break;
                
            case 'sharedRoom':
                $property->setPropertytype(2);
                $form->handleRequest($request);
                if($form->isValid()){
                    $property->setUniversity(Util::getUniversityObj());
                    foreach($this->getCampusObjs() as $campus){
                        $property->addCampus($campus);
                    }
                    $em->persist($property);
                    $em->flush();
                }
                $template = ['propertyType'=>'sharedRoom', 'baseLayout'=>  "::".Util::$currentId."base.html.twig", 'form'=>$form->createView()];
                break;
                
            default:
                $template = ['propertyType'=>null, 'baseLayout'=>  "::".Util::$currentId."base.html.twig", 'form'=>null];
                break;
            }
            
            return $template;
    }
    
}