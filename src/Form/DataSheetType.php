<?php

namespace App\Form;

use App\Entity\Army;
use App\Entity\DataSheet;
use App\Entity\KeyWord;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DataSheetType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name')
            ->add('army', EntityType::class, [
                'class' => Army::class,
'choice_label' => 'id',
            ])
            ->add('keyWord', EntityType::class, [
                'class' => KeyWord::class,
'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => DataSheet::class,
        ]);
    }
}
