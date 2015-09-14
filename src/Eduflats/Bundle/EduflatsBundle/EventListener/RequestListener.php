<?php

namespace Eduflats\Bundle\EduflatsBundle\EventListener;

use Eduflats\Bundle\EduflatsBundle\Services\UniversityResolver;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Eduflats\Bundle\EduflatsBundle\Util;
use Doctrine\ORM\EntityManager;

class RequestListener {

    protected $em;
    protected $universityResolver;
    protected $domain = array();

    public function __construct(EntityManager $entityManager, UniversityResolver $universityResolver,$domain) {

        $this->em = $entityManager;
        $this->universityResolver = $universityResolver;
        $this->domain = $domain;
    }

    public function onKernelRequest(GetResponseEvent $event) {

        //Get the domain name
        $request = $event->getRequest();
        //We do not need to handle it for the main website domain
        if (in_array($request->getHttpHost(),$this->domain)) {
            return;
        }

        //Get the university Id
        $universityId = $this->universityResolver->getUniversityId();
        //If the university does not exist throw 404
        if (!$universityId) {
            throw new NotFoundHttpException('We do not currently have a website configured at this address. 
                                  Please visit our website for more information or contact our support team');
        }        
    }
}