<?php

namespace Test\Bundle\TestBundle\EventListener;

use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Test\Bundle\TestBundle\Util;

class RequestListener
{   
    public function onKernelRequest(GetResponseEvent $event)
    {
        $subdomainList = Util::$subdomainList;
        $UrlSubdomain = str_replace('.tracestay.co.in', '' , $event->getRequest()->getHost());
        
        if(!array_search($UrlSubdomain, $subdomainList)){
            echo "susbdomain does not exists.";
            exit;
        }else{
            Util::$currentId = array_search($UrlSubdomain, $subdomainList);
        }
    }
}