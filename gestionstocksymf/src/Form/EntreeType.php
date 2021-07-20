<?php

namespace App\Form;

use App\Entity\Entree;
use App\Entity\Produit;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EntreeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('dateE', DateType::class,array('label'=>'Date des entrées', 'attr'=>array('required'=>'required','class'=>'form-control form-group form-default')))
            ->add('qteE', TextType::class,array('label'=>'Quantité achetée', 'attr'=>array('required'=>'required','class'=>'form-control form-group form-default')))
            ->add('produit', EntityType::class,array('class'=>Produit::class, 'label'=>'Libelle du produit', 'attr'=>array('required'=>'required','class'=>'form-control form-group form-default')))
            ->add('Enregistrer',SubmitType::class,array('attr'=>array('class'=>'btn waves-effect waves-light hor-grd btn-grd-primary form-group form-default')))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Entree::class,
        ]);
    }
}
