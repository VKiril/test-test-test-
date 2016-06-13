<?php

namespace WorkActivityBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use WorkActivityBundle\Entity\Period;


class PeriodType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('from', DateTimeType::class)
            ->add('to', DateTimeType::class)
            ->add('holiday', DateTimeType::class)
            ->add('submit', SubmitType::class, [
                'attr'  => ['class' => ''],
                'label' => 'save',
            ]);
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Period::class,
        ]);
    }

    public function getName()
    {
        return 'work_period';
    }
}
