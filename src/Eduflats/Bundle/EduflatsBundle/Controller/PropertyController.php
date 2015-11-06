<?php
namespace Eduflats\Bundle\EduflatsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Symfony\Component\HttpFoundation\Request;

use Eduflats\Bundle\EduflatsBundle\siteConfig;

use Eduflats\Bundle\EduflatsBundle\Entity\Property;
use Eduflats\Bundle\EduflatsBundle\Form\PropertyType;
use Eduflats\Bundle\EduflatsBundle\Entity\PropertyCategory;

class PropertyController extends Controller
{
    /**
     * @Route("/CreateProperty", name="createProperty")
     * @Template()
     */
    public function createPropertyAction(Request $request) {
        $options = $this->getDoctrine()->getRepository('EduflatsBundle:Options')->findAll();
        $em = $this->getDoctrine()->getEntityManager();
        $property = new Property();
        $form = $this->createForm(new PropertyType($options), $property);
        $form->handleRequest($request);
        
        if($form->isValid()){
            
            foreach ($options as $key => $value) {
                if($value->getCategory()->getIsMultiple()){
                    $checkbox[$value->getCategory()->getName()][] = $value->getValue();
                }elseif($value->getCategory()->getIsText() == false && $value->getCategory()->getIsMultiple() == false){
                    $ddl[$value->getCategory()->getName()][] = $value->getValue();
                }
            }
            
            foreach ($ddl as $key => $value) {
                $propertyCategory = new PropertyCategory();
                $ddloptionid = $this->getDoctrine()->getRepository('EduflatsBundle:Options')->findOneBy(array('value'=>$ddl[$key][$form['propertyCategory'][$key]->getData()]));
                $ddluniversityId = $this->getDoctrine()->getRepository('EduflatsBundle:Options')->findOneBy(array('value'=>$ddl[$key][$form['propertyCategory'][$key]->getData()]))->getUniversity();
                $ddlcategoryid = $this->getDoctrine()->getRepository('EduflatsBundle:Options')->findOneBy(array('value'=>$ddl[$key][$form['propertyCategory'][$key]->getData()]))->getCategory();
               
                $propertyCategory->setOptions($ddloptionid);
                $propertyCategory->setUniversity($ddluniversityId);
                $propertyCategory->setCategory($ddlcategoryid);
                $em->persist($propertyCategory);
            }
            
            foreach ($checkbox as $key => $value) {
                foreach ($form['propertyCategory'][$key]->getData() as $index => $ignore) {
                    $propertyCategory = new PropertyCategory();
                    $cboptionid = $this->getDoctrine()->getRepository('EduflatsBundle:Options')->findOneBy(array('value'=>$checkbox[$key][$form['propertyCategory'][$key]->getData()[$index]]));
                    $cbuniversityId = $this->getDoctrine()->getRepository('EduflatsBundle:Options')->findOneBy(array('value'=>$checkbox[$key][$form['propertyCategory'][$key]->getData()[$index]]))->getUniversity();
                    $cbcategoryid = $this->getDoctrine()->getRepository('EduflatsBundle:Options')->findOneBy(array('value'=>$checkbox[$key][$form['propertyCategory'][$key]->getData()[$index]]))->getCategory();
                    
                    $propertyCategory->setOptions($cboptionid);
                    $propertyCategory->setUniversity($cbuniversityId);
                    $propertyCategory->setCategory($cbcategoryid);
                    $em->persist($propertyCategory);
                }
                
            }
            $university = $this->getDoctrine()->getRepository('EduflatsBundle:University')->findOneById(siteConfig::$university_id);
            $property->setUniversity($university);
            $property->setIsApprovedNotRejected(true);
            $property->setIsActiveNotExpired(true);
            $property->setIsBlacklisted(false);
            $property->setTAddressTitle('asdf');
            $property->setDCreatedAt(new \DateTime());
            
            $em->persist($property);
            $em->flush();
            $this->get('session')->getFlashBag()->set('success', 'Porpery has been saved Successfully ');
            return $this->redirect($this->generateUrl('success'));
        }
        return array('form'=>$form->createView()); 
    }

}
