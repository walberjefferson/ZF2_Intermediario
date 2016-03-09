<?php

namespace Acl\Form;

use Zend\Form\Form,
    Zend\Form\Element;

class Resource extends Form
{
    public function __construct($name = null)
    {
        parent::__construct('resource');

        $this->setAttributes(['method' => 'post', 'class' => 'form-horizontal']);

        $id = new Element\Hidden('id');
        $this->add($id);

        $nome = new Element\Text('nome');
        $nome->setAttributes(['class' => 'form-control', 'placeholder' => 'Entre com o nome']);
        $this->add($nome);

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