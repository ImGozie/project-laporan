<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AuthCheck implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if (empty(session()->get('userid'))) {
            return redirect()->to('/');
        }
        
        $role = session()->get('role');
        $uri = $request->getUri()->getPath();

        if ($role === 'user' && strpos($uri, 'forms') === false) {
            return redirect()->to('/forms');
        }

        if ($role === 'admin' && strpos($uri, 'forms') !== false) {
            return redirect()->to('/dashboard');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something
    }
}
