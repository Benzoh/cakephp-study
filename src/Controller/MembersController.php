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

    public function add() {
        $member = $this->Members->newEntity();
        if ($this->request->is('post')) {
            $member = $this->Members->patchEntity($member, $this->request->data);
            if ($this->Members->save($member)) {
                $this->Flash->success(__('The member has been saved.'));
                return $this->redirect(['action' =>'index']);
            } else {
                $this->Flash->error(
                    __('The member could not be saves.')
                );
            }
        }
        $this->set(compact('member'));
        $this->set('_serialize', ['member']);
    }

    public function edit($id = null) {
        $member = $this->Members->get($id, ['contain' => []]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $member = $this->Members->patchEntity($member, $this->request->data);
            if ($this->Members->save($member)) {
                $this->Flash->success(__('The member has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The member could not be saved.'));
            }
        }
        $this->set(compact('member'));
        $this->set('_serialize', ['member']);
    }

    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $member = $this->Members->get($id);
        if ($this->Members->delete($member)) {
            $this->Flash->success(__('The member has been deleted.'));
        } else {
            $this->Flash->error(__('The member could not be deleted.'));
        }
        return $this->redirect(['action' => 'index']);
    }

}
