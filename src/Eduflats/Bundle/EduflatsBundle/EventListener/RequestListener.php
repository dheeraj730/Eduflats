<?php
namespace Eduflats\Bundle\EduflatsBundle\EventListener;

use Eduflats\Bundle\EduflatsBundle\Services\UniversityResolver;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;

class RequestListener {

    protected $universityResolver;
    protected $domain = array();

    public function __construct(UniversityResolver $universityResolver,$domain) {
        $this->universityResolver = $universityResolver;
        $this->domain = $domain;
    }

    public function onKernelRequest(GetResponseEvent $event) {
        $universityId = null;
        if (!in_array($event->getRequest()->getHttpHost(),$this->domain)) {
            $universityId = $this->universityResolver->getUniversityId();
        }
        $event->getRequest()->attributes->set('university_id', $universityId);
    }
}