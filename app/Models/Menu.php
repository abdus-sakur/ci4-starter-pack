<?php

namespace App\Models;

use CodeIgniter\Model;

class Menu extends Model
{
    protected $table            = 'menu';
    protected $returnType       = 'object';
    protected $protectFields    = false;
    protected $useTimestamps    = true;

    public function getMenu($id = null)
    {
        if ($id) :
            return $this->select('menu.*, menu_category.name as category_name')->where('id', $id)->join('menu_category', 'menu_category.id = menu.category_id')->first();
        else :
            return $this->select('menu.*, menu_category.name as category_name')->join('menu_category', 'menu_category.id = menu.category_id')->findAll();
        endif;
    }

    public function getSubMenu($id = null)
    {
        if ($id) :
            return $this->db->table('menu_submenu')->select('menu_submenu.*, menu.name as menu_name')->where('id', $id)->join('menu', 'menu.id = menu_submenu.menu_id')->get()->getResult();
        else :
            return $this->db->table('menu_submenu')->select('menu_submenu.*, menu.name as menu_name')->join('menu', 'menu.id = menu_submenu.menu_id')->get()->getResult();
        endif;
    }

    public function storeMenuCategory($input)
    {
        if (isset($input['id'])) :
            return $this->db->table("menu_category")->update([
                'name' => $input['category'],
                'updated_at' => date("Y-m-d h:i:s")
            ], ['id' => $input['id']]);
        else :
            return $this->db->table("menu_category")->insert([
                'name' => $input['category'],
                'created_at' => date("Y-m-d h:i:s")
            ]);
        endif;
    }

    public function storeSubMenu($input)
    {
        $data = [
            'name'  => $input['submenu'],
            'url'   => $input['url'],
            'icon'  => $input['icon'],
            'menu_id' => $input['menu']
        ];
        if (isset($input['id'])) :
            $data['updated_at'] = date('Y-m-d h:i:s');
            return $this->db->table("menu_submenu")->update($data, ['id' => $input['id']]);
        else :
            $data['created_at'] = date('Y-m-d h:i:s');
            return $this->db->table("menu_submenu")->insert($data);
        endif;
    }

    public function storeMenu($input)
    {
        $data = [
            'name'  => $input['menu'],
            'icon'  => $input['icon'],
            'url'   => $input['url'],
            'category_id'   => $input['category']
        ];
        if (isset($input['id'])) :
            $data['id'] = $input['id'];
        endif;

        return $this->save($data);
    }
}
