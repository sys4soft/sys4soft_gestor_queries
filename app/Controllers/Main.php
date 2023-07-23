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
        $data['login_error'] = session()->getFlashdata('login_error');

        return view('login_frm', $data);
    }

    public function login_submit()
    {
        // form validation
        $validation = $this->validate([
            'username' => [
                'label' => 'username',
                'rules' => 'required|min_length[3]|max_length[20]',
                'errors' => [
                    'required' => 'O {field} é obrigatório.',
                    'min_length' => 'O {field} deve ter no mínimo {param} caracteres.',
                    'max_length' => 'O {field} deve ter no máximo {param} caracteres.'
                ]
            ],
            'password' => [
                'label' => 'password',
                'rules' => 'required|min_length[6]|max_length[16]',
                'errors' => [
                    'required' => 'A {field} é obrigatória.',
                    'min_length' => 'A {field} deve ter no mínimo {param} caracteres.',
                    'max_length' => 'A {field} deve ter no máximo {param} caracteres.'
                ]
            ]
        ]);

        if(!$validation){
            return redirect()->back()->withInput()->with('validation_errors', $this->validator->getErrors());
        }

        // check user
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $login = false;

        if(!$login){
            return redirect()->back()->withInput()->with('login_error', 'Usuário ou senha inválidos.');
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
