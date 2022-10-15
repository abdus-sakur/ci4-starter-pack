<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserRole extends Seeder
{
    public function run()
    {
        $data = [
            'name'          => 'Admin',
            'created_at'    => date("Y-m-d h:i:s"),
        ];

        // Using Query Builder
        $this->db->table('user_role')->insert($data);
    }
}
