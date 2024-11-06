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

    public function getDatatables($length, $start)
    {
        // Pastikan limit menerima integer
        return $this->select('email, username, password, login_method, role')
                    ->limit($length, $start)
                    ->findAll();
    }

    public function countAllData()
    {
        return $this->countAllResults();
    }
}
