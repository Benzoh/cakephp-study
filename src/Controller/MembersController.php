<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;
use Cake\Validation\Validator;

class MembersController extends AppController {

    public $paginate = [
        'limit' => 5,
        'order' => [
            'Persons.name' => 'asc'
        ]
    ];

    public $helpers = [
        'Paginator' => ['templates' => 'paginator-templates']
    ];

    public function initialize() {
        parent::initialize();
        $this->loadComponent('Paginator');
    }

    public function index() {
        $this->set('members', $this->paginate($this->Members));
        $this->set('_serialize', ['members']);
    }

    public function view($id = null) {
        $member = $this->Members->get($id, [
            'contain' => ['Messages']
        ]);
        $this->set('member', $member);
        $this->set('_serialize', ['member']);
    }

}
