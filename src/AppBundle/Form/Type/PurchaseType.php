<?php
/**
 * Created by PhpStorm.
 * User: Acer i7 NITRO
 * Date: 5/19/2016
 * Time: 12:40 AM
 */

namespace AppBundle\Form\Type;


use AppBundle\Entity\Purchase;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PurchaseType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('amount', TextType::class)
            ->add('place', TextType::class)
            ->add('date', DateType::class)
            ->add('wasAlone', CheckboxType::class, ['required' => false])
            ->add('forMe', CheckboxType::class, ['required' => false])
            ->add('amount', TextType::class)
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
            'data_class' => Purchase::class,
        ]);
    }

    public function getName()
    {
        return 'app_purchase';
    }
}
