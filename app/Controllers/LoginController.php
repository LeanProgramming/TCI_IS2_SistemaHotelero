<?php

namespace App\Controllers;


class LoginController extends BaseController
{
    protected $client;

    public function __construct()
    {
        $this->client = \Config\Services::curlrequest();
    }

    public function index(): string
    {
        $data = [
            'titulo' => 'Ingresar'
        ];

        return view('templates/header', $data)
        .view('pages/login/index')
        .view('templates/closer');
    }
}
