<?php

namespace My;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints as Assert;

class QuestionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
          ->add('description', 'textarea', array('constraints' => new Assert\NotBlank()))
        ;
    }
    
    public function getName()
    {
        return 'question';
    }
}