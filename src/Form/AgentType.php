<?php
namespace App\Form;

use App\Entity\Agents;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AgentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstName', TextType::class)
            ->add('lastName', TextType::class)
            ->add('email', EmailType::class, ['required' => false])
            ->add('phone', TextType::class, ['required' => false])
            ->add('licenseNumber', TextType::class, ['required' => false])
            ->add('yearsExperience', IntegerType::class, ['required' => false])
            ->add('languages', TextType::class, ['required' => false])
            ->add('specialty', TextType::class, ['required' => false])
            ->add('rating', NumberType::class, [
                'required' => false,
                'scale' => 1,
                'attr' => [
                    'min' => 0,
                    'max' => 5,
                    'step' => 0.1
                ]
            ])
            ->add('profileText', TextareaType::class, ['required' => false])
            ->add('active', CheckboxType::class, ['required' => false]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Agents::class,
            'is_edit' => false,
        ]);
    }
}