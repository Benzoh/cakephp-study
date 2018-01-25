<?php

namespace App\Controller;

use App\Controller\AppController;

class HeloController extends AppController {

    public function initialize() {
        parent::initialize();
        $this->viewBuilder()->layout('sample');
        $this->set('header', '* this is sample site *');
        $this->set('footer', 'copyright 2018');
    }

    // http://localhost:8765/helo
    // http://localhost:8765/helo/index
    public function index() {
        $msg = "これは、サンプルアクションです。";
        $this->set('message', $msg);

        // $str = $this->request->data('text1');
        // // // リクエスト方法のチェック
        // // var_dump($this->request->is('post'));

        // $msg = 'typed:' . $str;
        // if ($str == null) {
        //     $msg = 'please type...';
        // }
        // $this->set('message', $msg);

        // $id = $this->request->query('id');
        // $name = $this->request->query('name');
        // $this->set('message', 'your id:' . $id . ', name:' . $name);
        // // http://192.168.100.100/helo/index?id=1001&name=john
    }

    // 最初redirect()と書いたがエラー。予約語かな。
    // 単語は連結で大文字書きが強制される？
    public function redirectTest() {
        $this->autoRender = false; // テンプレートを使わない
        $this->redirect('/helo/test');
    }

    public function test() {
        $this->autoRender = false; // テンプレートを使わない
        echo 'test';
    }

    public function err() {
        $this->autoRender = false; // テンプレートを使わない
        echo "<p>パラメータがありません。</p>";
    }

}
