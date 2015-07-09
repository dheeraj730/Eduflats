<?php
namespace Eduflats\Bundle\EduflatsBundle;

class Util{
    public static $subdomainList = array(
      1=>'blore',
      2=>'epita',
      //update array here without changing other stuff
    );
    
    public static $currentId; //object
    
    public static function accessControl($role){
        if(!$this->container->get('security.context')->isGranted($role)){
            throw $this->createAccessDeniedException('Needs '.$role." to access page");
        }
    }
    
    public static function getPropertyObj($id){
        return $this->getDoctrine()->getRepository('EduflatsBundle:Property')->findOneById($id);
    }
    
    public static function getCampusObjs(){
        //to decide campuses based on distance from property, use campus id
        return $this->getDoctrine()->getRepository('EduflatsBundle:Campus')->findByUniversity(Util::$currentId);
    }
    
    public static function getUniversityObj(){
        return $this->getDoctrine()->getRepository('EduflatsBundle:University')->findOneById(Util::$currentId);
    }
    
    private static function encodePassword($user, $plainPassword){
        $encoder = $this->container->get('security.encoder_factory')->getEncoder($user);
        return $encoder->encodePassword($plainPassword, $user->getSalt());
    }
    
}