<?php

namespace App\Models;

use CodeIgniter\Model;

class User extends Model
{
    protected $table            = 'users';
    protected $returnType       = 'object';
    protected $allowedFields    = ['fullname', 'username', 'email', 'password', 'user_role', 'avatar'];

    public function storeRole($input)
    {
        if (isset($input['id'])) :
            return $this->db->table("user_role")->update([
                'name' => $input['role'],
                'updated_at' => date("Y-m-d h:i:s")
            ], ['id' => $input['id']]);
        else :
            return $this->db->table("user_role")->insert([
                'name' => $input['role'],
                'created_at' => date("Y-m-d h:i:s")
            ]);
        endif;
    }

    public function storeUser($input)
    {
        $data = [
            'fullname'  => $input['fullname'],
            'username'  => $input['username'],
            'email'     => $input['email'],
            'role_id'   => $input['role']
        ];
        if ($input['password']) :
            $data['password'] = password_hash($input['password'], PASSWORD_DEFAULT);
        endif;
        if ($input['id']) :
            $data['id'] = $input['id'];
        endif;

        return $this->save($data);
    }
}
