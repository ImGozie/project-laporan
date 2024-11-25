<?php

namespace App\Controllers\Forms;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class FormAlumni extends BaseController
{
    public function index()
    {
        return view('Forms/v_form');
    }
}
