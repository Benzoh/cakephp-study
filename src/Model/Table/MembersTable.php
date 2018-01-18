<?php

namespace App\Model\Table;

use App\Model\Entity\Member;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class MembersTable extends Table {

    public function initialize(array $config) {
        parent::initialize($config);

        $this->table('members');
        $this->displayField('name');
        $this->primaryKey('id');

        // 注意：複数形になる。
        $this->hasMany('Messages', [
            'foreignKey' => 'members_id'
        ]);
    }

    public function validationDefault(Validator $validator) {
        $validator
            ->add('id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->allowEmpty('mail');

        return $validator;
    }

}
