<?php

namespace My;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints as Assert;
use My\Field\DeviceType;
use My\Field\PhpVersionType;
use My\Field\PneVersionType;
use My\Field\ServerType;
use My\Field\TargetAreaType;

abstract class QuestionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
          ->add('pne_version', new PneVersionType())
          ->add('target', new TargetAreaType())
          ->add('device', new DeviceType())
          ->add('server', new ServerType())
          ->add('php_version', new PhpVersionType())
          ->add('description', 'textarea', array('constraints' => new Assert\NotBlank()))
        ;
    }
    
    public function getName()
    {
        return 'question';
    }
}