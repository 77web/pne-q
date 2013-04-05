<?php

namespace My\Field;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ServerType extends AbstractType
{
    public function __construct()
    {
        $servers = array(
          'home',
          'vps',
          'sakura.ne.jp',
          'sakura.vps',
          'coreserver',
          'xrea',
        );
        
        $this->choices = array();
        foreach ($servers as $name)
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
        return 'server';
    }
}