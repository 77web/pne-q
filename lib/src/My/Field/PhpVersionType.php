<?php

namespace My\Field;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PhpVersionType extends AbstractType
{
    public function __construct()
    {
        $versions = array(
          '5.2.x',
          '5.3.x',
          '5.4.x',
          '5.5.x',
        );
        
        $this->choices = array();
        foreach ($versions as $name)
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
        return 'php_version';
    }
}