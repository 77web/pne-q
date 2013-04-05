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
          ->remove('pne_url')
        ;
    }
    
    public function getName()
    {
        return 'install';
    }
}