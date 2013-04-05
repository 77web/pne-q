<?php

namespace My\Field;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class DeviceType extends AbstractType
{
    public function __construct()
    {
        $devices = array(
          'pc' => 'pc',
          'mobile' => 'mobile',
          'smartphone' => 'smartphone',
          'cli' => 'cli',
          'mail' => 'mail',
        );
        
        $this->choices = array();
        foreach ($devices as $name)
        {
            $this->choices[$name] = $name;
        }
    }
    
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'choices' => $this->choices,
            'expanded' => true,
            'multiple' => true,
        ));
    }
    
    public function getParent()
    {
        return 'choice';
    }
    
    public function getName()
    {
        return 'device';
    }
}