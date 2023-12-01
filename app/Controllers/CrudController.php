<?php

namespace App\Controllers;

use App\Models\CrudModel;

class CrudController extends BaseController
{
    public function index()
    {
        $crudModel = new CrudModel();

        $pager = \Config\Services::pager();

        $data = array(
            'cruds' => $crudModel->paginate(10, 'crud'),
            'pager' => $crudModel->pager
        );

        return view('index', $data);
    }

    public function create()
    {
        return view('create');
    }

    public function store()
    {
        helper(['form', 'url']);

        $validation = $this->validate([
            'title' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukkan Judul Post.'
                ]
            ],
            'content' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukkan konten Post.'
                ]
            ],
        ]);

        if (!$validation) {

            return view('create', [
                'validation' => $this->validator
            ]);
        } else {
            $crudModel = new CrudModel();

            $data = array(
                'title' => $this->request->getPost('title'),
                'content' => $this->request->getPost('content')
            );

            $crudModel->insert($data);

            return redirect()->to(base_url('crud'));
        }
    }

    public function edit($id)
    {
        $crudModel = new CrudModel();

        $data = array(
            'data' => $crudModel->find($id)
        );

        return view('edit', $data);
    }

    public function update($id)
    {
        helper(['form', 'url']);

        $validation = $this->validate([
            'title' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukkan Judul Post.'
                ]
            ],
            'content' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukkan konten Post.'
                ]
            ],
        ]);

        if (!$validation) {

            return view('edit', [
                'validation' => $this->validator
            ]);
        } else {
            $crudModel = new CrudModel();

            $data = array(
                'title' => $this->request->getPost('title'),
                'content' => $this->request->getPost('content')
            );

            $crudModel->update($id, $data);

            return redirect()->to(base_url('crud'));
        }
    }

    public function delete($id)
    {
        $crudModel = new CrudModel();

        $crudModel->delete($id);

        return redirect()->to(base_url('crud'));
    }
}
