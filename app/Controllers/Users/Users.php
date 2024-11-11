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
                <div class="whitespace-nowrap">
                    <a href="' . site_url('users/edit/' . $row->userid) . '" class="text-center bg-yellow-500 py-2 px-1.5 !text-[#F4DFC8] rounded-md mr-1">
                        <span>
                            <i class="fa-solid fa-pen ml-[3px]"></i>
                        </span>
                    </a>
                    <button class="bg-red-500 py-2 px-2 text-[#F4DFC8] rounded-md" data-id="' . $row->userid . '"><i class="fa-solid fa-trash mx-0.5"></i></button>
                </div>
            ';
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
