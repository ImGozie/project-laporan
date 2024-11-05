<?php

namespace App\Controllers\Home;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Dashboard extends BaseController
{
    public function index()
    {
        $dataMenu = $this->menuJson();
        $data = [
            'menu' => json_encode($dataMenu),
        ];
        return view('Home/Dashboard', $data);
    }

    public function menuJson()
    {
        return [
            ['id' => 1, 'name' => 'dashboard', 'icon' => 'fa-chart-simple', 'url' => '/home'],
            ['id' => 2, 'name' => 'master data', 'icon' => 'fa-database', 'url' => '/about'],
            ['id' => 3, 'name' => 'user / siswa', 'icon' => 'fa-users', 'url' => '/contact']
        ];
    }
}
