<?php

namespace App\Controllers\Users;

use App\Controllers\BaseController;
use App\Models\Menu;
use App\Models\Users as ModelsUsers;
use App\Helpers\DatatableHelper;
use App\Helpers\RequestHelper;
use CodeIgniter\HTTP\ResponseInterface;

class Users extends BaseController
{
    public function __construct()
    {
        $this->menu = new Menu();
        $this->users = new ModelsUsers();
    }

    public function index()
    {
        $data = [
            'menu' => json_decode($this->menu->getMenu()),
        ];
        return view('users/v_user', $data);
    }

    public function getUsersData()
    {
        $builder = $this->users->datatables();
        $config = $this->users->getTableConfig();
        $params = RequestHelper::getDatatableRequest();

        $result = DatatableHelper::getDatatablesAndTotal(
            $builder,
            $config,
            $params
        );
        array_map(function($row) {
            $row->action = '
                <div class="flex whitespace-nowrap items-center justify-center">
                    <a href="' . site_url('users/edit/' . $row->userid) . '" class="inline-flex items-center justify-center  min-w-7 min-h-8 !text-gozi-950 rounded-l-lg">
                        <span>
                            <i class="fa-solid fa-pen"></i>
                        </span>
                    </a>
                    <button class="min-w-7 min-h-8 text-gozi-950 rounded-r-lg" data-id="' . $row->userid . '"><i class="fa-solid fa-trash mx-0.5"></i></button>
                </div>
            ';
            if ($row->role === 'admin') {
                $row->role = '<span class="inline-flex bg-gozi-400 text-gozi-50 shadow-md min-w-14 min-h-7 items-center justify-center rounded-md">Admin</span>';
            } else {
                $row->role = '<span class="inline-flex bg-gozi-100 text-gozi-500 shadow-md min-w-14 min-h-7 items-center justify-center rounded-md">User</span>';
            }
        }, $result['data']);
        $output = array(
            'draw' => intval($params['draw']),
            'recordsTotal' => $result['total'],
            'recordsFiltered' => $result['total'],
            'data' => $result['data']
        );
        echo json_encode($output);
    }
}
