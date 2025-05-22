<?php
// src/Form/AdminUsersType.php
// src/Form/AdminUsersType.php
namespace App\Form;

use App\Entity\AdminUsers;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Validator\Constraints\File;

class AdminUsersType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('username', TextType::class)
            ->add('email', EmailType::class)
            ->add('fullName', TextType::class, [
                'required' => false,
            ])
            ->add('isSuperadmin', CheckboxType::class, [
                'required' => false,
                'label' => 'Is Superadmin?',
            ])
            ->add('plainPassword', PasswordType::class, [
                'mapped' => false,
                'required' => !$options['is_edit'],
                'constraints' => $options['is_edit'] ? [] : [
                    new NotBlank([
                        'message' => 'Please enter a password',
                    ]),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Your password should be at least {{ limit }} characters',
                        'max' => 4096,
                    ]),
                ],
            ])
            ->add('profilePictureFile', FileType::class, [
            'label' => 'Profile Picture',
            'mapped' => false, // This field is not mapped to the entity
            'required' => false,
            'constraints' => [
                new File([
                    'maxSize' => '2M',
                    'mimeTypes' => [
                        'image/jpeg',
                        'image/png',
                        'image/gif',
                    ],
                    'mimeTypesMessage' => 'Please upload a valid image file (JPEG, PNG, GIF)',
                ])
            ],
        ]
        );
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => AdminUsers::class,
            'is_edit' => false,
        ]);
    }
}