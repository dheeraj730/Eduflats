<?php
namespace Eduflats\Bundle\EduflatsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Symfony\Component\HttpFoundation\Request;

use Eduflats\Bundle\EduflatsBundle\Entity\Badges;
use Eduflats\Bundle\EduflatsBundle\Form\BadgesType;

class RegisterBadgesController extends Controller
{
    /**
     * @Route("/RegisterBadges", name="registerBadges")
     * @Template()
     */
    public function registerBadgesAction(Request $request) {
        $em = $this->getDoctrine()->getEntityManager();
        $badges = new Badges();
        $form = $this->createForm(new BadgesType(), $badges);
        $form->handleRequest($request);
        
        if($form->isValid()){
            
            $em->persist($badges);
            $em->flush();
        }
        
        return array('form'=>$form->createView());
    }

}
