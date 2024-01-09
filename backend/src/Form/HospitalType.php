<?php

namespace App\Form;

use App\Entity\Hospital;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class HospitalType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('hospital_name')
            ->add('hospital_address')
            ->add('hospital_company')
            ->add('hospital_phone')
            ->add('hospital_email')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Hospital::class,
        ]);
    }
}
