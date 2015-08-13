<?php

namespace Eduflats\Bundle\EduflatsBundle\EventListener;

use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Eduflats\Bundle\EduflatsBundle\Util;

class RequestListener
{   
    public function onKernelRequest(GetResponseEvent $event)
    {
        $subdomainList = Util::$subdomainList;
        $UrlSubdomain = str_replace('.eduflats', '' , $event->getRequest()->getHost());
        
        if(!array_search($UrlSubdomain, $subdomainList)){
            echo "susbdomain does not exists.";
            exit;
        }else{
            Util::$currentId = array_search($UrlSubdomain, $subdomainList);
        }
    }
}