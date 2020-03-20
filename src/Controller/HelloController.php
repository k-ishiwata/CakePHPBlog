<?php
namespace App\Controller;

class HelloController extends AppController
{
    // public $autoRender = false;

    public function index()
    {
        $message = "あいうえお";
        $message2 = "000";
        $this->set(compact(['message', 'message2']));
    }


}
