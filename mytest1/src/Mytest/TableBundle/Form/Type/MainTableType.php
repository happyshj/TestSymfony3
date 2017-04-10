<?php

namespace Mytest\TableBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class MainTableType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder ->add('customer_name', TextType::class, array(
            'label' => 'customer name:'
        ))
            ->add('customer_address', TextType::class, array(
                'label' => 'customer address:'
            ))
            ->add('customer_number', TextType::class, array(
                'label' => 'customer number:'
            ));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Mytest\TableBundle\Entity\MainTable',
        ));
    }
}