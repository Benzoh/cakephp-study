<?php

namespace App\Controller;

use App\Controller\AppController;

class HeloController extends AppController {

    // http://localhost:8765/helo
    // http://localhost:8765/helo/index
    // http://192.168.100.100/helo/index/abc/test
    public function index($a = '', $b = '') {
        if ($a == '') {
            $this->setAction('err'); // 何も出力されていないときに使う
            return; // 必ずリターン
        }
        $this->autoRender = false; // テンプレートを使わない
        echo "<html><head></head><body>";
        echo "<h1>Hello!</h1>";
        echo "<p>Sample Page.</p>";
        if ($a != '') {
            echo "パラメータA：" . $a;
        }
        if ($b != '') {
            echo "パラメータB：" . $b;
        }
        echo "</body></html>";
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
