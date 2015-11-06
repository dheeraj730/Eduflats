<?php
namespace Eduflats\Bundle\EduflatsBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Eduflats\Bundle\EduflatsBundle\Entity\Plan;

class LoadData implements FixtureInterface {
    
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager) {
        
        $entity = new Plan();
        $entity->setId(1);
        $entity->setBEmailSupport(false);
        $entity->setBMailouts(false);
        $entity->setBPhoneSupport(false);
        $entity->setBSslSetup(false);
        $entity->setCurrencyCode(null);
        $entity->setCurrencyCodeId(2);
        $entity->setDCreatedAt(new \DateTime());
        $entity->setDUpdatedAt(new \DateTime());
        $entity->setNAdminAccounts(1);
        $entity->setNListingName(2);
        
        $manager->persist($entity);
        $manager->flush();
    }
    
}