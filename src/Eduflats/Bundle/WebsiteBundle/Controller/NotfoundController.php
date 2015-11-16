<?php
namespace Eduflats\Bundle\WebsiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class NotfoundController extends Controller {
    
    /*
     * restricts route access from base domain
     */
    public function notfoundAction() {
        throw $this->createNotFoundException('The product does not exist');
    }

}