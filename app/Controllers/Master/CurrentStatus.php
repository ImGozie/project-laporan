<?php

namespace App\Controllers\Master;

use App\Controllers\BaseController;
use App\Models\Master\Mscurrentstatus;
use App\Models\Menu;
use App\Helpers\DatatableHelper;
use App\Helpers\RequestHelper;
use Exception;
require_once APPPATH . 'Helpers/EncryptionHelper.php';
use CodeIgniter\HTTP\ResponseInterface;

class CurrentStatus extends BaseController
{
    public function __construct()
    {
        $this->menu = new Menu();
        $this->currentstatus = new Mscurrentstatus();
    }

    public function index()
    {
        $data = [
            'menu' => json_decode($this->menu->getMenu()),
        ];
        return view('Master/currentstatus/v_currentstatus', $data);
    }

    public function forms($id = '')
    {
        $formType = (empty($id) ? 'add' : 'edit');
        if ($id != '') $id = decrypting($id);
        $data = [
            'id' => encrypting($id),
            'formType' => $formType,
            'res' => $this->currentstatus->getOne($id),
        ];
        return view('Master/currentstatus/form', $data);
    }

    public function getCurrentStatusData()
    {
        $builder = $this->currentstatus->datatables();
        $config = $this->currentstatus->getTableConfig();
        $params = RequestHelper::getDatatableRequest();

        $result = DatatableHelper::getDatatablesAndTotal(
            $builder,
            $config,
            $params
        );
        array_map(function ($row) {
            $row->action = '
                <div class="flex whitespace-nowrap items-center justify-center">
                    <button onclick="openModal(\'Edit Current Status - ' . $row->status . '\', \'' . site_url('currentstatus/form/' . encrypting($row->id)) . '\')" class="inline-flex items-center justify-center  min-w-7 min-h-8 !text-gozi-950 rounded-l-lg">
                        <span>
                            <i class="fa-solid fa-pen"></i>
                        </span>
                    </button>
                    <button onclick="modalDelete(\'Delete Current Status ' . $row->status . '\', \'' . site_url('currentstatus/delete') . '\', \'' . encrypting($row->id) . '\')" class="min-w-7 min-h-8 text-gozi-950 rounded-r-lg"><i class="fa-solid fa-trash mx-0.5"></i></button>
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

    public function addCurrentStatus()
    {
        $status = $this->request->getPost('status');
        $desc = $this->request->getPost('desc');
        try {
            $data = [
                'status' => $status,
                'desc' => $desc,
                'created_date' => date('Y-m-d H:i:s'),
            ];
            $this->currentstatus->store($data);
            $response = [
                'success' => true,
                'message' => 'Added successfully'
            ];
        } catch (Exception $e) {
            $response['message'] = 'Failed to add : ' . $e->getMessage();
        }
        return $this->response->setJSON($response);
    }

    public function updateCurrentStatus()
    {
        $id = decrypting($this->request->getPost('id'));
        $status = $this->request->getPost('status');
        $desc = $this->request->getPost('desc');
        $response = array();
        try {
            if (empty($id)) {
                throw new Exception("ID is required.");
            }
            $data = [
                'status' => $status,
                'desc' => $desc,
                'updated_date' => date('Y-m-d H:i:s'),
            ];
            $this->currentstatus->edit($id, $data);
            $response = [
                'success' => true,
                'message' => 'Updated successfully'
            ];
        } catch (Exception $e) {
            $response = [
                'success' => '0',
                'message' => $e->getMessage(),
            ];
        }

        return $this->response->setJSON($response);
    }

    public function deleteCurrentStatus()
    {
        $id = decrypting($this->request->getPost('id'));
        $res = array();
        try {
            if (empty($id)) {
                throw new Exception("ID is required.");
            }
            $this->currentstatus->destroy($id);
            $res = [
                'success' => true,
                'message' => 'Successfully deleted.',
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

    public function getSelect()
    {
        $search = $this->request->getVar('search');
        $results = $this->currentstatus->getSelect($search);
        $data = [];
        foreach ($results as $row) {
            $data[] = [
                'id' => encrypting($row['id']),
                'text' => $row['status']
            ];
        }
        return $this->response->setJSON($data);
    }
}
