<?php

namespace App\Controllers\Users;

use App\Controllers\BaseController;
use App\Models\Menu;
use App\Models\Users as ModelsUsers;
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
        $model = $this->users;

        // Ambil parameter dari DataTables
        $length = (int)$this->request->getVar('length');  // jumlah data per halaman
        $start = (int)$this->request->getVar('start');    // data yang ditampilkan dimulai dari indeks mana
        $search = $this->request->getVar('search')['value'];  // nilai pencarian
        $order = $this->request->getVar('order');  // data sorting
        $orderColumnIndex = $order[0]['column'];  // kolom yang disortir
        $orderDirection = $order[0]['dir'];  // arah penyortiran (asc atau desc)

        // Tentukan kolom yang digunakan untuk penyortiran
        $columns = ['email', 'username'];

        // Jika ada pencarian, filter data berdasarkan pencarian
        if (!empty($search)) {
            $model->groupStart();
            foreach ($columns as $column) {
                $model->orLike($column, $search);
            }
            $model->groupEnd();
        }

        // Sorting berdasarkan kolom yang dipilih
        $model->orderBy($columns[$orderColumnIndex], $orderDirection);

        // Ambil data dari model
        $data = $model->getDatatables($length, $start);

        // Ambil total data
        $totalData = $model->countAllData();
        $filteredData = $model->countAllResults();  // Jumlah data setelah difilter oleh pencarian

        // Format data untuk DataTable (dengan total record dan data)
        $output = [
            "draw" => intval($this->request->getVar('draw')),
            "recordsTotal" => $totalData,
            "recordsFiltered" => $filteredData,
            "data" => [],
        ];

        // Proses data agar sesuai dengan format yang diinginkan DataTables
        foreach ($data as $row) {
            $output['data'][] = [
                $row['email'],
                $row['username'],
                $row['password'],
                $row['login_method'],
                $row['role']
            ];
        }

        return $this->response->setJSON($output);
    }
}
