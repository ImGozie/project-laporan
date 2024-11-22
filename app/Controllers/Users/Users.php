<?php

namespace App\Controllers\Users;

use App\Controllers\BaseController;
use App\Models\Menu;
use App\Models\Users as ModelsUsers;
use App\Helpers\DatatableHelper;
use App\Helpers\RequestHelper;
use Exception;
use CodeIgniter\HTTP\ResponseInterface;

require_once APPPATH . 'Helpers/EncryptionHelper.php';

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

    public function forms($id = '')
    {
        $formType = (empty($id) ? 'add' : 'edit');
        if ($id != '') $id = decrypting($id);
        $data = [
            'id' => encrypting($id),
            'formType' => $formType,
            'res' => $this->users->getOne($id),
        ];
        return view('users/form', $data);
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
        array_map(function ($row) {
            $row->action = '
                <div class="flex whitespace-nowrap items-center justify-center">
                    <button onclick="openModal(\'Edit User - ' . $row->username . '\', \'' . site_url('users/form/' . encrypting($row->userid)) . '\')" class="inline-flex items-center justify-center  min-w-7 min-h-8 !text-gozi-950 rounded-l-lg">
                        <span>
                            <i class="fa-solid fa-pen"></i>
                        </span>
                    </button>
                    <button onclick="modalDelete(\'Delete User ' . $row->username . '\', \'' . site_url('users/delete') . '\', \'' . encrypting($row->userid) . '\')" class="min-w-7 min-h-8 text-gozi-950 rounded-r-lg" data-id="' . $row->userid . '"><i class="fa-solid fa-trash mx-0.5"></i></button>
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

    public function addUser()
    {
        $username = $this->request->getPost('username');
        $role = $this->request->getPost('role');
        $password = $this->request->getPost('password');
        try {
            $data = [
                'username' => $username,
                'role' => $role,
                'password' => password_hash($password, PASSWORD_BCRYPT),
                'login_method' => 'local',
                'created_date' => date('Y-m-d H:i:s'),
            ];
            $this->users->store($data);
            $response = [
                'success' => true,
                'message' => 'User added successfully'
            ];
        } catch (Exception $e) {
            $response['message'] = 'Failed to add user: ' . $e->getMessage();
        }
        return $this->response->setJSON($response);
    }

    public function updateUser()
    {
        $userId = decrypting($this->request->getPost('id'));
        $username = $this->request->getPost('username');
        $role = $this->request->getPost('role');
        $password = $this->request->getPost('password');
        $response = array();
        try {
            if (empty($userId)) {
                throw new Exception("User ID is required.");
            }
            $data = [
                'username' => $username,
                'role' => $role,
                'password' => password_hash($password, PASSWORD_BCRYPT),
            ];
            $this->users->updateUser($userId, $data);
            $response = [
                'success' => true,
                'message' => 'User updated successfully'
            ];
        } catch (Exception $e) {
            $response = [
                'success' => '0',
                'message' => $e->getMessage(),
            ];
        }

        return $this->response->setJSON($response);
    }

    public function deleteUser()
    {
        $id = decrypting($this->request->getPost('id'));
        $res = array();
        try {
            if (empty($id)) {
                throw new Exception("User ID is required.");
            }
            $this->users->destroy($id);
            $res = [
                'success' => true,
                'message' => 'User successfully deleted.',
                'trace' => db_connect()->error(),
            ];
        } catch (Exception $e) {
            $res = [
                'success' => false,
                'message' => $e->getMessage(),
            ];
        }
        // $res['csrfToken'] = csrf_hash();
        return $this->response->setJSON($res);
    }
}
