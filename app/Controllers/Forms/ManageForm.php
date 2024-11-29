<?php

namespace App\Controllers\Forms;

use App\Controllers\BaseController;
use App\Models\Forms\FormsModel;
use App\Models\Menu;
use App\Helpers\DatatableHelper;
use App\Helpers\RequestHelper;
use Exception;
require_once APPPATH . 'Helpers/EncryptionHelper.php';

class ManageForm extends BaseController
{
    public function __construct()
    {
        $this->forms = new FormsModel();
        $this->menu = new Menu();
    }

    public function index()
    {
        $data = [
            'menu' => json_decode($this->menu->getMenu()),
        ];
        return view('Forms/v_manageform', $data);
    }

    public function getFormData()
    {
        $builder = $this->forms->datatables();
        $config = $this->forms->getTableConfig();
        $params = RequestHelper::getDatatableRequest();

        $result = DatatableHelper::getDatatablesAndTotal(
            $builder,
            $config,
            $params
        );
        array_map(function ($row) {
            switch ($row->currentjobfrom) {
                case 1:
                    $row->currentjobfrom = 'BKI SKARIGA';
                    break;
                case 2:
                    $row->currentjobfrom = 'BKK SMK Lainya';
                    break;
                case 3:
                    $row->currentjobfrom = 'SOSIAL MEDIA';
                    break;
                default:
                    $row->currentjobfrom = '-';
                    break;
            }
            $row->action = '
                <div class="flex whitespace-nowrap items-center justify-center">
                    <button onclick="openModal(\'Edit Form - ' . $row->fullname . '\', \'' . site_url('jurusan/form/' . encrypting($row->id)) . '\')" class="inline-flex items-center justify-center  min-w-7 min-h-8 !text-gozi-950 rounded-l-lg">
                        <span>
                            <i class="fa-solid fa-pen"></i>
                        </span>
                    </button>
                    <button onclick="modalDelete(\'Delete Form ' . $row->fullname . '\', \'' . site_url('jurusan/delete') . '\', \'' . encrypting($row->id) . '\')" class="min-w-7 min-h-8 text-gozi-950 rounded-r-lg"><i class="fa-solid fa-trash mx-0.5"></i></button>
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
}
