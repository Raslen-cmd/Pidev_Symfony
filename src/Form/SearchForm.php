<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Entity\Categorie;

use App\Entity\Produit ;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;


use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Data\SearchData;

use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class SearchForm extends AbstractType{

    public function buildForm(FormBuilderInterface $builder, array $option)
{

    $builder
        ->add('q', TextType::class, [
          'label'=> false,
           'required' => false,
           'attr' =>[
             'placeholder'=>'Search'

        ]
        ])

        ->add('categories',EntityType::class,[
            'label' =>false,
            'required'=> false,
            'class'=> Categorie::class,
            'expanded'=> false,
            'multiple' => false
        ])
        ->add('min', TextType::class,[
            'label'=> false,
            'required'=> false,
            'attr' =>[
                'placeholder'=>'Prix Min'
           ]
            
        ])
        ->add('max', TextType::class,[
            'label'=> false,
            'required'=> false,
            'attr' =>[
                'placeholder'=>'Prix Max'
           ]
            
        ])
        ;

}   


/*public function configureOptions(OptionsResolver $resolver){
        $resolver->setDefaults([
            'data_class'=> SearchData::class,
            'method'=> 'GET',
            'csrf_protection'=> false
        ]);

     } */

    public function getBlockPrefix()
    {return '';
    }
}