<?php
/**
 * Created by PhpStorm.
 * User: HSun
 * Date: 2017/3/31
 * Time: 11:51
 */

namespace Mytest\TableBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\Options;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Mytest\TableBundle\Form\Type\AssignedOwnerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class StatusAssignType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('status', TextType::class, array(
                'disabled' => 'true',
                'label' => 'status:'
            ))
            ->add('owner', ChoiceType::class , array(
                'choices' => array(
                    'Du Will' => 'Du Will',
                    'Guoqing' => 'Guoqing',
                    'Harold' => 'Harold',
                ),
                'placeholder' => '',
                'label' => 'owner:'
            ))
            ->add('date', TextType::class, array(
                'disabled' => 'true',
                'label' => 'date:'
            ))
            ->add('maint', AssignedOwnerType::class, array(
                'label' => ''
            ))
            ->add('save', SubmitType::class, array(
                'label' => 'save',
                'attr' => array('class' => 'btn btn-info'),
            ));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Mytest\TableBundle\Entity\SubTable',
        ));
    }
}