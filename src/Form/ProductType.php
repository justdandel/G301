<?php

namespace App\Form;

use App\Entity\Product;
use App\Entity\Category;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class ProductType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class,
            [
                'label' => "Product Name",
                'required' => true,
                'attr' => [
                    'maxlength' => 50,
                    'minlength' => 5
                ]
            ])
            ->add('img')
            ->add('price', MoneyType::class,
            [
                'currency' => 'Dollar'
            ])
            ->add('quantity')
            ->add('description')
            ->add('category', EntityType::class,
            [
                'class' => Category::class,
                'choice_label' => 'name',
                'multiple' => false
            ])
            ->add('Submit', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Product::class,
        ]);
    }
}
