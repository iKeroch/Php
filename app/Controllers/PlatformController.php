<?php

namespace App\Controllers;

class PlatformController extends BaseController
{

    function __construct()
    {

        $this->usermdl = model('App\Models\UserModel');
        $this->authmdl = model('App\Models\AuthModel');
        $this->session = \Config\Services::session();

        if ($this->authmdl->verify() != -1) {

            $this->data['user'] = $this->usermdl->where('user_id', $this->session->get('user_id'))->first();

            if ($this->data['user']->user_type != '1') {

                return redirect()->to('/');
            }
        } else {

            return redirect()->to('/auth/entrar');
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
        $this->data['view'] = 'platform/home/home';
        return view('platform/index', $this->data);
    }
}
