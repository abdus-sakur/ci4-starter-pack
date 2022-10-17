<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class User extends Seeder
{
    public function run()
    {
        $data = [
            'fullname'  => 'Admin',
            'username'  => 'admin',
            'email'     => 'admin@admin.com',
            'password'  => password_hash('admin', PASSWORD_DEFAULT),
            'role_id'   => 1,
            'created_at' => date("Y-m-d h:i:s"),
        ];

        // Using Query Builder
        $this->db->table('users')->insert($data);
    }
}
