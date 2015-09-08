<?php
namespace Eduflats\Bundle\EduflatsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;

use Eduflats\Bundle\EduflatsBundle\Entity\University;
use Eduflats\Bundle\EduflatsBundle\Form\UniversityType;
use Eduflats\Bundle\EduflatsBundle\Entity\Client;

class RegisterUniversityController extends Controller{
    
    /**
     * Creates University Record,
     * generates config.php and redirects to success page
     * 
     * @Route("/RegisterUniversity", name="registerUniversity")
     * @Template()
     */
    public function registerUniversityAction(Request $request){
        
        $em = $this->getDoctrine()->getEntityManager();
        $university = new University();
        $client = new Client();
        $university->addClient($client);
        $form = $this->createForm(new UniversityType(), $university);
        
        $form->handleRequest($request);
        
        if($form->isValid()){
            $createdAt = new \DateTime();
            $validity = clone $createdAt;
            $validity->modify('+6 months'); //check for edge cases with dates
            
            $university->setDCreatedAt($createdAt);
            $university->setDValidity($validity);
            $university->setBBlacklisted(false);
            $university->setBEnabled(true);
            
            $client->setUniversity($university);
            $client->setDCreatedAt($createdAt);
            $client->addRole("ROLE_ADMIN");
            
            $em->persist($client);
            $em->persist($university);
            $em->flush();
            
            //add subdomain entry to whitelist
            //creates config file
            
            $link = 'http://'.$university->getTSubdomainName().'.eduflats.com/';
            $this->get('session')->getFlashBag()->set('success', 'Your University account has been successully created At '.$link);
            return $this->redirect($this->generateUrl('success'));
        }
        return array('form'=>$form->createView());
    }

}
