<?php

namespace Acl\Form;

use Zend\Form\Form,
    Zend\Form\Element;

class Privilege extends Form
{
    protected $roles;
    protected $resources;

    public function __construct($name = null, array $roles = null, array $resources = null)
    {
        parent::__construct('resource');
        $this->roles = $roles;
        $this->resources = $resources;

        $this->setAttributes(['method' => 'post', 'class' => 'form-horizontal']);

        $id = new Element\Hidden('id');
        $this->add($id);

        $nome = new Element\Text('nome');
        $nome->setAttributes(['class' => 'form-control', 'placeholder' => 'Entre com o nome']);
        $this->add($nome);

        $role = new Element\Select();
        $role->setName('role')
            ->setAttributes(['class' => 'form-control'])
            ->setOptions(array('value_options' => $roles));
        $this->add($role);

        $resource = new Element\Select();
        $resource->setName('resource')
            ->setAttributes(['class' => 'form-control'])
            ->setOptions(array('value_options' => $resources));
        $this->add($resource);

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