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
$routes->post('user-setting/store-role', 'UserController::storeRole');





if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
