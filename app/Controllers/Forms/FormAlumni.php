<?php

namespace App\Controllers\Forms;

use App\Controllers\BaseController;
use App\Models\Forms\FormsModel;
use Exception;
require_once APPPATH . 'Helpers/EncryptionHelper.php';
use CodeIgniter\HTTP\ResponseInterface;

class FormAlumni extends BaseController
{
    public function __construct()
    {
        $this->forms = new FormsModel();
    }

    public function index()
    {
        return view('Forms/v_form');
    }

    public function submitForm()
    {
        $nis = $this->request->getPost('nis');
        $name = $this->request->getPost('name');
        $phone = $this->request->getPost('phone');
        $socialmedia = $this->request->getPost('socialmedia');
        $currentjob = $this->request->getPost('currentjob');
        $year = $this->request->getPost('year');
        $major = decrypting($this->request->getPost('major'));
        $currentstatus = decrypting($this->request->getPost('currentstatus'));
        $jobinfo = decrypting($this->request->getPost('jobinfo'));
        try {
            $data = [
                'nis' => $nis,
                'fullname' => $name,
                'graduationyear' => $year,
                'majorid' => $major,
                'phonenumb' => $phone,
                'socialmedia' => $socialmedia,
                'currentstatusid' => $currentstatus,
                'jobinfoid' => $jobinfo,
                'currentjobfrom' => $currentjob,
                'submit_by' => session()->get('userid'),
                'submit_date' => date('Y-m-d H:i:s'),
            ];
            $this->forms->store($data);
            $response = [
                'success' => true,
                'message' => 'Submit successfully'
            ];
        } catch (Exception $e) {
            $response['message'] = 'Failed to submit : ' . $e->getMessage();
        }
        return $this->response->setJSON($response);
    }

    public function getYears()
    {
        $search = $this->request->getVar('search');
        $startYear = 1988;
        $endYear = date('Y');
        $data = [];

        for ($year = $startYear; $year <= $endYear; $year++) {
            if (empty($search) || strpos((string)$year, $search) !== false) {
                $data[] = ['id' => $year, 'text' => $year];
            }
        }
        usort($data, function ($a, $b) {
            return $b['id'] - $a['id'];
        });
        return $this->response->setJSON($data);
    }
}
