<?php

namespace User\Form;

use Zend\Form\Form;

class User extends Form
{
    public function __construct($name = null, $options = array())
    {
        parent::__construct('user', $options);

        $this->setInputFilter(new UserFilter());

        $this->setAttributes(['method' => 'post', 'class' => 'form-horizontal']);

        $id = new \Zend\Form\Element\Hidden('id');
        $this->add($id);

        $nome = new \Zend\Form\Element\Text('nome');
        $nome->setAttributes(['class' => 'form-control', 'placeholder' => 'Entre com o nome']);
        $this->add($nome);

        $email = new \Zend\Form\Element\Email('email');
        $email->setAttributes(['class' => 'form-control', 'placeholder' => 'Entre com o e-mail']);
        $this->add($email);

        $password = new \Zend\Form\Element\Password('password');
        $password->setAttributes(['class' => 'form-control', 'placeholder' => 'Entre com a senha']);
        $this->add($password);

        $confirmation = new \Zend\Form\Element\Password('confirmation');
        $confirmation->setAttributes(['class' => 'form-control', 'placeholder' => 'Redigite a senha']);
        $this->add($confirmation);

        $csrf = new \Zend\Form\Element\Csrf('security');
        $this->add($csrf);

        $this->add(array(
            'name' => 'submit',
            'type' => 'Zend\Form\Element\Submit',
            'attributes' => array(
                'value' => 'Salvar',
                'class' => 'btn btn-success'
            )
        ));
    }
}