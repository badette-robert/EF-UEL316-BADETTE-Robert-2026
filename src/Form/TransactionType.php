<?php

namespace App\Form;

use App\Entity\Category;
use App\Entity\PaymentMethod;
use App\Entity\Transaction;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TransactionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Transaction', EntityType::class, [
                'class' => PaymentMethod::class,
                'choice_label' => 'id',
            ])
            ->add('no', EntityType::class, [
                'class' => Category::class,
                'choice_label' => 'id',
            ])
            ->add('User', EntityType::class, [
                'class' => User::class,
                'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Transaction::class,
        ]);
    }
}
