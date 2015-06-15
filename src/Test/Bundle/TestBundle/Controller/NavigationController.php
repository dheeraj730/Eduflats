<?php

namespace Test\Bundle\TestBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Test\Bundle\TestBundle\Util;
use Test\Bundle\TestBundle\Entity\Rental;
use Test\Bundle\TestBundle\Entity\SharedRoom;
use Test\Bundle\TestBundle\Form\RentalType;
use Test\Bundle\TestBundle\Form\SharedRoomType;
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
        return array('baseLayout'=>  "::".Util::$currentId."base.html.twig");    
    }
    
    
    /**
     * @Route("/provider/{propertyType}", defaults={"propertyType"=1}, name="provider")
     * @Template()
     */
    public function providerAction($propertyType, Request $request)
    {
        $this->accessControl('ROLE_PROVIDER');
        $em = $this->getDoctrine()->getManager();
        $rental = new Rental();
        $sharedRoom = new SharedRoom();
        switch ($propertyType) {
            case 'rental':
                $form = $this->createForm(new RentalType(), $rental);
                $form->add("submit","submit",['label'=>'Post Listing']);
                $form->handleRequest($request);
                if($form->isValid()){
                    $em->persist($rental);
                    $em->flush();
                }
                return ['baseLayout'=>  "::".Util::$currentId."base.html.twig", 'form'=>$form->createView()];
            case 'sharedRoom':
                $form = $this->createForm(new SharedRoomType, $sharedRoom);
                $form->add("submit","submit",['label'=>'Post Listing']);
                $form->handleRequest($request);
                if($form->isValid()){
                    $em->persist($sharedRoom);
                    $em->flush();
                }
                return ['baseLayout'=>  "::".Util::$currentId."base.html.twig", 'form'=>$form->createView()];

            default:
                return ['baseLayout'=>  "::".Util::$currentId."base.html.twig", 'form'=>null];
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
}