<?php

namespace User\Form;

use Zend\InputFilter\InputFilter;

class UserFilter extends InputFilter
{
    public function __construct()
    {
        $this->add(array(
            'name' => 'nome',
            'required' => true,
            'filters' => array(
                ['name' => 'stripTags'],
                ['name' => 'stringTrim'],
            ),
            'validators' => array(
                ['name' => 'NotEmpty', 'options' => ['messages' => ['isEmpty' => 'Não pode estar em branco!']]]
            )
        ));

        $this->add(array(
            'name' => 'password',
            'required' => true,
            'filters' => array(
                ['name' => 'stripTags'],
                ['name' => 'stringTrim'],
            ),
            'validators' => array(
                ['name' => 'NotEmpty', 'options' => ['messages' => ['isEmpty' => 'Não pode estar em branco!']]]
            )
        ));

        $this->add(array(
            'name' => 'confirmation',
            'required' => true,
            'filters' => array(
                ['name' => 'stripTags'],
                ['name' => 'stringTrim'],
            ),
            'validators' => array(
                ['name' => 'NotEmpty', 'options' => ['messages' => ['isEmpty' => 'Não pode estar em branco!']],
                'name' => 'Identical', 'options' => ['token' => 'password']
                ]
            )
        ));

        $validator = new \Zend\Validator\EmailAddress();
        $validator->setOptions(array('domain' => false));

        $this->add(array(
            'name' => 'email',
            'validators' => array($validator)
        ));
    }
}