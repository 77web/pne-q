<?php

namespace My\Field;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class TargetAreaType extends AbstractType
{
    public function __construct()
    {
        $targets = array(
          'core' => 'core',
          'plugin' => 'plugin',
        );
        
        $this->choices = array();
        foreach ($targets as $name)
        {
            $this->choices[$name] = $name;
        }
    }
    
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
          ->add('target', 'choice', array('choices' => $this->choices, 'required' => $options['required'], 'label' => false))
          ->add('plugin_name', 'text', array('required' => $options['required']))
        ;
    }
    
    public function getName()
    {
        return 'target_area';
    }
}