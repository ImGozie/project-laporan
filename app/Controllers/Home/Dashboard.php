<?php

namespace App\Controllers\Home;

use App\Controllers\BaseController;
use App\Models\Menu;
use CodeIgniter\HTTP\ResponseInterface;

class Dashboard extends BaseController
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
        return view('Home/Dashboard', $data);
    }
}
