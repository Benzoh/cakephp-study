<?php

namespace App\Controller;

use App\Controller\AppController;

class HeloController extends AppController {

    // http://localhost:8765/helo
    // http://localhost:8765/helo/index
    // http://192.168.100.100/helo/index/abc/test
    public function index($a = '', $b = '') {
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

}
