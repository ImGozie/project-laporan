<?php

namespace App\Models;

use CodeIgniter\Model;

class Users extends Model
{
    protected $table = 'users as a';

    protected $allowedFields = [
        'username',
        'password',
        'email',
        'login_method',
        'oauth_provider_id',
        'profile',
        'role',
        'created_date'
    ];

    public function store($data)
    {
        return $this->insert($data);
    }

    public function getUserByUsername($username)
    {
        return $this->where('username', $username)->first();
    }

    public function datatables()
    {
        return $this->db->table($this->table)
            ->select('a.userid, a.username, a.password, a.email, a.login_method, a.role');
    }

    public function getTableConfig()
    {
        return [
            'searchable' => ['username', 'email'],
            'orderBy' => ['userid', 'username', 'email', 'password', 'login_method', 'role'],
        ];
    }

    public function getOne($id = '')
    {
        $x = $this->builder;
        if ($id != '') $x->where('id', $id);
        return $x->get()->getRow();
    }
    // public function getDatatables($keyword = null, $start = 0, $length = 0 , $order = null, $searchable = [], $orderBy = [])
    // {
    //     $builder = $this->db->table('users');
    //     if ($keyword) {
    //         $spaceFilter = explode(' ', $keyword);
    //         $columns = $searchable;

    //         foreach ($spaceFilter as $filter) {
    //             foreach ($columns as $column) {
    //                 $builder = $builder->orLike($column, $filter);
    //             }
    //         }
    //     }
    //     if ($order && isset($order['column']) && isset($order['dir'])) {
    //         $columns = $orderBy;
    //         $columnIndex = $order['column'];
    //         $direction = $order['dir'];
    //         $builder->orderBy($columns[$columnIndex], $direction);
    //     }
    //     if (!empty($start) || !empty($length)) {
    //         $builder = $builder->limit($length, $start);
    //     }
    //     return $builder->get()->getResult();
    // }

    // public function countAllData()
    // {
    //     return $this->countAllResults();
    // }
}
