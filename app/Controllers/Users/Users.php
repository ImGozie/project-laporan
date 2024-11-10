<?php

namespace App\Controllers\Users;

use App\Controllers\BaseController;
use App\Models\Menu;
use App\Models\Users as ModelsUsers;
use App\Helpers\DatatableHelper;
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
        $param['draw'] = isset($_REQUEST['draw']) ? $_REQUEST['draw'] : '';
        $keyword = isset($_REQUEST['search']['value']) ? $_REQUEST['search']['value'] : '';
        $start = isset($_REQUEST['start']) ? $_REQUEST['start'] : '';
        $length = isset($_REQUEST['length']) ? $_REQUEST['length'] : '';
        $order = $_REQUEST['order'][0] ?? null;
        
        $searchable = ['username', 'email', 'password', 'login_method', 'role'];
        $orderBy = ['userid', 'username', 'email', 'password', 'login_method', 'role'];

        $table_selected = 'users';
        $result = DatatableHelper::getDatatablesAndTotal(
            $table_selected,
            $keyword,
            $start,
            $length,
            $order,
            $searchable,
            $orderBy
        );

        $output = array(
            'draw' => intval($param['draw']),
            'recordsTotal' => $result['total'],
            'recordsFiltered' => $result['total'],
            'data' => $result['data']
        );
        echo json_encode($output);
    }
}
