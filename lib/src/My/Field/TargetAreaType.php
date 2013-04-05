<?php

namespace My\Field;

use Symfony\Component\Form\AbstractType;
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
    
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'choices' => $this->choices,
        ));
    }
    
    public function getParent()
    {
        return 'choice';
    }
    
    public function getName()
    {
        return 'target_area';
    }
}