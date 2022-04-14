<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('first_name')
            ->add('last_name')
            ->add('email')
            ->add('number')
            ->add('role', ChoiceType::class, [
                'choices'  => [
                    'CLIENT' => 'CLIENT',
                    'ARTISANT' => 'ARTISANT',
                    'LIVREUR' => 'LIVREUR',
                    'ADMIN' => 'ADMIN'
                ]
            ])
            ->add('username')
            ->add('password', PasswordType::class)
            ->add('birthday');
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
            /*'attr' => [
                'novalidate' => 'novalidate', // comment me to reactivate the html5 validation!  🚥
            ]*/
        ]);
    }
}
