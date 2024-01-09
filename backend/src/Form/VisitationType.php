<?php

namespace App\Form;

use App\Entity\Hospital;
use App\Entity\User;
use App\Entity\Visitation;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class VisitationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('isit_doctor')
            ->add('visit_department')
            ->add('visit_date')
            ->add('visit_price')
            ->add('user_id', EntityType::class, [
                'class' => User::class,
'choice_label' => 'id',
            ])
            ->add('hospital_id', EntityType::class, [
                'class' => Hospital::class,
'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Visitation::class,
        ]);
    }
}
