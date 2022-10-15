<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UserMenuAccess extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'menu_category_id' => [
                'type'       => 'INT',
                'constraint' => '11',
                'default'    => 0
            ],
            'category_id' => [
                'type'       => 'INT',
                'constraint' => '11',
                'default'    => 0
            ],
            'sub_category_id' => [
                'type'       => 'INT',
                'constraint' => '11',
                'default'    => 0
            ],
            'permit' => [
                'type'       => 'INT',
                'constraint' => '11',
            ],
            'created_at' => [
                'type'       => 'DATETIME'
            ],
            'updated_at' => [
                'type'       => 'DATETIME',
                'null'       => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('user_menu_access');
    }

    public function down()
    {
        $this->forge->dropTable('user_menu_access');
    }
}
