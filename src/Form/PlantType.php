<?php

namespace App\Form;

use App\Entity\Category;
use App\Entity\Plant;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichImageType;

class PlantType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('commonName', null, ['label' => 'common_name'])
            ->add('scientificName', null, ['label' => 'scientific_name'])
            ->add('description', null, ['label' => 'description'])
            ->add('imageFile', VichImageType::class, [ // Utilisez uniquement imageFile
                'required' => false,
                'label' => 'image',
            ])
            ->add('cycle', null, ['label' => 'cycle'])
            ->add('hardinessZone', null, ['label' => 'hardiness_zone'])
            ->add('maintenanceDifficulty', null, ['label' => 'maintenance_difficulty'])
            ->add('wateringNeeds', null, ['label' => 'watering_needs'])
            ->add('soilType', null, ['label' => 'soil_type'])
            ->add('floweringSeason', null, ['label' => 'flowering_season'])
            ->add('createdAt', null, [
                'widget' => 'single_text',
                'label' => 'created_at'
            ])
            ->add('category', EntityType::class, [
                'class' => Category::class,
                'choice_label' => 'id',
                'label' => 'category',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Plant::class,
        ]);
    }
}
