<?php

namespace App\Form;

use App\Entity\Ailleur;
use App\Entity\Enum\AilleurEnum;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AilleurFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom',TextType::class, ['attr' => ['class' => 'form-control']])
            ->add('adresse', TextType::class, ['attr' => ['class' => 'form-control']])
            ->add('site', TextType::class, ['attr' => ['class' => 'form-control'], 'required' => false])
            ->add('categorie', ChoiceType::class, [
            	'attr' => ['class' => 'form-control'],
	            'choices' => AilleurEnum::getAvailableTypes(),
	            'choice_label' => function($choice) {
		            return AilleurEnum::getTypeName($choice);
	            }] )
	        ->add('ajouter', SubmitType::class, ['attr' => ['class' => 'btn btn-lg w-100']])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Ailleur::class,
        ]);
    }
}
