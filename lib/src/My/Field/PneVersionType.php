<?php

namespace My\Field;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PneVersionType extends AbstractType
{
    public function __construct()
    {
        $versions = array(
          '3.2.x',
          '3.4.x',
          '3.6.0',
          '3.6.1',
          '3.6.2',
          '3.6.3',
          '3.6.4',
          '3.6.5',
          '3.6.6',
          '3.6.7',
          '3.6.8',
          '3.8.0',
          '3.8.1',
          '3.8.2',
          '3.8.3',
          '3.8.4',
          '3.8.5',
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
        return 'pne_version';
    }
}