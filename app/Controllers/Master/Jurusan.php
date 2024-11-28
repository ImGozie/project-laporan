<?php

namespace App\Controllers\Master;

use App\Controllers\BaseController;
use App\Models\Master\Msjurusan;
use App\Models\Menu;
use App\Helpers\DatatableHelper;
use App\Helpers\RequestHelper;
use Exception;
require_once APPPATH . 'Helpers/EncryptionHelper.php';
use CodeIgniter\HTTP\ResponseInterface;

class Jurusan extends BaseController
{
    public function __construct()
    {
        $this->menu = new Menu();
        $this->jurusan = new Msjurusan();
    }

    public function index()
    {
        $data = [
            'menu' => json_decode($this->menu->getMenu()),
        ];
        return view('Master/jurusan/v_jurusan', $data);
    }

    public function forms($id = '')
    {
        $formType = (empty($id) ? 'add' : 'edit');
        if ($id != '') $id = decrypting($id);
        $data = [
            'id' => encrypting($id),
            'formType' => $formType,
            'res' => $this->jurusan->getOne($id),
        ];
        return view('Master/jurusan/form', $data);
    }

    public function getJurusanData()
    {
        $builder = $this->jurusan->datatables();
        $config = $this->jurusan->getTableConfig();
        $params = RequestHelper::getDatatableRequest();

        $result = DatatableHelper::getDatatablesAndTotal(
            $builder,
            $config,
            $params
        );
        array_map(function ($row) {
            $row->action = '
                <div class="flex whitespace-nowrap items-center justify-center">
                    <button onclick="openModal(\'Edit Jurusan - ' . $row->majorname . '\', \'' . site_url('jurusan/form/' . encrypting($row->id)) . '\')" class="inline-flex items-center justify-center  min-w-7 min-h-8 !text-gozi-950 rounded-l-lg">
                        <span>
                            <i class="fa-solid fa-pen"></i>
                        </span>
                    </button>
                    <button onclick="modalDelete(\'Delete Jurusan ' . $row->majorname . '\', \'' . site_url('jurusan/delete') . '\', \'' . encrypting($row->id) . '\')" class="min-w-7 min-h-8 text-gozi-950 rounded-r-lg"><i class="fa-solid fa-trash mx-0.5"></i></button>
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

    public function addJurusan()
    {
        $majorname = $this->request->getPost('majorname');
        try {
            $data = [
                'majorname' => $majorname,
                'created_date' => date('Y-m-d H:i:s'),
            ];
            $this->jurusan->store($data);
            $response = [
                'success' => true,
                'message' => 'Added successfully'
            ];
        } catch (Exception $e) {
            $response['message'] = 'Failed to add : ' . $e->getMessage();
        }
        return $this->response->setJSON($response);
    }

    public function updateJurusan()
    {
        $id = decrypting($this->request->getPost('id'));
        $majorname = $this->request->getPost('majorname');
        $response = array();
        try {
            if (empty($id)) {
                throw new Exception("ID is required.");
            }
            $data = [
                'majorname' => $majorname,
                'updated_date' => date('Y-m-d H:i:s'),
            ];
            $this->jurusan->edit($id, $data);
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

    public function deleteJurusan()
    {
        $id = decrypting($this->request->getPost('id'));
        $res = array();
        try {
            if (empty($id)) {
                throw new Exception("ID is required.");
            }
            $this->jurusan->destroy($id);
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
        $results = $this->jurusan->getSelect($search);
        $data = [];
        foreach ($results as $row) {
            $data[] = [
                'id' => encrypting($row['id']),
                'text' => $row['majorname']
            ];
        }
        return $this->response->setJSON($data);
    }
}
