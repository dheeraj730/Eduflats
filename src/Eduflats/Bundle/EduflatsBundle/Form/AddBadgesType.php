<?php
namespace Eduflats\Bundle\EduflatsBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class AddBadgesType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('property', 'entity', array(
                'class' => 'EduflatsBundle:Property',
                'property' => 'id',
                'query_builder' => function (\Doctrine\ORM\EntityRepository $er) {
                    return $er->createQueryBuilder('property')
                        ->orderBy('property.id ', 'ASC');
                },
            ))
            ->add('badges', 'entity', array(
                    'class' => 'EduflatsBundle:Badge',
                    'property' => 'name',
                    'multiple' => true,
                    'expanded' => true,
            ))
            ->add('submit', 'submit', array('label'=>'Submit'))
            ;
    }
    
    /**
     * @return string
     */
    public function getName()
    {
        return 'Eduflats_bundle_Eduflatsbundle_AddBadges';
    }
}
