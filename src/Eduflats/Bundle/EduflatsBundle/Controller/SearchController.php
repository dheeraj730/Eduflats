<?php
namespace Eduflats\Bundle\EduflatsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class SearchController extends Controller {
    
    /**
     * @Route("/", name="eduflats_Home_home")
     * @Route("/search", name="search")
     * @Template()
     */
    public function searchAction(){
        return array();
    }
    
    /**
     * @Route("/searchlist", name="searchlist")
     * @Template()
     */
    public function searchlistAction() {
        return array();
    }
    
    /**
     * @Route("/propertydetails", name="propertydetails")
     * @Template()
     */
    public function propertydetailsAction(){
        return array();
    }
}