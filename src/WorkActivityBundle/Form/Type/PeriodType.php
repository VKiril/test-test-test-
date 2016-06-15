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
        if($options['label'] == 'first'){
            $builder
                ->add('fromDate', DateTimeType::class, [
                    'label' => 'from Date'
                ])
                ->add('toDate', DateTimeType::class,[
                    'label' => 'to Date'
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
        $options['label'] = null;
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
