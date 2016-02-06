<?php
namespace Eduflats\Bundle\EduflatsBundle\Services;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class UniversityResolver {

    protected $requestStack;
    protected $domain = array();
    protected $universityRepository;
    protected $university;

    public function __construct($requestStack, $domain, $universityRepository) {
        $this->requestStack = $requestStack;
        $this->domain = $domain;
        $this->universityRepository = $universityRepository;
    }
    
    public function getUniversityId() {
        return  $this->getUniversity()->getId();
    }

    public function getUniversity() {
        $host = $this->requestStack->getCurrentRequest()->getHost();
        // -- if exists remove www. from $host
        $parts = explode('.', $host);
        
        if (count($parts) === 2) {
            $parts[0] = 'blore';
            $university = $this->universityRepository->findOneBy(array('tSubdomainName' => $parts[0]));
       
            if (null !== $university) {
                return $university;
            }
        }
        throw new NotFoundHttpException('We do not currently have a website configured at this address. Please visit our website for more information or contact our support team');
  
    }
    

}