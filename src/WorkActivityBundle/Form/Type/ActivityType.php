<?php

namespace WorkActivityBundle\Form\Type;



use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use WorkActivityBundle\Entity\Activity;

class ActivityType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'name'
            ])
            ->add('description', TextareaType::class)
            ->add('time', DateTimeType::class)
            ->add('selfTeach', CheckboxType::class)
            ->add('invoiceable', CheckboxType::class)
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
            'data_class' => Activity::class,
        ]);
    }

    public function getName()
    {
        return 'work_activity';
    }
}
