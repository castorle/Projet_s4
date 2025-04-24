<?php

namespace App\Form;

use App\Entity\MaintenanceLog;
use App\Entity\Plant;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MaintenanceLogType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('date', null, [
                'widget' => 'single_text'
            ])
            ->add('description', null, ['label' => 'description'])
            ->add('plant', EntityType::class, [
                'class' => Plant::class,
'choice_label' => 'id',
                'label' => 'plant',
            ])
            ->add('user', EntityType::class, [
                'class' => User::class,
'choice_label' => 'id',
                'label' => 'user',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => MaintenanceLog::class,
        ]);
    }
}
