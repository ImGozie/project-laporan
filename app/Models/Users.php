<?php

namespace App\Models;

use CodeIgniter\Model;

class Users extends Model
{
    protected $table = 'users';

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

    public function getDatatables($keyword = null, $start = 0, $length = 0)
    {
        $builder = $this->db->table('users');
        if ($keyword) {
            $spaceFilter = explode(' ', $keyword);
            $columns = ['email', 'username'];

            foreach ($spaceFilter as $filter) {
                foreach ($columns as $column) {
                    $builder = $builder->orLike($column, $filter);
                }
            }
        }
        if (!empty($start) || !empty($length)) {
            $builder = $builder->limit($length, $start);
        }
        return $builder->get()->getResult();
    }

    public function countAllData()
    {
        return $this->countAllResults();
    }
}
