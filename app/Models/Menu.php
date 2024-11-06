<?php

namespace App\Models;

use CodeIgniter\Model;

class Menu extends Model
{
    function getMenu()
    {
        $menu = [
            ['id' => 1, 'name' => 'dashboard', 'icon' => 'fa-chart-simple', 'url' => 'dashboard'],
            ['id' => 2, 'name' => 'master data', 'icon' => 'fa-database', 'url' => 'about'],
            ['id' => 3, 'name' => 'user / siswa', 'icon' => 'fa-users', 'url' => 'users']
        ];

        return json_encode($menu);
    }
}
