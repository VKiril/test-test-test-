<?php
/**
 * Created by PhpStorm.
 * User: kiril
 * Date: 6/11/16
 * Time: 8:29 PM
 */

namespace WorkActivityBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use WorkActivityBundle\Entity\TODOActivity;


class TODOType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextareaType::class)
            ->add('priority', TextareaType::class)
            ->add('date', TextareaType::class)
            ->add('notification_numbers', TextareaType::class)
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
            'data_class' => TODOActivity::class
        ]);
    }

    public function getName()
    {
        return 'app_TODO';
    }
}
