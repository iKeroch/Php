<?php

namespace App\Controllers;

class UserController extends BaseController
{

    function __construct()
    {
        
        $this->request = service('request');
        $this->authmdl = model('App\Models\AuthModel');
        $this->usermdl = model('App\Models\UserModel');
        $this->session = \Config\Services::session();

        //   $this->data[''];
        if ($this->authmdl->verify() != -1) {

            $this->data['user'] = $this->usermdl->where('user_id', $this->session->get('user_id'))->first();
        }
    }



    public function index()
    {
        if ($this->authmdl->verify() != -1) {

            if ($this->data['user']->user_type != '1') {

                return redirect()->to('/');
            }
        } else {

            return redirect()->to('/auth/entrar');
        }


        $this->data['users'] = $this->usermdl->findAll();
        $this->data['view'] = 'platform/users/list';

        return view('platform/index', $this->data);
    }

    public function delete($user_id = '')
    {
        if ($this->authmdl->verify() != -1) {

            if ($this->data['user']->user_type != '1') {

                return redirect()->to('/');
            }
        } else {

            return redirect()->to('/auth/entrar');
        }

        if ($this->usermdl->where('user_id', $user_id)->delete()) {
            return '1';
        } else {
            return '0';
        }
    }


    public function edit($user_id = '')
    {
        if ($this->authmdl->verify() != -1) {

            if ($this->data['user']->user_type != '1') {

                return redirect()->to('/');
            }
        } else {

            return redirect()->to('/auth/entrar');
        }

        if ($this->request->getMethod() === "post") {

            $update_data = array(
                'name' => $this->request->getPost('name'),
                'last_name' => $this->request->getPost('last_name'),
                'email' => $this->request->getPost('email'),
                'user_type' => $this->request->getPost('user_type')


            );

            $this->usermdl->update($user_id, $update_data);
        }

        if ($user_id != '') {
            $this->data['edit_user'] = $this->usermdl->where('user_id', $user_id)->first();
        }

        $this->data['users'] = $this->usermdl->findAll();
        $this->data['view'] = 'platform/users/edit';

   

        return view('platform/index', $this->data);
    }

    public function create()
    {
        if ($this->authmdl->verify() != -1) {

            if ($this->data['user']->user_type != '1') {

                return redirect()->to('/');
            }
        } else {

            return redirect()->to('/auth/entrar');
        }

        if ($this->request->getMethod() === "post") {

            $update_data = array(
                'name' => $this->request->getPost('name'),
                'last_name' => $this->request->getPost('last_name'),
                'email' => $this->request->getPost('email'),
                'user_type' => $this->request->getPost('user_type'),
                'passwd' => password_hash($this->request->getPost('passwd'), PASSWORD_BCRYPT),


            );

            $this->usermdl->insert($update_data);


            return redirect()->to('/usuarios/' . $this->usermdl->insertID());
        }

        $this->data['users'] = $this->usermdl->findAll();
        $this->data['view'] = 'platform/users/register';

        return view('platform/index', $this->data);
    }
}
