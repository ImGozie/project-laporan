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
        foreach ($result['data'] as &$row) {
            $row->action = '
                <a href="' . site_url('users/edit/' . $row->userid) . '" class="btn btn-sm btn-primary">Edit</a>
                <button class="btn btn-sm btn-danger delete-btn" data-id="' . $row->userid . '">Delete</button>
            ';
        }
        $output = array(
            'draw' => intval($params['draw']),
            'recordsTotal' => $result['total'],
            'recordsFiltered' => $result['total'],
            'data' => $result['data']
        );
        echo json_encode($output);
    }
}
