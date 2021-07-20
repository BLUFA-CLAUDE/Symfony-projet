<?php

namespace App\Form;

use App\Entity\Produit;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProduitType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('libelle',TextType::class,array('label'=>'Libelle du produit', 'attr'=>array('required'=>'required','class'=>'form-control form-group form-default')))
            ->add('qteStock',TextType::class,array('label'=>'Quantité du produit', 'attr'=>array('required'=>'required','class'=>'form-control form-group form-default')))
            ->add('Enregistrer',SubmitType::class,array('attr'=>array('class'=>'btn waves-effect waves-light hor-grd btn-grd-primary form-group form-default')))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Produit::class,
        ]);
    }
}
