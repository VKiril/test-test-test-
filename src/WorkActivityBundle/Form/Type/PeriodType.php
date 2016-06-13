<?php

namespace WorkActivityBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use WorkActivityBundle\Entity\Period;


class PeriodType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        if($options['empty_data'] == 'first'){
            $builder
                ->add('from', DateTimeType::class, [
                    'label' => 'from'
                ])
                ->add('to', DateTimeType::class,[
                    'label' => 'to'
                ]);
        } else {
            $builder
                ->add('holiday', DateTimeType::class);
        }

        $builder
            ->add('submit', SubmitType::class, [
                'attr'  => ['class' => 'period-save btn btn-info'],
                'label' => 'save',
            ]);
        $options['empty_data'] = '';
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
