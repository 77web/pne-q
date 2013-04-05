<?php

namespace My\Field;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ServerType extends AbstractType
{
    public function __construct()
    {
        $servers = array(
          'sakura.ne.jp',
          'coreserver',
          'xrea',
          'cowboy',
          'chikappa',
          'heteml',
          'vps',
          'private',
          'home',
          'xampp',
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
    
    public function buildView(FormView $view, FormInterface $form, array $options)
    {
        $view->vars['help'] = '利用しているサーバーが下記にない場合は説明の中に利用しているサーバー環境を記載してください。VPS・専用サーバー・自宅サーバーの場合はOS等も説明に記入すると回答が得られやすくなります。';
    }
}