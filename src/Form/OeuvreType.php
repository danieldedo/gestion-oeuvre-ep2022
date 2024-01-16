<?php

namespace App\Form;

use App\Entity\Oeuvre;
use App\Entity\Artiste;
use App\Entity\Categorie;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

class OeuvreType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, [
                'attr' => [
                    'placeholder' => 'Nom',
                    'class' => 'form-control validate',
                    'minlength' => '3',
                    'maxlength' => '50'
                ],
                'label' => 'Nom',
                'label_attr' => [
                    'class' => 'form-label'
                ],
                'constraints' => [
                    new Assert\Length(['min' => 3, 'max' => 50]),
                    new Assert\NotBlank()
                ]
                ])
            ->add('description', TextType::class, [
                'attr' => [
                    'placeholder' => 'Description',
                    'class' => 'form-control validate',
                    'minlength' => '3',
                    'maxlength' => '50'
                ],
                'label' => 'Description',
                'label_attr' => [
                    'class' => 'form-label'
                ],
                'constraints' => [
                    new Assert\Length(['min' => 3, 'max' => 50]),
                ],
            ])
            ->add('annee', ChoiceType::class, [
                'choices'  => [
                    '2012' => 2012,
                    '2013' => 2013,
                    '2014' => 2014,
                    '2015' => 2015,
                    '2016' => 2016,
                    '2017' => 2017,
                ],
                'attr' => ['placeholder' => 'Choisissez l\'annéé','class' => 'form-control',],
                'required'=> false,
                'label' => 'Année',
                'label_attr' => ['class' => 'form-label'],
                 'constraints' => [new Assert\Length(['min' => 4, 'max' => 4]),]
            ])

            ->add('artiste', EntityType::class, [
                'placeholder' => 'Selectionner l\'artiste',
                'class' => Artiste::class,
                'choice_label' => 'nom',
                'attr' => ['class' => 'form-control form-control-sm'],
                'required' => false,
                'label' => 'Nom de l\'artiste',
                'label_attr' => [
                    'class' => 'form-label',
                ],
            ])
            ->add('categorie', EntityType::class, [
                'placeholder' => 'Selectionner la categorie',
                'class' => Categorie::class,
                'choice_label' => 'nomcategorie',
                'attr' => ['class' => 'form-control form-control-sm'],
                'required' => true,
                'label' => 'Categorie',
                'label_attr' => [
                    'class' => 'form-label',
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Oeuvre::class,
        ]);
    }
}
