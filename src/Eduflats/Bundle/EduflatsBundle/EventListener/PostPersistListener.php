<?php
namespace Eduflats\Bundle\EduflatsBundle\EventListener;

use Symfony\Component\DependencyInjection\Container;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Eduflats\Bundle\EduflatsBundle\Entity\WebsiteSetting;
use Eduflats\Bundle\EduflatsBundle\Entity\University;

class PostPersistListener {
    
    public function __construct(Container $container) {
           $this->container = $container;
    }
    
    public function addWebsitesetting($em,  $university) {
        $websitesetting = new WebsiteSetting();
        $createdAt = new \DateTime();
        $websitesetting->setDCreatedAt($createdAt);
        $websitesetting->setUniversity($university);
        $em->persist($websitesetting);
        $em->flush();
    }
    
    /**
     * @param LifecycleEventArgs $args 
     */
    public function postPersist(LifecycleEventArgs $args) {
        $entity = $args->getEntity();
        $em = $args->getEntityManager();
        
        if ($entity instanceof University) {
                $this->addWebsitesetting($em, $entity);
        }
    }

}