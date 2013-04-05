<?php

namespace My;

use Symfony\Component\Form\FormBuilderInterface;

class InstallType extends QuestionType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);

        $builder
          ->remove('device')
        ;
    }
    
    public function getName()
    {
        return 'install';
    }
}