<?php
namespace Eduflats\Bundle\EduflatsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Symfony\Component\HttpFoundation\Request;

use Eduflats\Bundle\EduflatsBundle\siteConfig;

use Eduflats\Bundle\EduflatsBundle\Entity\Property;
use Eduflats\Bundle\EduflatsBundle\Form\PropertyType;

class PropertyController extends Controller
{
    /**
     * @Route("/CreateProperty", name="createProperty")
     * @Template()
     */
    public function createPropertyAction(Request $request) {
        $em = $this->getDoctrine()->getEntityManager();
        $property = new Property();
        $form = $this->createForm(new PropertyType(), $property);
        
        $form->handleRequest($request);
        
        if($form->isValid()){
            $university = $this->getDoctrine()->getRepository('EduflatsBundle:University')->findOneById(siteConfig::$university_id);
            $property->setUniversity($university);
            $property->setIsApprovedNotRejected(true);
            $property->setIsActiveNotExpired(true);
            $property->setTNonApprovalReason(null);
            $property->setDApprovalRequestedOn(null);
            $property->setDApprovedOn(null);
            $property->setIsBlacklisted(false);
            $property->setDClosureDate(null);
            $property->setTAddressTitle('asdf');
            $property->setDCreatedAt(new \DateTime());
            $property->setDUpdatedAt(null);
            $property->setNViews(NULL);
            $property->setNStarRating(null);
            $property->setNLatitude(NULL);
            $property->setNLongitude(NULL);
            
            $em->persist($property);
            $em->flush();
            $this->get('session')->getFlashBag()->set('success', 'Porpery has been saved Successfully ');
            return $this->redirect($this->generateUrl('success'));
        }
        return array('form'=>$form->createView()); 
    }

    /**
     * @Route("/UpdateProperty", name="updateProperty")
     * @Template()
     */
    public function updatePropertyAction(Request $request) {
        return array();
    }

    /**
     * @Route("/DeleteProperty", name="deleteProperty")
     * @Template()
     */
    public function deletePropertyAction(Request $request) {
        return array();    
    }
}
