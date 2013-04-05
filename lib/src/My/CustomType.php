<?php

namespace My;

use Symfony\Component\Form\FormBuilderInterface;

class CustomType extends QuestionType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);

        $builder
          ->remove('server')
          ->remove('php_version')
          ->remove('pne_url')
          ->remove('error_message')
        ;
    }
    
    public function getName()
    {
        return 'custom';
    }
}