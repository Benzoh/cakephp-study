<?php

namespace App\Controller;

use App\Controller\AppController;

class PersonsController extends AppController {

    public function add() {
        if ($this->request->is('post')) {
            $person = $this->Persons->newEntity();
            $person = $this->Persons->patchEntity($person, $this->request->data);
            if ($this->Persons->save($person)) {
                return $this->redirect(['action' => 'index']);
            }
        }
    }

    public function index() {
        $this->set('persons', $this->Persons->find('all'));
    }

    public function edit($id = null) {
        $person = $this->Persons->get($id);
        if ($this->request->is(['post', 'put'])) {
            $person = $this->Persons->patchEntity($person, $this->request->data);
            if ($this->Persons->save($person)) {
                return $this->redirect(['action' => 'index']);
            }
        } else {
            $this->set('person', $person);
        }
    }

    public function delete($id = null) {
        $person = $this->Persons->get($id);
        if ($this->request->is(['post', 'put'])) {
            if ($this->Persons->delete($person)) {
                return $this->redirect(['action' => 'index']);
            }
        } else {
            $this->set('person', $person);
        }
    }

    public function find() {
        $this->set('msg', null);
        $persons = [];
        if ($this->request->is('post')) {
            $find = $this->request->data['find'];
            $query = $this->Persons->find();
            $exp = $query->newExpr();
            $fnc = function($exp, $find) {
                return $exp->gte('age', $find * 1);
            };
            $persons = $query->where($fnc($exp, $find));
        }
        $this->set('persons', $persons);
        $this->set('msg', null);
    }
}
