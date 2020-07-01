<?php

namespace App\Form;

use App\Entity\Idea;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class IdeaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add("title", null,["label" => "Your idea"])
            ->add("description",null, ["label" => "Describe it"])
            ->add("author",null, ["label" => "Your pseudo"])
            ->add("category",null, ["label" => "Category", "choice_label" => "name"])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Idea::class,
        ]);
    }
}
