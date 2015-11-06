<?php
namespace Eduflats\Bundle\EduflatsBundle\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * @Route("/admin", name="admin")
 */
class SearchController extends Controller {
    
    /**
     * @Route("/")
     * @Route("/search", name="edit-search")
     * @Template()
     */
    public function searchAction(){
        return array();
    }

}