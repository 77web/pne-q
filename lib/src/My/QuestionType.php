<?php

namespace My;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\Validator\Constraints as Assert;
use My\Field\DeviceType;
use My\Field\PhpVersionType;
use My\Field\PneVersionType;
use My\Field\ServerType;
use My\Field\TargetAreaType;

abstract class QuestionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
          ->add('pne_version', new PneVersionType(), array('required' => false))
          ->add('target', new TargetAreaType(), array('required' => false))
          ->add('device', new DeviceType(), array('required' => false))
          ->add('server', new ServerType(), array('required' => false))
          ->add('php_version', new PhpVersionType(), array('required' => false))
          ->add('description', 'textarea', array('constraints' => new Assert\NotBlank()))
          ->add('pne_url', 'text', array('required' => false))
          ->add('reference_urls', 'textarea', array('required' => false))
          ->add('error_message', 'textarea', array('required' => false))
        ;
    }
    
    public function getName()
    {
        return 'question';
    }
    
    public function finishView(FormView $view, FormInterface $form, array $options)
    {
        $view->children['description']->vars['help'] = '「いつ・どの画面で・何を・どのようにしたとき、何が・どうなった」がわかるように、行った作業内容や操作内容を具体的に書いてください。';
    }
}