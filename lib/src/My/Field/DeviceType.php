<?php

namespace My\Field;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
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
            'help' => '',
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
    
    public function buildView(FormView $view, FormInterface $form, array $options)
    {
        $view->vars['help'] = '' != $options['help'] ? $options['help'] : 'なにでSNSを見たときに現象が発生しているのか選択してください。(複数選択可)';
    }
}