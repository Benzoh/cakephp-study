<?php

namespace App\Controller;

use App\Controller\AppController;
use App\Form\ContactForm;

class ContactController extends AppController
{
    public function index()
    {
        $contact = new ContactForm();

        $isValid = $contact->validate($this->request->getData());
        // $isValid = $form->validate($this->request->getData());

        if ($isValid) {
            var_dump('>>> validation done.');
            var_dump($isValid);
        }

        if ($this->request->is('post')) {
            if ($contact->execute($this->request->getData())) {
                $this->Flash->success('すぐにご連絡いたします');
            } else {
                $this->Flash->error('フォーム送信に問題がありました');
            }
        }
        $this->set('contact', $contact);
    }
}