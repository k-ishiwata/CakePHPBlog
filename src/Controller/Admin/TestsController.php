<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

class TestsController extends AppController
{
    public $autoRender = false;

    public function index()
    {
        echo "管理画面";
    }
}
