<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;
use Cake\Validation\Validator;

class MessagesController extends AppController {

    public function index() {
        $this->paginate = [
            'contain' => ['Members']
        ];
        $this->set('messages', $this->paginate($this->Messages));
        $this->set('_serialize', ['messages']);
    }

    public function view() {
        $message = $this->Messages->get($id, [
            'contain' => ['Members']
        ]);
        $this->set('message', $message);
        $this->set('_serialize', ['message']);
    }



}
