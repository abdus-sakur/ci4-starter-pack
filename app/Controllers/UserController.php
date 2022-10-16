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
                return redirect()->to(base_url('dashboard'));
            } else {
                session()->setFlashdata('alert_error', '<b>Username or Password is wrong</b> ');
                return redirect()->to(base_url('login'));
            }
        } else {
            session()->setFlashdata('alert_error', '<b>Username or Password is wrong</b> ');
            return redirect()->to(base_url('login'));
        }
    }

    public function logout()
    {
        $this->session->destroy();
        return redirect()->to(base_url('login'));
    }

    public function userIndex()
    {
        return view('settings/user/user_setting', [
            'title' => "Manage User",
            'users' => $this->m_user->findAll(),
            'roles' => $this->db->table("user_role")->get()->getResult()
        ]);
    }

    public function storeRole()
    {
        $input = $this->request->getPost();
        $store = $this->m_user->storeRole($input);
        session()->setFlashdata($store ? 'alert_success' : 'alert_error', $store ? "Berhasil menambahkan role" : "Gagal menambahkan role, inputan tidak sesuai");
        return redirect()->to(base_url("user-setting"));
    }
}
