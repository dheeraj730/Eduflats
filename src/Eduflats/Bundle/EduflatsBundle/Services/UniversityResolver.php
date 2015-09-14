<?php

namespace Eduflats\Bundle\EduflatsBundle\Services;

use Doctrine\ORM\EntityRepository;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorage;
use Eduflats\Bundle\EduflatsBundle\Entity\University;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class UniversityResolver {

    /**
     * @var RequestStack
     */
    protected $requestStack;

    /**
     * @var array
     */
    protected $domain = array();

    /**
     * @var EntityRepository
     */
    protected $universityRepository;

    /**
     * @var MultiTenantTenantInterface
     */
    protected $university;
    protected $token;

    public function __construct($requestStack, $domain, $universityRepository, TokenStorage $token) {
        $this->requestStack = $requestStack;
        $this->domain = $domain;
        $this->universityRepository = $universityRepository;
        $this->token = $token;
    }

    /**
     * Returns an tenant id based on current url
     *
     * @return int
     * @throws \Exception
     */
    public function getUniversityId() {
        if ($this->university === null) {
            $this->university = $this->resolveUniversity();
        }
        return ($this->university) ? $this->university->getId() : null;
    }

    /**
     * Returns an tenant entity based on current url
     *
     * @return MultiTenantTenantInterface
     * @throws \Exception
     */
    public function getUniversity() {
        if ($this->university === null) {
            $this->university = $this->resolveUniversity();
        }
        return $this->university;
    }


    /**
     * @return MultiTenantTenantInterface
     * @throws \Exception
     */
    protected function resolveUniversity() {
        // we check if tenant was setted by the override method
        if ($this->university) {
            return $this->university;
        }

        return $this->resolveUniversityFromSubdomain();
    }

    /**
     * @return University
     * @throws \Exception
     */
    protected function resolveUniversityFromSubdomain() {
        $host = $this->requestStack->getCurrentRequest()->getHost();
        if (in_array($host,$this->domain)) {
            throw new NotFoundHttpException('There is an error with the request provided. Please try again later');
        }
       
        $parts = explode('.', $host);
        $subdomain = null;
        if (count($parts) === 3 && $parts[0] !== 'www' && $parts[0] != NULL) {
            $subdomain = $parts[0];
        }
        
        $university = $this->universityRepository->findOneBy(array('tSubdomainName' => $subdomain));
        if ($university) {
            $this->university = $university;
            return $this->university;
        }
         throw new NotFoundHttpException('We do not currently have a website configured at this address. 
                                  Please visit our website for more information or contact our support team');
    }
}