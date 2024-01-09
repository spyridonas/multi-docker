<?php

namespace App\Form;

use App\Entity\Medicine;
use App\Entity\Recipe;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MedicineType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('med_name')
            ->add('med_company')
            ->add('med_company_phone')
            ->add('med_company_email')
            ->add('recipe', EntityType::class, [
                'class' => Recipe::class,
'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Medicine::class,
        ]);
    }
}
