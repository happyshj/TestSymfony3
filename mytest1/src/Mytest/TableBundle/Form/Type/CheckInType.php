<?php
/**
 * Created by PhpStorm.
 * User: HSun
 * Date: 2017/3/31
 * Time: 10:39
 */

namespace Mytest\TableBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\Options;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;


class CheckInType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder ->add('sr', TextType::class, array(
            'label' => 'SR:'
        ))
            ->add('rma', TextType::class, array(
                'label' => 'RMA:'
            ))
            ->add('jde', TextType::class, array(
                'label' => 'JDE:'
            ))
            ->add('pn', TextType::class, array(
                'label' => 'P/N:'
            ))
            ->add('sn', TextType::class, array(
                'label' => 'S/N:'
            ))
            ->add('linked_img', FileType::class,array(
                'label' => 'linked_img'
            ));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Mytest\TableBundle\Entity\MainTable',
        ));
    }
}