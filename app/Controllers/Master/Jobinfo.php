<?php

namespace App\Controllers\Master;

use App\Controllers\BaseController;
use App\Models\Master\Msjobinfo;
use App\Models\Menu;
use App\Helpers\DatatableHelper;
use App\Helpers\RequestHelper;
use Exception;
require_once APPPATH . 'Helpers/EncryptionHelper.php';

class Jobinfo extends BaseController
{
    public function __construct()
    {
        $this->menu = new Menu();
        $this->jobinf = new Msjobinfo();
    }

    public function index()
    {
        $data = [
            'menu' => json_decode($this->menu->getMenu()),
        ];
        return view('Master/jobinfo/v_jobinfo', $data);
    }

    public function forms($id = '')
    {
        $formType = (empty($id) ? 'add' : 'edit');
        if ($id != '') $id = decrypting($id);
        $data = [
            'id' => encrypting($id),
            'formType' => $formType,
            'res' => $this->jobinf->getOne($id),
        ];
        return view('Master/jobinfo/form', $data);
    }

    public function getJobinfoData()
    {
        $builder = $this->jobinf->datatables();
        $config = $this->jobinf->getTableConfig();
        $params = RequestHelper::getDatatableRequest();

        $result = DatatableHelper::getDatatablesAndTotal(
            $builder,
            $config,
            $params
        );
        array_map(function ($row) {
            $row->action = '
                <div class="flex whitespace-nowrap items-center justify-center">
                    <button onclick="openModal(\'Edit Job Information - ' . $row->info . '\', \'' . site_url('jobinfo/form/' . encrypting($row->id)) . '\')" class="inline-flex items-center justify-center  min-w-7 min-h-8 !text-gozi-950 rounded-l-lg">
                        <span>
                            <i class="fa-solid fa-pen"></i>
                        </span>
                    </button>
                    <button onclick="modalDelete(\'Delete Job Information ' . $row->info . '\', \'' . site_url('jobinfo/delete') . '\', \'' . encrypting($row->id) . '\')" class="min-w-7 min-h-8 text-gozi-950 rounded-r-lg"><i class="fa-solid fa-trash mx-0.5"></i></button>
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

    public function addJobinfo()
    {
        $info = $this->request->getPost('info');
        try {
            $data = [
                'info' => $info,
                'created_date' => date('Y-m-d H:i:s'),
            ];
            $this->jobinf->store($data);
            $response = [
                'success' => true,
                'message' => 'Added successfully'
            ];
        } catch (Exception $e) {
            $response['message'] = 'Failed to add : ' . $e->getMessage();
        }
        return $this->response->setJSON($response);
    }

    public function updateJobinfo()
    {
        $id = decrypting($this->request->getPost('id'));
        $info = $this->request->getPost('info');
        $response = array();
        try {
            if (empty($id)) {
                throw new Exception("ID is required.");
            }
            $data = [
                'info' => $info,
                'updated_date' => date('Y-m-d H:i:s'),
            ];
            $this->jobinf->edit($id, $data);
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

    public function deleteJobinfo()
    {
        $id = decrypting($this->request->getPost('id'));
        $res = array();
        try {
            if (empty($id)) {
                throw new Exception("ID is required.");
            }
            $this->jobinf->destroy($id);
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
}
