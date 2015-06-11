<?php
namespace Test\Bundle\TestBundle\EventListener;

use Doctrine\ORM\Event\LifecycleEventArgs;
use Test\Bundle\TestBundle\Entity\University;

class SearchIndexerListener
{
    public function postPersist(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();
        $entityManager = $args->getEntityManager();
        if ($entity instanceof University) {
            
        }
    }
}