<?php

namespace WorkActivityBundle\Form\Type;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use WorkActivityBundle\Entity\Project;

class ProjectType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class)
            ->add('owner', TextType::class)
            ->add('technology', TextType::class)
            ->add('submit', SubmitType::class, [
                'attr'  => ['class' => 'period-save btn btn-info'],
                'label' => 'save',
            ]);
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Project::class,
        ]);
    }

    public function getName()
    {
        return 'work_project';
    }
}
