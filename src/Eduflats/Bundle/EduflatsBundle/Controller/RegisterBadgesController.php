<?php
namespace Eduflats\Bundle\EduflatsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Symfony\Component\HttpFoundation\Request;

use Eduflats\Bundle\EduflatsBundle\siteConfig;

use Eduflats\Bundle\EduflatsBundle\Entity\Badge;
use Eduflats\Bundle\EduflatsBundle\Form\BadgeType;

class RegisterBadgesController extends Controller
{
    /**
     * @Route("/RegisterBadges", name="registerBadges")
     * @Template()
     */
    public function registerBadgesAction(Request $request) {
        $em = $this->getDoctrine()->getEntityManager();
        $badges = new Badge();
        $form = $this->createForm(new BadgeType(), $badges);
        $form->handleRequest($request);
        
        if($form->isValid()){
            $university = $this->getDoctrine()->getRepository('EduflatsBundle:University')->findOneById(siteConfig::$university_id);
            $badges->setUniversity($university);
            
            $em->persist($badges);
            $em->flush();
            $this->get('session')->getFlashBag()->set('success', 'Badge has been saved Successfully ');
            return $this->redirect($this->generateUrl('success'));
        }
        
        return array('form'=>$form->createView());
    }

}
