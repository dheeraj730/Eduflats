<?php

namespace Eduflats\Bundle\EduflatsBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Eduflats\Bundle\EduflatsBundle\Util;
use Symfony\Component\Security\Core\User\UserProviderInterface;
/**
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ClientRepository extends EntityRepository implements UserProviderInterface{
    
    public $university = 2;
    public $userType = "client";
    
    public function FindUserNameOrEmailInUniversity($username,$university, $userType){
        return $this->createQueryBuilder($userType)
            ->where($userType.'.university = :university')
            ->andWhere($userType.'.username = :username OR '.$userType.'.email = :email')
            ->setParameter('university', $university)
            ->setParameter('username', $username)
            ->setParameter('email', $username)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }

    public function loadUserByUsername($username) {
        $user = $this->FindUserNameOrEmailInUniversity($username,$this->university, $this->userType); //check order of parameters use type hinting
        if(!$user){
            throw new \Symfony\Component\Security\Core\Exception\UsernameNotFoundException('user name '.$username.' not found');
        }
        return $user;
    }

    public function refreshUser(\Symfony\Component\Security\Core\User\UserInterface $user) {
        return $user;
    }

    public function supportsClass($class) {
        return;
    }
}