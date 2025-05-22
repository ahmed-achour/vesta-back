<?php
namespace App\Form;

use App\Entity\Agency;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AgencyType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class)
            ->add('brokerageId', IntegerType::class, ['required' => false])
            ->add('leadAgentId', IntegerType::class, ['required' => false])
            ->add('memberCount', IntegerType::class, ['required' => false])
            ->add('totalSales', IntegerType::class, ['required' => false])
            ->add('twelveMonthSales', IntegerType::class, ['required' => false])
            ->add('averagePrice', NumberType::class, [
                'required' => false,
                'scale' => 2,
                'html5' => true,
                'attr' => [
                    'step' => '0.01'
                ]
            ])
            ->add('minPriceRange', NumberType::class, [
                'required' => false,
                'scale' => 2,
                'html5' => true,
                'attr' => [
                    'step' => '0.01'
                ]
            ])
            ->add('maxPriceRange', NumberType::class, [
                'required' => false,
                'scale' => 2,
                'html5' => true,
                'attr' => [
                    'step' => '0.01'
                ]
            ])
            ->add('websiteUrl', UrlType::class, ['required' => false])
            ->add('description', TextareaType::class, ['required' => false]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Agency::class,
            'is_edit' => false,
        ]);
    }
}