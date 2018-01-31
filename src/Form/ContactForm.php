<?php

namespace App\Form;

use Cake\Form\Form;
use Cake\Form\Schema;
use Cake\Validation\Validator;

class ContactForm extends Form
{
    protected function _buildSchema(Schema $schema)
    {
        return $schema->addField('name', 'string')
            ->addField('email', ['type' => 'string'])
            ->addField('body', ['type' => 'text']);
    }

    protected function _buildValidator(Validator $validator)
    {
        return $validator->add('name', 'length', [
                'rule' => ['minlength', 10],
                'message' => '名前は必須です'
            ])->add('email', 'format', [
                'rule' => 'email',
                'message' => '有効なメールアドレスが要求されます',
            ]);
    }

    protected function _execute(array $data)
    {
        // メール送信する
        return true;
    }
}