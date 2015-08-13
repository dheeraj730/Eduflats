<?php
namespace Eduflats\Bundle\EduflatsBundle\Entity;

use FOS\UserBundle\Doctrine\UserManager as BaseUserManager;
use Doctrine\ORM\EntityManager;
use Symfony\Component\Security\Core\Encoder\EncoderFactoryInterface;
use FOS\UserBundle\Util\CanonicalizerInterface;
use Eduflats\Bundle\EduflatsBundle\siteConfig;

class UserManager extends BaseUserManager {
    
    public function __construct(EncoderFactoryInterface $encoderFactory, CanonicalizerInterface $usernameCanonicalizer, CanonicalizerInterface $emailCanonicalizer, EntityManager $em, $class) {
        parent::__construct($encoderFactory, $usernameCanonicalizer, $emailCanonicalizer, $em, $class);
    }

    /**
     * Finds a user by email or username, with University
     *
     * @param string $usernameOrEmail
     * @return UserInterface
     */
    public function findUserByUsernameOrEmail($usernameOrEmail) {
        
        if (filter_var($usernameOrEmail, FILTER_VALIDATE_EMAIL)) {
            return $this->findUserBy(array('emailCanonical' => $this->canonicalizeEmail($usernameOrEmail), 'university' => siteConfig::$university_id));
        }

        return $this->findUserBy(array('usernameCanonical' => $this->canonicalizeUsername($usernameOrEmail), 'university' => siteConfig::$university_id));
    }
    
}