<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Main extends BaseController
{
    public function index()
    {
        // return view('home');
        // return view('login_frm');
        return view('main');
    }



    // --------------------------------------------------------------------
    // login
    // --------------------------------------------------------------------
    public function login()
    {
        $data = [];

        $data['validation_errors'] = session()->getFlashdata('validation_errors');

        return view('login_frm', $data);
    }

    public function login_submit()
    {
        // form validation
        $validation = $this->validate([
            'username' => [
                'label' => 'Username',
                'rules' => 'required|min_length[3]|max_length[20]',
                'errors' => [
                    'required' => 'O {field} é obrigatório.',
                    'min_length' => 'O {field} deve ter no mínimo {param} caracteres.',
                    'max_length' => 'O {field} deve ter no máximo {param} caracteres.'
                ]
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required|min_length[6]|max_length[16]',
                'errors' => [
                    'required' => 'O {field} é obrigatório.',
                    'min_length' => 'O {field} deve ter no mínimo {param} caracteres.',
                    'max_length' => 'O {field} deve ter no máximo {param} caracteres.'
                ]
            ]
        ]);

        if(!$validation){
            return redirect()->back()->withInput()->with('validation_errors', $this->validator->getErrors());
        }

        echo 'OK!';
    }

    public function logout()
    {
        echo 'Aqui logout!';
    }

    // --------------------------------------------------------------------
    // new query
    // --------------------------------------------------------------------
    public function new_query()
    {
        return view('new_query_frm');
    }

    public function new_query_submit()
    {
        echo 'Aqui new_query_submit!';
    }
}
