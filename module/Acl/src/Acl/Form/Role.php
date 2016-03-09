<?php

namespace Acl\Form;

use Zend\Form\Form,
    Zend\Form\Element;

class Role extends Form
{
    protected $parent;
    
    public function __construct($name = null, array $parent = null)
    {
        parent::__construct('roles');
        $this->parent = $parent;        

        $this->setAttributes(['method' => 'post', 'class' => 'form-horizontal']);

        $id = new Element\Hidden('id');
        $this->add($id);

        $nome = new Element\Text('nome');
        $nome->setAttributes(['class' => 'form-control', 'placeholder' => 'Entre com o nome']);
        $this->add($nome);
        
        $allParent = array_merge(array(0 => 'Nenhum'), $this->parent);
        $parent = new Element\Select();
        $parent->setName('parent')
                ->setAttributes(['class' => 'form-control'])
                ->setOptions(array('value_options' => $allParent));
        $this->add($parent);
        
        $isAdmin = new Element\Checkbox('isAdmin');
        $this->add($isAdmin);

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