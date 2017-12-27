<?php

namespace App\Controller;

use App\Controller\AppController;

class HeloController extends AppController {

    // http://localhost:8765/helo
    // http://localhost:8765/helo/index
    public function index() {
        // $str = $this->request->data('text1');
        // // リクエスト方法のチェック
        // var_dump($this->request->is('post'));
        // if ($str != null) {
        //     $this->set('message', 'you typed' . $str);
        // } else {
        //     $this->set('message', 'please type...');
        // }

        $id = $this->request->query('id');
        $name = $this->request->query('name');
        $this->set('message', 'your id:' . $id . ', name:' . $name);

        // http://192.168.100.100/helo/index?id=1001&name=john
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
