<?php

namespace App\Controllers\Master;

use App\Controllers\BaseController;
use App\Models\Menu;
use CodeIgniter\HTTP\ResponseInterface;

class Main extends BaseController
{
    public function __construct()
    {
        $this->menu = new Menu();
    }

    public function index()
    {
        $data = [
            'menu' => json_decode($this->menu->getMenu()),
        ];
        return view('Master/Main/v_main', $data);
    }
}
