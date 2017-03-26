<?php

namespace Acacha\TodosBackend\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Routing\Controller as BaseController;

/**
 * Class BootstraplayoutController.
 *
 * @package Acacha\TodosBackend\Http\Controllers
 */
class BootstraplayoutController extends BaseController
{
    //
    /**
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $data = [];
        return view('bootstraplayout',$data);
    }

}
