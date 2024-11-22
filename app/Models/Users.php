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
        $x = $this->db->table($this->table);
        if ($id != '') $x->where('userid', $id);
        return $x->get()->getRow();
    }

    public function store($data)
    {
        return $this->insert($data);
    }

    public function updateUser($id, $data)
    {
        $this->db->table($this->table)->where('userid', $id)->update($data);
    }

    public function destroy($id)
    {
        return $this->db->table($this->table)->delete(['userid' => $id]);
    }
}
