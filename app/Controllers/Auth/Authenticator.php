<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use App\Models\Users;
use CodeIgniter\HTTP\ResponseInterface;
use Google_Client;

class Authenticator extends BaseController
{
    protected $googleAuth;
    protected $users;

    public function __construct()
    {
        session();
        $this->users = new Users();
        $this->googleAuth = new Google_Client();
        $this->googleAuth->setClientId('321888513248-j9ecq1u80mhacd23ma4qt6653q85tj70.apps.googleusercontent.com');
        $this->googleAuth->setClientSecret('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');
        $this->googleAuth->setRedirectUri('http://localhost:8080/login/callback');
        $this->googleAuth->addScope('email');
        $this->googleAuth->addScope('profile');
    }

    public function index()
    {
        $data['link'] = $this->googleAuth->createAuthUrl();
        return view('Auth/View', $data);
    }

    public function oauthProcess()
    {
        $token = $this->googleAuth->fetchAccessTokenWithAuthCode($this->request->getVar('code'));
        if (!isset($token['error'])) {
            $this->googleAuth->setAccessToken($token['access_token']);
            $googleServices = new \Google_Service_Oauth2($this->googleAuth);
            $getInf = $googleServices->userinfo->get();

            $existingUser = $this->users->where('email', $getInf['email'])->first();
            if ($existingUser) {
                session()->set($existingUser);
            } else {
                $data = [
                    'username' => $getInf['name'],
                    'email' => $getInf['email'],
                    'login_method' => 'google',
                    'oauth_provider_id' => $getInf['id'],
                    'profile' => $getInf['picture'],
                    'role' => 'user',
                    'created_date' => date('Y-m-d H:i:s'),
                ];
                $this->users->store($data);
                session()->set($data);
            }
            return redirect()->to('/dashboard');
        }
    }

    public function localProcess()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $user = $this->users->getUserByUsername($username);

        if ($user && password_verify($password, $user['password'])) {
            session()->set([
                'userid' => $user['userid'],
                'username' => $user['username'],
                'email' => $user['email'],
                'role' => $user['role']
            ]);

            if ($user['role'] === 'admin') {
                return redirect()->to('/dashboard');
            } elseif ($user['role'] === 'user') {
                return redirect()->to('/form');
            }
        } else {
            session()->setFlashdata('error', 'Username atau password salah.');
            return redirect()->back()->withInput();
        }
    }

    public function logoutProcess()
    {
        session()->destroy();
        return redirect()->to('/');
    }
}
