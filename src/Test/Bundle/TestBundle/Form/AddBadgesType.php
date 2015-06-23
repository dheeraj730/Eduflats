<?php
namespace Test\Bundle\TestBundle\Form;

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
                'class' => 'TestBundle:Property',
                'property' => 'id',
                'query_builder' => function (\Doctrine\ORM\EntityRepository $er) {
                    return $er->createQueryBuilder('property')
                        ->orderBy('property.id ', 'ASC');
                },
            ))
            ->add('badges', 'entity', array(
                    'class' => 'TestBundle:Badge',
                    'property' => 'name',
                    'multiple' => true,
                    'expanded' => true,
                ))
            ;
    }
    
    /**
     * @return string
     */
    public function getName()
    {
        return 'test_bundle_testbundle_AddBadges';
    }
}
