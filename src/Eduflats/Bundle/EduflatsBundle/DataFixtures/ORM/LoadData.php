<?php
namespace Eduflats\Bundle\EduflatsBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadData implements FixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $entity = null; exit;

        $manager->persist($entity);
        $manager->flush();
    }
}