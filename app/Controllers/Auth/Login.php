<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use App\Models\Users;
use CodeIgniter\HTTP\ResponseInterface;
use Google_Client;

class Login extends BaseController
{
    protected $googleAuth;
    protected $users;

    public function __construct()
    {
        $this->users = new Users();
        $this->googleAuth = new Google_Client();
        $this->googleAuth->setClientId('794897474060-a1rnfqq2s61ptr25kpibcoo2n2pe8k60.apps.googleusercontent.com');
        $this->googleAuth->setClientSecret('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');
        $this->googleAuth->setRedirectUri('http://localhost:8080/account/callback');
        $this->googleAuth->addScope('email');
        $this->googleAuth->addScope('profile');
    }

    public function index()
    {
        $data['link'] = $this->googleAuth->createAuthUrl();
        return view('Auth/View', $data);
    }

    public function oauthProccess()
    {
        $token = $this->googleAuth->fetchAccessTokenWithAuthCode($this->request->getVar('code'));
        if (!isset($token['error'])) {
            $this->googleAuth->setAccessToken($token['access_token']);
            $googleServices = new \Google_Service_Oauth2($this->googleAuth);
            $getInf = $googleServices->userinfo->get();
            $data = [
                'username' => $getInf['name'],
                'email' => $getInf['email'],
                'login_method' => 'google',
                'oauth_provider_id' => $getInf['id'],
                'profile' => $getInf['picture'],
                'created_date' => date('Y-m-d H:i:s'),
            ];
            $this->users->store($data);

            session()->set($data);
            return redirect()->to('/');
        }
    }

    public function localProcess()
    {

    }
}
