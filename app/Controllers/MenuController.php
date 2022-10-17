<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Menu;

class MenuController extends BaseController
{
    protected $m_menu;
    public function __construct()
    {
        $this->m_menu = new Menu();
    }

    public function index()
    {
        return view('settings/menu/menu_setting', [
            'title' => 'Menu Setting',
            'menus' => $this->m_menu->getMenu(),
            'categories' => $this->db->table('menu_category')->get()->getResult(),
            'validation' => $this->validation,
        ]);
    }

    public function storeMenu()
    {
        $input = $this->request->getPost();
        $rules  = [
            'menu'      => 'required|is_unique[menu.name,id,{id}]',
            'icon'      => 'required',
            'category'  => 'required',
        ];
        if ($input['url'] != '#') :
            $rules['url'] = 'required|is_unique[menu.url,id,{id}]';
        endif;
        if (!$this->validate($rules)) {
            return redirect()->to(base_url('menu-setting'))->withInput('validation', $this->validation);
        };
        $store = $this->m_menu->storeMenu($input);
        $this->flashdataStore($store);
        return redirect()->to(base_url("menu-setting"));
    }

    public function deleteMenu()
    {
        $id = $this->request->getPost('id');
        return $this->m_menu->delete($id);
    }

    public function storeMenuCategory()
    {
        if (!$this->validate([
            'category'  => 'required|is_unique[menu_category.name,id,{id}]'
        ])) {
            return redirect()->to(base_url('menu-setting'))->withInput('validation', $this->validation);
        };
        $input = $this->request->getPost();
        $store = $this->m_menu->storeMenuCategory($input);
        $this->flashdataStore($store);
        return redirect()->to(base_url("menu-setting"));
    }

    public function deleteMenuCategory()
    {
        $id = $this->request->getPost('id');
        return $this->db->table('menu_category')->delete(['id' => $id]);
    }

    public function indexSubMenu()
    {
        return view('settings/menu/sub_menu_setting', [
            'title' => "Setting Sub Menu",
            'menus' => $this->m_menu->findAll(),
            'submenus' => $this->m_menu->getSubMenu(),
            'validation' => $this->validation,
        ]);
    }

    public function storeSubMenu()
    {
        $input = $this->request->getPost();
        $rules  = [
            'submenu'  => 'required|is_unique[menu_submenu.name,id,{id}]',
            'url'   => 'required|is_unique[menu_submenu.url,id,{id}]',
            'icon'  => 'required',
            'menu'  => 'required',
        ];
        if (!$this->validate($rules)) {
            return redirect()->to(base_url('submenu-setting'))->withInput('validation', $this->validation);
        };
        $store = $this->m_menu->storeSubMenu($input);
        $this->flashdataStore($store);
        return redirect()->to(base_url("submenu-setting"));
    }


    public function deleteSubMenu()
    {
        $id = $this->request->getPost('id');
        return $this->db->table('menu_submenu')->delete(['id' => $id]);
    }
}
