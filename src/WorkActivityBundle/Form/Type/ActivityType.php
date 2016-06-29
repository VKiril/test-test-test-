<?php

namespace WorkActivityBundle\Form\Type;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use WorkActivityBundle\Entity\Activity;

class ActivityType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Name'
            ])
            ->add('description', TextareaType::class, [
            ])
            ->add('time', TextType::class, [
            ])
            ->add('date', TextType::class, [
            ])
            ->add('selfTeach', CheckboxType::class, ['required' => false])
            ->add('invoiceable', CheckboxType::class, ['required' => false])
            ->add('project', ChoiceType::class, [
                'choices' => $options['label'],
            ])
            ->add('submit', SubmitType::class, [
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
