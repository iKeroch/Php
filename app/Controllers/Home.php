<?php namespace App\Controllers;

class Home extends BaseController
{

	function __construct(){
		$this->request = service('request');
		$this->authmdl = model('App\Models\AuthModel');
		$this->usermdl = model('App\Models\UserModel');
		$this->session = service('session');
		
		$this->data['logged'] = false;

		if($this->authmdl->verify() != -1){
			$this->data['user'] = $this->usermdl->where('user_id', $this->session->get('user_id'))->first();
			$this->data['logged'] = true;						
		}


	}

	public function index()
	{

		$this->data['view'] = 'website/home/main';
		return view('website/index', $this->data);
	}

	//--------------------------------------------------------------------

	public function profile($id='')
	{

        if ($this->authmdl->verify() != -1) {

		$this->data['view'] = 'website/profile/user';
		return view('website/index', $this->data);

		}else {

            return redirect()->to('/auth/entrar');
        }

	}





	

}
