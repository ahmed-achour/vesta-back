<?php

namespace App\Form;

use App\Entity\Properties;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Vich\UploaderBundle\Form\Type\VichFileType;
use Vich\UploaderBundle\Form\Type\VichImageType;

class PropertiesType  extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('city', TextType::class, ['required' => false])
            ->add('state', TextType::class, ['required' => false])
            ->add('zipCode', TextType::class, ['required' => false])
            ->add('subdivision', TextType::class, ['required' => false])
            ->add('region', TextType::class, ['required' => false])
            ->add('yearBuilt', IntegerType::class, ['required' => false])
            ->add('lotSizeAcres', NumberType::class, [
                'required' => false,
                'scale' => 2,
                'attr' => ['step' => '0.01']
            ])
            ->add('structureArea', IntegerType::class, ['required' => false])
            ->add('livableArea', IntegerType::class, ['required' => false])
            ->add('finishedBelowGround', IntegerType::class, ['required' => false])
            ->add('listingPrice', NumberType::class, [
                'required' => false,
                'scale' => 2,
                'attr' => ['step' => '0.01']
            ])
            ->add('pricePerSqft', NumberType::class, [
                'required' => false,
                'scale' => 2,
                'attr' => ['step' => '0.01']
            ])
            ->add('dateListed', DateType::class, [
                'required' => false,
                'widget' => 'single_text'
            ])
            ->add('mlsId', TextType::class, ['required' => false])
            ->add('ownershipType', ChoiceType::class, [
                'choices' => [
                    'Private' => 'Private',
                    'Corporate' => 'Corporate',
                    'Bank Owned' => 'Bank Owned',
                    'Government' => 'Government'
                ],
                'required' => false
            ])
            ->add('listingTerms', TextType::class, ['required' => false])
            ->add('roadSurface', ChoiceType::class, [
                'choices' => [
                    'Gravel' => 'Gravel',
                    'Paved' => 'Paved',
                    'Dirt' => 'Dirt',
                    'Concrete' => 'Concrete'
                ],
                'required' => false
            ])
            ->add('longitude', NumberType::class, [
                'required' => false,
                'scale' => 7,
                'attr' => ['step' => '0.0000001']
            ])
            ->add('latitude', NumberType::class, [
                'required' => false,
                'scale' => 7,
                'attr' => ['step' => '0.0000001']
            ])
            ->add('mainPictureFile', VichImageType::class, [
                'required' => false,
                'allow_delete' => true,
                'delete_label' => 'Remove main picture',
                'download_label' => 'View main picture',
                'download_uri' => true,
                'image_uri' => true,
                'asset_helper' => true,
                'label' => 'Main Picture',
            ])

            ->add('galleryPicturesFile', FileType::class, [
                'label' => 'Gallery Pictures',
                'multiple' => true,
                'required' => false,
                'mapped' => false, // Keep this as false since we'll handle manually
            ])

            ->add('planPictureFile', VichImageType::class, [
                'required' => false,
                'allow_delete' => true,
                'delete_label' => 'Remove plan picture',
                'download_label' => 'View plan picture',
                'download_uri' => true,
                'image_uri' => true,
                'asset_helper' => true,
                'label' => 'Plan Picture',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Properties::class,
            'is_edit' => false,
        ]);
    }
}
