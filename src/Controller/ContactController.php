<?php

namespace App\Controller;

use App\Controller\AppController;
use App\Form\ContactForm;

class ContactController extends AppController
{
    public function index()
    {
        $contact = new ContactForm();
        // $contact->setErrors(['email' => ['_required' => 'メールアドレスは必須です']]);

        $isValid = $contact->validate($this->request->getData());
        // $isValid = $form->validate($this->request->getData());

        if (!$isValid) {
            var_dump($isValid);
        }

        // ここでよい??
        $errors = $contact->errors();
        if ($errors) {
            var_dump($errors);
        }

        if ($this->request->is('post')) {
            if ($contact->execute($this->request->getData())) {
                $this->Flash->success('すぐにご連絡いたします');
            } else {
                $this->Flash->error('フォーム送信に問題がありました');
            }
        }

        if ($this->request->is('get')) {
            // 例：ユーザーモデルの値
            $this->request->data('name', 'John Doe');
            $this->request->data('email', 'john.doe@example.com');
        }
        $this->set('contact', $contact);
    }
}