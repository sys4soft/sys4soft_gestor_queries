<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\QueriesModel;
use App\Models\UsersModel;

class Main extends BaseController
{
    public function index()
    {

        // load user queries
        $queries_model = new QueriesModel();
        $data['queries'] = $queries_model
            ->select('id, query_name, project')
            ->where('id_user', session()->get('id'))
            ->findAll();

        // load user projects
        $data['projects'] = $queries_model
            ->select('project')
            ->where('id_user', session()->get('id'))
            ->groupBy('project')
            ->findAll();

        return view('main', $data);
    }



    // --------------------------------------------------------------------
    // login
    // --------------------------------------------------------------------
    public function login()
    {
        // check if login already
        if (session()->has('id')) {
            return redirect()->to('/');
        }

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

        if (!$validation) {
            return redirect()->back()->withInput()->with('validation_errors', $this->validator->getErrors());
        }

        // check user
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $user_model = new UsersModel();
        $user = $user_model->where('username', $username)->first();
        if (!$user) {
            return redirect()->back()->withInput()->with('login_error', 'Usuário ou senha inválidos.');
        }

        // check password
        if (!password_verify($password, $user->passwrd)) {
            return redirect()->back()->withInput()->with('login_error', 'Usuário ou senha inválidos.');
        }

        // login ok
        session()->set('id', $user->id);
        session()->set('username', $user->username);

        return redirect()->to('/');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }

    // --------------------------------------------------------------------
    // new query
    // --------------------------------------------------------------------
    public function new_query()
    {
        // get form validation errors
        $data['validation_errors'] = session()->getFlashdata('validation_errors');

        return view('new_query_frm', $data);
    }

    public function new_query_submit()
    {
        // form validation
        $validation = $this->validate([
            'text_query_name' => [
                'label' => 'nome da query',
                'rules' => 'required|min_length[3]|max_length[200]',
                'errors' => [
                    'required' => 'O {field} é obrigatório.',
                    'min_length' => 'O {field} deve ter no mínimo {param} caracteres.',
                    'max_length' => 'O {field} deve ter no máximo {param} caracteres.'
                ]
            ],
            'text_projeto' => [
                'label' => 'projeto',
                'rules' => 'required|min_length[3]|max_length[200]',
                'errors' => [
                    'required' => 'O {field} é obrigatório.',
                    'min_length' => 'O {field} deve ter no mínimo {param} caracteres.',
                    'max_length' => 'O {field} deve ter no máximo {param} caracteres.'
                ]
            ],
            'text_tags' => [
                'label' => 'tags',
                'rules' => 'required|min_length[3]|max_length[300]',
                'errors' => [
                    'required' => 'O {field} é obrigatório.',
                    'min_length' => 'O {field} deve ter no mínimo {param} caracteres.',
                    'max_length' => 'O {field} deve ter no máximo {param} caracteres.'
                ]
            ],
            'text_query' => [
                'label' => 'query',
                'rules' => 'required|min_length[3]|max_length[3000]',
                'errors' => [
                    'required' => 'A {field} é obrigatória.',
                    'min_length' => 'A {field} deve ter no mínimo {param} caracteres.',
                    'max_length' => 'A {field} deve ter no máximo {param} caracteres.'
                ]
            ]
        ]);

        if (!$validation) {
            return redirect()->back()->withInput()->with('validation_errors', $this->validator->getErrors());
        }

        // capture input data
        $query_name = $this->request->getPost('text_query_name');
        $projeto = $this->request->getPost('text_projeto');
        $tags = $this->request->getPost('text_tags');
        $query = $this->request->getPost('text_query');

        // save query
        $user_id = session()->get('id');
        $query_model = new QueriesModel();

        $data = [
            'id_user' => $user_id,
            'query_name' => $query_name,
            'query_tags' => $tags,
            'project' => $projeto,
            'query' => $query
        ];

        $query_model->insert_query($data);

        return redirect()->to('/');
    }

    // --------------------------------------------------------------------
    // edit query
    // --------------------------------------------------------------------
    public function edit_query($enc_id)
    {
        $id = decrypt($enc_id);
        if(!$id) {
            return redirect()->to('/');
        }

        // get query data
        $query_model = new QueriesModel();
        $query = $query_model->get_query($id);

        if(!$query) {
            return redirect()->to('/');
        }

        // get form validation errors
        $data['validation_errors'] = session()->getFlashdata('validation_errors');

        $data['query'] = $query;

        return view('edit_query_frm', $data);
    }

    public function edit_query_submit()
    {
        // form validation
        $validation = $this->validate([
            'text_query_name' => [
                'label' => 'nome da query',
                'rules' => 'required|min_length[3]|max_length[200]',
                'errors' => [
                    'required' => 'O {field} é obrigatório.',
                    'min_length' => 'O {field} deve ter no mínimo {param} caracteres.',
                    'max_length' => 'O {field} deve ter no máximo {param} caracteres.'
                ]
            ],
            'text_projeto' => [
                'label' => 'projeto',
                'rules' => 'required|min_length[3]|max_length[200]',
                'errors' => [
                    'required' => 'O {field} é obrigatório.',
                    'min_length' => 'O {field} deve ter no mínimo {param} caracteres.',
                    'max_length' => 'O {field} deve ter no máximo {param} caracteres.'
                ]
            ],
            'text_tags' => [
                'label' => 'tags',
                'rules' => 'required|min_length[3]|max_length[300]',
                'errors' => [
                    'required' => 'O {field} é obrigatório.',
                    'min_length' => 'O {field} deve ter no mínimo {param} caracteres.',
                    'max_length' => 'O {field} deve ter no máximo {param} caracteres.'
                ]
            ],
            'text_query' => [
                'label' => 'query',
                'rules' => 'required|min_length[3]|max_length[3000]',
                'errors' => [
                    'required' => 'A {field} é obrigatória.',
                    'min_length' => 'A {field} deve ter no mínimo {param} caracteres.',
                    'max_length' => 'A {field} deve ter no máximo {param} caracteres.'
                ]
            ]
        ]);

        if (!$validation) {
            return redirect()->back()->withInput()->with('validation_errors', $this->validator->getErrors());
        }

        // capture input data
        $id = decrypt($this->request->getPost('id_query'));
        if(!$id) {
            return redirect()->to('/');
        }

        // collect input data
        $data['query_name'] = $this->request->getPost('text_query_name');
        $data['query_tags'] = $this->request->getPost('text_tags');
        $data['project'] = $this->request->getPost('text_projeto');
        $data['query'] = $this->request->getPost('text_query');

        // update query in database
        $query_model = new QueriesModel();
        $query_model->update_query($id, $data);

        return redirect()->to('/');
    }

    public function delete_query($enc_id)
    {
        $id = decrypt($enc_id);
        if(!$id) {
            return redirect()->to('/');
        }

        // get query data
        $query_model = new QueriesModel();
        $query = $query_model->get_query($id);

        if(!$query) {
            return redirect()->to('/');
        }

        $data['query'] = $query;

        return view('delete_query', $data);
    }

    public function delete_query_confirm($enc_id)
    {
        $id = decrypt($enc_id);
        if(!$id) {
            return redirect()->to('/');
        }

        // delete query
        $query_model = new QueriesModel();
        $query_model->delete($id);

        return redirect()->to('/');
    }
}