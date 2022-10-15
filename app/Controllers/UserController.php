<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\User;

class UserController extends BaseController
{
    protected $m_user;
    public function __construct()
    {
        $this->m_user = new User();
    }

    public function login()
    {
        return  view("auth/login", [
            'title' => "Login"
        ]);
    }

    public function verifyUser()
    {
        $username   = htmlspecialchars($this->request->getPost('username'));
        $password   = htmlspecialchars($this->request->getPost('password'));
        $user       = $this->m_user->where('username', $username)->first();
        if ($user) {
            $verify = password_verify($password, $user->password);
            if ($verify) {
                session()->set([
                    'user_id'   => $user->id,
                    'fullname'  => $user->fullname,
                    'email'     => $user->email,
                    'username'  => $user->username,
                    'user_role' => $user->user_role,
                    'isLogin'   => TRUE
                ]);
                return redirect()->to(base_url('/'));
            } else {
                session()->setFlashdata('notif_error', '<b>Your ID or Password is Wrong !</b> ');
                return redirect()->to(base_url());
            }
        } else {
            session()->setFlashdata('notif_error', '<b>Your ID or Password is Wrong!</b> ');
            return redirect()->to(base_url());
        }
    }

    public function logout()
    {
        $this->session->destroy();
        return redirect()->to(base_url('login'));
    }
}
