<?php
namespace Test\Bundle\TestBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Test\Bundle\TestBundle\Util;
use Test\Bundle\TestBundle\Entity\Property;
use Test\Bundle\TestBundle\Form\PropertyType;
use Symfony\Component\HttpFoundation\Request;

class NavigationController extends Controller
{
    /**
     * @Route("/user", name="user")
     * @Template()
     */
    public function userAction()
    {
        $this->accessControl('ROLE_STUDENT');
        return array('baseLayout'=>  "::".Util::$currentId."base.html.twig");    
    }

    /**
     * @Route("/admin", name="admin")
     * @Template()
     */
    public function adminAction()
    {
        $this->accessControl('ROLE_ADMIN');
        $em = $this->getDoctrine()->getManager();
        $property = $this->getPropertyObj(5);
        $property->setBadges($this->giveBadges());
        
        //dorop down list of properties available
        //checkboxs for badges available
        //add badge to property
        
        $campuses=$em->getRepository('TestBundle:Campus')->findAll();
        $choices=array();
        foreach ($campuses as $campus) {
            $choices[$campus->getId()] = $campus->getName();
        }
        $form = $this->createFormBuilder()
        ->add('property', 'choice', [
               'choices'  => $choices,
               'required' => false,
              ])
        ->getForm()
        ;
        $em->persist($property);
        $em->flush();
        return array('baseLayout'=>  "::".Util::$currentId."base.html.twig", "form"=>$form->createView());    
    }
    
    
    /**
     * @Route("/provider/{propertyType}", defaults={"propertyType"=1}, name="provider")
     * @Template()
     */
    public function providerAction($propertyType, Request $request) 
    {
        //create util functions for form creation
        $this->accessControl('ROLE_PROVIDER');
        $em = $this->getDoctrine()->getManager();
        $property = new Property();
        $form = $this->createForm(new PropertyType(), $property);
        $form->add("submit","submit",['label'=>'Post Listing']);
        //replace switch with functions
        switch ($propertyType) {
            case 'rental':
                $form->remove('utilities');
                $property->setUtilities(0);
                $form->handleRequest($request);
                if($form->isValid()){
                    $property->setUniversity($this->getUniversityObj());
                    foreach($this->getCampusObjs() as $campus){
                        $property->addCampus($campus);
                    }
                    foreach($this->getTags() as $tag){
                        $property->addTag($tag);
                    }
                    
                    //checkboxs for tags
                    //add tags to properties
                    
                    $em->persist($property);
                    $em->flush();
                }
                return ['propertyType'=>null ,'baseLayout'=>  "::".Util::$currentId."base.html.twig", 'form'=>$form->createView()];
            case 'sharedRoom':
                $form->handleRequest($request);
                if($form->isValid()){
                    $property->setUniversity($this->getUniversityObj());
                    $property->addCampus($this->getCampusObj());
                    foreach($this->getCampusObjs() as $campus){
                        $property->addCampus($campus);
                    }
                    foreach($this->getTags() as $tag){
                        $property->addTag($tag);
                    }
                    $em->persist($property);
                    $em->flush();
                }
                return ['propertyType'=>'sharedRoom', 'baseLayout'=>  "::".Util::$currentId."base.html.twig", 'form'=>$form->createView()];

            default:
                return ['propertyType'=>null, 'baseLayout'=>  "::".Util::$currentId."base.html.twig", 'form'=>null];
        }
    }
    

    /**
     * @Route("/", name="home")
     * @Template()
     */
    public function homeAction()
    {
        return array('baseLayout'=>  "::".Util::$currentId."base.html.twig");
    }
    
    public function accessControl($role){
        if(!$this->container->get('security.context')->isGranted($role)){
            throw $this->createAccessDeniedException('Needs '.$role." to access page");
        }
    }
    
    public function getUniversityObj(){
        return $this->getDoctrine()->getRepository('TestBundle:University')->findOneById(Util::$currentId);
    }
    
    public function getPropertyObj($id){
        return $this->getDoctrine()->getRepository('TestBundle:Property')->findOneById($id);
    }
    
    public function giveBadges(){
        //add badge id based on admin selection
        return $this->getDoctrine()->getRepository('TestBundle:Badge')->findAll();
    }
    
    public function getCampusObjs(){
        //to decide campuses based on distance from property, use campus id
        return $this->getDoctrine()->getRepository('TestBundle:Campus')->findByUniversity(Util::$currentId);
    }
    
    
    public function getTags(){
        //to decide tags based on user choice, use tag id
        return $this->getDoctrine()->getRepository('TestBundle:Tag')->findAll();
    }

}