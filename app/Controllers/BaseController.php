<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */
abstract class BaseController extends Controller
{
    /**
     * Instance of the main Request object.
     *
     * @var CLIRequest|IncomingRequest
     */
    protected $request;
    protected $segment;
    protected $db;
    protected $validation;
    protected $curl;

    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var array
     */
    protected $helpers = ['form', 'url', 'cookie', 'date', 'security', 'layouts'];

    /**
     * Constructor.
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        // Preload any models, libraries, etc, here.
        $this->segment      = \Config\Services::request();
        $this->db           = \Config\Database::connect();
        $this->validation   = \Config\Services::validation();
        $this->curl         = \Config\Services::curlrequest();

        // E.g.: $this->session = \Config\Services::session();
    }

    public function flashdataStore($store)
    {
        return session()->setFlashdata($store ? 'alert_success' : 'alert_error', $store ? "Berhasil menyimpan data" : "Gagal menyimpan data, inputan tidak sesuai");
    }
}
