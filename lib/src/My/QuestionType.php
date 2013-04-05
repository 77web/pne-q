<?php

namespace My;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints as Assert;
use My\Field\PneVersionType;

class QuestionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $devices = array(
          'pc' => 'pc',
          'mobile' => 'mobile',
          'smartphone' => 'smartphone',
          'cli' => 'cli',
          'mail' => 'mail',
        );
        $targets = array(
          'core' => 'core',
          'plugin' => 'plugin',
        );
        
        $builder
          ->add('version', new PneVersionType())
          ->add('target', 'choice', array('choices' => $targets))
          ->add('device', 'choice', array('choices' => $devices, 'multiple' => true, 'expanded' => true, 'required' => false))
          ->add('description', 'textarea', array('constraints' => new Assert\NotBlank()))
        ;
    }
    
    public function getName()
    {
        return 'question';
    }
}