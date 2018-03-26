<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;


class ProfileFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('famille', TextType::class, array('label' => "Famille :", 'required' => false))
        ->add('race', TextType::class, array('label' => "Race :", 'required' => false))
        ->add('nourritureFav', TextType::class, array('label' => "Nourriture Favorite:", 'required' => false))
        ->add('planete', TextType::class, array('label' => "Planete :", 'required' => false))
        ->add('galaxie', TextType::class, array('label' => "Galaxie :", 'required' => false));
    }

    public function getParent()
    {
        return 'FOS\UserBundle\Form\Type\ProfileFormType';
    }

    public function getName()
    {
        return 'app_user_profile';
    }
}
?>
