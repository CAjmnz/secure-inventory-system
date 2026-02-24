<?php

namespace App\Controllers;
use App\Models\UserModel;

class Auth extends BaseController
{
    public function login()
    {
        helper(['form']);
        $data = [];

        if ($this->request->getMethod() == 'post') {
            $rules = [
                'email' => 'required|valid_email',
                'password' => 'required|min_length[6]|max_length[255]'
            ];

            if (!$this->validate($rules)) {
                $data['validation'] = $this->validator;
            } else {
                $model = new UserModel();
                $user = $model->where('email', $this->request->getVar('email'))->first();
                
                if ($user && password_verify($this->request->getVar('password'), $user['password'])) {
                    $this->setUserSession($user);
                    return redirect()->to('/dashboard');
                } else {
                    $data['error'] = 'Invalid login credentials';
                }
            }
        }

        echo view('auth/login', $data);
    }

    private function setUserSession($user)
    {
        $data = [
            'id' => $user['id'],
            'name' => $user['name'],
            'email' => $user['email'],
            'role' => $user['role'],
            'isLoggedIn' => true,
        ];

        session()->set($data);
        return true;
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}