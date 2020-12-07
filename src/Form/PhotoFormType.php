<?php

namespace App\Form;

use App\Entity\Chambre;
use App\Entity\Photo;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PhotoFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('url', FileType::class, ['label' => false])
            ->add('chambre', EntityType::class, ['class' => Chambre::class, 'choice_label' => 'nom', 'attr' => ['class' => 'form-control']])
	        ->add('ajouter', SubmitType::class, ['attr' => ['class' => 'btn btn-lg w-100']])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Photo::class,
        ]);
    }
}
