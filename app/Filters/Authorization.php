<?php

namespace App\Filters;

use App\Models\User;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class Authorization implements FilterInterface
{
    /**
     * Do whatever processing this filter needs to do.
     * By default it should not return anything during
     * normal execution. However, when an abnormal state
     * is found, it should return an instance of
     * CodeIgniter\HTTP\Response. If it does, script
     * execution will end and that Response will be
     * sent back to the client, allowing for error pages,
     * redirects, etc.
     *
     * @param RequestInterface $request
     * @param array|null       $arguments
     *
     * @return mixed
     */
    public function before(RequestInterface $request, $arguments = null)
    {
        // if (session('role_id') != 1) :
        //     $segment             = $request->uri->getSegment(1);

        //     if ($segment) :
        //         $menu   = db_connect()->query("exec getMenuByURL '$segment'")->getRow();
        //         if (!$menu) :
        //             session()->setFlashdata('warning', 'Halaman tidak ditemukan');
        //             return redirect()->to(base_url('/'));
        //         else :
        //             $menu_id = $menu->id;
        //             $role_id = session('role_id');
        //             $checkAccess = db_connect()->query("exec checkAccessMenu @menuID =  $menu_id, @roleID =  $role_id")->getRow();
        //             if (!$checkAccess) :
        //                 session()->setFlashdata('warning', 'Halaman tidak ditemukan');
        //                 return redirect()->to(base_url('/'));
        //             endif;
        //         endif;
        //     endif;
        // endif;
    }

    /**
     * Allows After filters to inspect and modify the response
     * object as needed. This method does not allow any way
     * to stop execution of other after filters, short of
     * throwing an Exception or Error.
     *
     * @param RequestInterface  $request
     * @param ResponseInterface $response
     * @param array|null        $arguments
     *
     * @return mixed
     */
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        //
    }
}
