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
        $username   = $this->request->getPost('username');
        $password   = $this->request->getPost('password') ?? '';
        $user       = $this->m_user->where('username', $username)->first();
        if ($user) {
            $verify = password_verify($password, $user->password);
            if ($verify) {
                session()->set([
                    'user_id'   => $user->id,
                    'fullname'  => $user->fullname,
                    'email'     => $user->email,
                    'username'  => $user->username,
                    'role_id'   => $user->role_id,
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
        session()->destroy();
        return redirect()->to(base_url('login'));
    }

    public function userIndex()
    {
        return view('settings/user/user_setting', [
            'title' => "Manage User",
            'users' => $this->m_user->getUser(),
            'roles' => $this->db->table("user_role")->get()->getResult(),
            'validation' => $this->validation,
        ]);
    }

    public function storeUser()
    {
        $input = $this->request->getPost();
        if (!$this->validate([
            'fullname'  => 'required',
            'username'  => 'required|alpha_numeric|is_unique[users.username,id,{id}]',
            'email'     => 'required|is_unique[users.email,id,{id}]',
            'password'  => 'required_without[id]|matches[confirm_password]',
            'role'      => 'required',
        ])) {
            return redirect()->to(base_url('user-setting'))->withInput('validation', $this->validation);
        };
        $store = $this->m_user->storeUser($input);
        $this->flashdataStore($store);
        return redirect()->to(base_url("user-setting"));
    }

    public function deleteUser()
    {
        $id = $this->request->getPost('id');
        return $this->m_user->delete($id);
    }

    public function storeRole()
    {
        if (!$this->validate([
            'role'  => 'required|is_unique[user_role.name,id,{id}]'
        ])) {
            return redirect()->to(base_url('user-setting'))->withInput('validation', $this->validation);
        };
        $input = $this->request->getPost();
        $store = $this->m_user->storeRole($input);
        $this->flashdataStore($store);
        return redirect()->to(base_url("user-setting"));
    }

    public function deleteRole()
    {
        $id = $this->request->getPost('id');
        return $this->db->table('user_role')->delete(['id' => $id]);
    }
}
