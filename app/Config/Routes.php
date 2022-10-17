<?php

namespace Config;

$routes = Services::routes();
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('DashboardController');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();

$routes->get('login', 'UserController::login');
$routes->post('login', 'UserController::verifyUser');
$routes->get('logout', 'UserController::logout');
// Dashboard
$routes->get('/', 'DashboardController::index');
$routes->get('dashboard', 'DashboardController::index');
// ----------------------- SETTING ------------------------------
//user setting
$routes->get('user-setting', 'UserController::userIndex');
$routes->post('user-setting/store-user', 'UserController::storeUser');
$routes->delete('user-setting/delete-user', 'UserController::deleteUser');
$routes->post('user-setting/store-role', 'UserController::storeRole');
$routes->delete('user-setting/delete-role', 'UserController::deleteRole');
// menu setting 
$routes->get('menu-setting', 'MenuController::index');
$routes->post('menu-setting/store-menu', 'MenuController::storeMenu');
$routes->delete('menu-setting/delete-menu', 'MenuController::deleteMenu');
$routes->post('menu-setting/store-menu-category', 'MenuController::storeMenuCategory');
$routes->delete('menu-setting/delete-menu-category', 'MenuController::deleteMenuCategory');
// sub menu 
$routes->get('submenu-setting', 'MenuController::indexSubMenu');
$routes->post('submenu-setting/store-submenu', 'MenuController::storeSubMenu');
$routes->delete('submenu-setting/delete-submenu', 'MenuController::deleteSubMenu');





if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
