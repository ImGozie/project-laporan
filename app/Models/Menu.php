<?php

namespace App\Models;

use CodeIgniter\Model;

class Menu extends Model
{
    function getMenu()
    {
        $menu = [
            ['id' => 1, 'name' => 'dashboard', 'icon' => 'fa-chart-simple', 'url' => 'dashboard', 'type' => 'menu', 'desc' => ''],
            ['id' => 2, 'name' => 'master data', 'icon' => 'fa-database', 'url' => 'master', 'type' => 'menu', 'desc' => ''],
            ['id' => 3, 'name' => 'user / siswa', 'icon' => 'fa-users', 'url' => 'users', 'type' => 'menu', 'desc' => ''],
            ['id' => 4, 'name' => 'jurusan', 'icon' => 'fa-book', 'url' => 'jurusan', 'type' => 'submenu', 'desc' => 'Jurusan saat di SMK PGRI 3 Malang'],
            ['id' => 5, 'name' => 'Current status', 'icon' => 'fa-user-tie', 'url' => 'currentstatus', 'type' => 'submenu', 'desc' => 'Status saat ini'],
            ['id' => 6, 'name' => 'College Status', 'icon' => 'fa-graduation-cap', 'url' => 'collegestatus', 'type' => 'submenu', 'desc' => 'Status Perguruan Tinggi '],
            ['id' => 7, 'name' => 'Job Information', 'icon' => 'fa-circle-info', 'url' => 'jobinformation', 'type' => 'submenu', 'desc' => 'Mendapatkan informasi Pekerjaan dari mana ?'],
        ];

        return json_encode($menu);
    }
}
