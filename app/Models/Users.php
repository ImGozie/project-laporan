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
        'created_date'
    ];

    public function store($data)
    {
        return $this->insert($data);
    }
}
