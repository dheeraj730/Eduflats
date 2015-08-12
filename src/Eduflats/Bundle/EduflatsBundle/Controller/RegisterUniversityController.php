<?php
namespace Eduflats\Bundle\EduflatsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;

use Eduflats\Bundle\EduflatsBundle\Entity\University;
use Eduflats\Bundle\EduflatsBundle\Form\UniversityType;

class RegisterUniversityController extends Controller{
    
    /**
     * Creates University Record, Creates subdomain, generates config.php and redirects to success page
     * 
     * @Route("/RegisterUniversity", name="registerUniversity")
     * @Template()
     */
    public function registerUniversityAction(Request $request){
        
        $em = $this->getDoctrine()->getEntityManager();
        $university = new University();
        $form = $this->createForm(new UniversityType(), $university);
        
        $form->handleRequest($request);
        
        if($form->isValid()){
            $createdAt = new \DateTime();
            $validity = new \DateTime('+6 months');  //createdAt date + six months
            
            $university->setDCreatedAt($createdAt);
            $university->setDValidity($validity);
            $university->setBBlacklisted(false); 
            $university->setDUpdatedAt(null);
            $university->setBEnabled(true);
            
            $em->persist($university);
            $em->flush();
            
            //create subdomain entry
            //creates config file
            
            $link = 'http://'.$university->getTSubdomainName().'.eduflats.com/';
            $this->get('session')->getFlashBag()->set('success', 'Your University account has been successully created At '.$link);
            return $this->redirect($this->generateUrl('success'));
        }
        return array('form'=>$form->createView());
    }
    
}
