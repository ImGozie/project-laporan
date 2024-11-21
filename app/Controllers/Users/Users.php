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

    public function forms($id)
    {
        return view('users/form');
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
                    <button onclick="openModal(\'Edit User - ' . $row->username . '\', \'' . site_url('users/form/' . $row->userid) . '\')" class="inline-flex items-center justify-center  min-w-7 min-h-8 !text-gozi-950 rounded-l-lg">
                        <span>
                            <i class="fa-solid fa-pen"></i>
                        </span>
                    </button>
                    <button class="min-w-7 min-h-8 text-gozi-950 rounded-r-lg" data-id="' . $row->userid . '"><i class="fa-solid fa-trash mx-0.5"></i></button>
                </div>
            ';
            if ($row->role === 'admin') {
                $row->role = '<span class="inline-flex bg-gozi-400 text-gray-50 text-[0.65rem] border-[1px] border-gozi-100 min-w-14 min-h-7 items-center justify-center rounded-md">Admin</span>';
            } else {
                $row->role = '<span class="inline-flex bg-gozi-100 text-gray-500 text-[0.65rem] border-[1px] border-gozi-100 min-w-14 min-h-7 items-center justify-center rounded-md">User</span>';
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
