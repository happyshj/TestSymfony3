<?php
/**
 * Created by PhpStorm.
 * User: HSun
 * Date: 2017/3/31
 * Time: 10:42
 */

namespace Mytest\TableBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\Options;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class AssignedOwnerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('assigned_owner', ChoiceType::class , array(
                'choices' => array(
                    'Du Will' => 'Du Will',
                    'Guoqing' => 'Guoqing',
                    'Harold' => 'Harold',
                ),
                'placeholder' => '',
                'label' => 'Assigned Owner:'
            ));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Mytest\TableBundle\Entity\MainTable',
        ));
    }
}