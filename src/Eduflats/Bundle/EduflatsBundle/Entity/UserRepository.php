<?php
namespace Eduflats\Bundle\EduflatsBundle\Repository;

use Eduflats\Bundle\EduflatsBundle\siteConfig;

class UserRepository  {
    
    /**
     * 
     * @param type $username
     */
    public function FindUsernameOrEmailInUniversity($username, $university) {
        
        return  $this->createQueryBuilder('user')
                ->where('user.university_id = :university')
                ->andWhere('user.username = :username OR user.email = :email')
                ->setParameter('university', $university)
                ->setParameter('username', $username)
                ->setParameter('email', $username)
                ->getQuery()
                ->getOneOrNullResult();
        
    }
    
    /**
     * 
     * @param type $username
     */
    public function loadUserByUsername($username) {
        
        $user = $this->FindUsernameOrEmailInUniversity($username, siteConfig::university_id); //check order of parameters use type hinting
        
        if(!$user){
            throw new \Symfony\Component\Security\Core\Exception\UsernameNotFoundException('User Name '.$username.' Not Found');
        }
        
        return $user;
    }

    /**
     * 
     * @param \Symfony\Component\Security\Core\User\UserInterface $user
     */
    public function refreshUser(\Symfony\Component\Security\Core\User\UserInterface $user) {
        
        return $user;
    }

    /**
     * 
     * @param type $class
     */
    public function supportsClass($class) {
        
        return ;
    }

}
