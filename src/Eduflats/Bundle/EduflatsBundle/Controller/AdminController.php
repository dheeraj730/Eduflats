<?php
namespace Eduflats\Bundle\EduflatsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Symfony\Component\HttpFoundation\Request;

use Eduflats\Bundle\EduflatsBundle\Entity\Client;
use Eduflats\Bundle\EduflatsBundle\Form\ClientType;

use Eduflats\Bundle\EduflatsBundle\siteConfig;

class AdminController extends Controller
{
    /**
     * @Route("/CreateAdmin", name="createAdmin")
     * @Template()
     */
    public function createAdminAction(Request $request) {
        $em = $this->getDoctrine()->getEntityManager();
        $admin = new Client();
        $form = $this->createForm(new ClientType($admin), $admin, array('vitalInfo'=>false, 'location'=>false));
        
        $form->handleRequest($request);
        if($form->isValid()){
            $university = $this->getDoctrine()->getRepository('EduflatsBundle:University')->findOneById(siteConfig::$university_id);
            $admin->setUniversity($university);
            $admin->setDCreatedAt(new \DateTime());
            $admin->addRole("ROLE_ADMIN");
            
            $em->persist($admin);
            $em->flush();
            $this->get('session')->getFlashBag()->set('success', 'Admin account has been saved Successfully ');
            return $this->redirect($this->generateUrl('success'));
        }
         
        return array('form'=>$form->createView());
    }

    /**
     * @Route("/updateAdmin")
     * @Template()
     */
    public function updateAdminAction()
    {
        return array(
                // ...
            );    }

    /**
     * @Route("/deleteAdmin")
     * @Template()
     */
    public function deleteAdminAction()
    {
        return array(
                // ...
            );    }

}
