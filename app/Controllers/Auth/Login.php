<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use Google_Client;

class Login extends BaseController
{
    protected $googleAuth;

    public function __construct() 
    {
        $this->googleAuth = new Google_Client();
        $this->googleAuth->setClientId('794897474060-a1rnfqq2s61ptr25kpibcoo2n2pe8k60.apps.googleusercontent.com');
        $this->googleAuth->setClientSecret('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');
        $this->googleAuth->setRedirectUri('http://localhost:8080/login');
    }

    public function index()
    {
        $data['link'] = $this->googleAuth->createAuthUrl();
        return view('Auth/View', $data);
    }
}
