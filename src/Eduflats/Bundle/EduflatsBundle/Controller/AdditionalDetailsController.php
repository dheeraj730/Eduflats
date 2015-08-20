<?php
namespace Eduflats\Bundle\EduflatsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Symfony\Component\HttpFoundation\Request;

use Eduflats\Bundle\EduflatsBundle\Entity\Category;
use Eduflats\Bundle\EduflatsBundle\Form\CategoryType;

use Eduflats\Bundle\EduflatsBundle\Entity\Options;
use Eduflats\Bundle\EduflatsBundle\Form\OptionsType;

use Eduflats\Bundle\EduflatsBundle\Entity\PropertyCategory;
use Eduflats\Bundle\EduflatsBundle\siteConfig;
use Eduflats\Bundle\EduflatsBundle\Form\PropertyCategoryType;

class AdditionalDetailsController extends Controller
{
    /**
     * @Route("/AddCategory", name="addCategory")
     * @Template()
     */
    public function addCategoryAction(Request $request) {
        
        $em = $this->getDoctrine()->getEntityManager();
        $category = new Category();
        $form = $this->createForm(new CategoryType(), $category);
        $form->handleRequest($request);
        
        if($form->isValid()){
            $em->persist($category);
            $em->flush();
            
            return $this->redirect($this->generateUrl('addOption', array('id'=>$category->getId())));
        }
        return array('form'=>$form->createView());
    }

    /**
     * @Route("/AddOption/{id}", name="addOption")
     * @Template()
     */
    public function addOptionAction(Request $request, $id){
        
        $em = $this->getDoctrine()->getEntityManager();
        $options = new Options();
        $form = $this->createForm(new OptionsType(), $options);
        $form->handleRequest($request);
        
        if($form->isValid()){
            $category = $this->getDoctrine()->getRepository('EduflatsBundle:Category')->findOneById($id);
            $university = $this->getDoctrine()->getRepository('EduflatsBundle:University')->findOneById(siteConfig::$university_id);
            $options->setCategory($category);
            $options->setUniversity($university);
            $em->persist($options);
            $em->flush();
            
            $this->get('session')->getFlashBag()->set('success', 'Your options have been saved Successfully');
            return $this->redirect($this->generateUrl('addOption',array('id'=>$id)));
        }
        return array('form'=>$form->createView());
        
    }

    /**
     * @Route("/form", name="form")
     * @Template()
     */
    public function propertyCategoryFormAction(Request $request) {
        
        $options = $this->getDoctrine()->getRepository('EduflatsBundle:Options')->findAll();
        
        $em = $this->getDoctrine()->getEntityManager();
        $propertyCategory = new PropertyCategory();
        $form = $this->createForm(new PropertyCategoryType($options), $propertyCategory);
        $form->handleRequest($request);
        
        if($form->isValid()){
            $property = $this->getDoctrine()->getRepository('EduflatsBundle:Property')->findOneById(1);
            $propertyCategory = new PropertyCategory();
            
            $propertyCategory->setProperty($property);
            $propertyCategory->setOptions();
            
            $em->persist($propertyCategory);
            $em->flush();
        }
        return array('form'=>$form->createView());
    }
    
}