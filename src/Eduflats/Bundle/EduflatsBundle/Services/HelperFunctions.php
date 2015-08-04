<?php
namespace Eduflats\Bundle\EduflatsBundle\Services;

use Eduflats\Bundle\EduflatsBundle\Util;

class HelperFunctions{
    
    private $em;
    private $securityContext;
    private $securityEncoderFactory;
    
    public function __construct(\Doctrine\ORM\EntityManager $em, Symfony\Component\Security\Core\SecurityContext $securityContext, Symfony\Component\Security\Core\Encoder\EncoderFactory $securityEncoderFactory) {
        $this->em = $em;
        $this->securityContext = $securityContext;
        $this->securityEncoderFactory = $securityEncoderFactory;
    }
    
    public function getPropertyObj($id){
        return $this->em->getRepository('EduflatsBundle:Property')->findOneById($id);
    }
    
    public function getCampusObjs(){
        //to decide campuses based on distance from property, use campus id
        return $this->em->getRepository('EduflatsBundle:Campus')->findByUniversity(Util::$currentId);
    }
    
    public function getUniversityObj(){
        return $this->em->getRepository('EduflatsBundle:University')->findOneById(Util::$currentId);
    }
    
    public static function accessControl($role){
        if(!$this->securityContext->isGranted($role)){
            throw $this->createAccessDeniedException('Needs '.$role." to access page");
        }
    }
    
    private static function encodePassword($user, $plainPassword){
        $encoder = $this->securityEncoderFactory->getEncoder($user);
        return $encoder->encodePassword($plainPassword, $user->getSalt());
    }
    
}