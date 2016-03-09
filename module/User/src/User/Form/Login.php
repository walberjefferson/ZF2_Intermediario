<?php

namespace User\Form;

use Zend\Form\Form;

class Login extends Form
{
    public function __construct($name = null, $options = array())
    {
        parent::__construct('Login', $options);

        $this->setAttributes(['method' => 'post', 'class' => 'form-horizontal']);

        $email = new \Zend\Form\Element\Email('email');
        $email->setAttributes(['class' => 'form-control', 'placeholder' => 'Entre com o e-mail']);
        $this->add($email);

        $password = new \Zend\Form\Element\Password('password');
        $password->setAttributes(['class' => 'form-control', 'placeholder' => 'Entre com a senha']);
        $this->add($password);

        $this->add(array(
            'name' => 'submit',
            'type' => 'Zend\Form\Element\Submit',
            'attributes' => array(
                'value' => 'Entrar',
                'class' => 'btn btn-success'
            )
        ));
    }
}