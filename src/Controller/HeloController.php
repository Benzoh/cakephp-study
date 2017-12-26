<?php

namespace App\Controller;

use App\Controller\AppController;

class HeloController extends AppController {

    // http://localhost:8765/helo
    // http://localhost:8765/helo/index
    public function index() {
        $this->set('message', 'Helo!');
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
