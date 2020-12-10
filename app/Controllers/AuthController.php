<?php

namespace  App\Controllers;

class AuthController extends BaseController
{

	function __construct()
	{
		$this->request = service('request');
		$this->usermdl = model('App\Models\UserModel');
		$this->authmdl = model('App\Models\AuthModel');
		$this->session = \Config\Services::session();

		if ($this->authmdl->verify() != -1) {
			$this->data['user'] = $this->usermdl->where('user_id', $this->session->get('user_id'))->first();
		}
	}

	public function register()
	{

		if ($this->request->getMethod() === 'post') {

			$email = $this->request->getPost('email');

			$data = array(
				'name' => $this->request->getPost('name'),
				'last_name' => $this->request->getPost('last_name'),
				'passwd' => password_hash($this->request->getPost('passwd'), PASSWORD_BCRYPT),
				'email' => $email,
				'user_type' => '0'
			);

			if (!$this->usermdl->where('email', $email)->first()) {

				$this->usermdl->insert($data);
				$this->authmdl->auth();
				if ($this->authmdl->redirect_helper(1, true, false) !== -1) {
					return $this->authmdl->redirect_helper(1, true, false);
				}
			} else 

				echo ("<script>alert(\"Usuário já existente.\")  </script>");
		
		}

		return view('website/auth/register');
	}

	public function login()
	{
		if ($this->request->getMethod() === "post") {
			$this->authmdl->auth();
		}

		if ($this->authmdl->redirect_helper(1, true, false) !== -1) {
			return $this->authmdl->redirect_helper(1, true, false);
		}

		return view('website/auth/login');
	}

	public function logout()
	{
		$session_data = [
			'user_id'  => -1,
			'auth' => FALSE
		];

		$this->session->set($session_data);

		if ($this->authmdl->redirect_helper(1, false, true) !== -1) {
			return $this->authmdl->redirect_helper(1, false, true);
		}
	}


	public function forget()
	{

		if ($this->request->getMethod() === 'post') {

			$receiver = $this->request->getPost('email');		
			$user = $this->usermdl->where('email', $receiver)->first();

			if ($user != NULL) {

				$corpo = "seu email é $receiver";   
				
				ini_set( 'display_errors', 1 );

    			error_reporting( E_ALL );
				$from = "no-reply@sosballet.com.br";
				$to = $receiver;
				$subject = "Redefinir Senha";
                
                if(!$this->session->get("confirmation_code")){
                    $codigo = $this->session->get("confirmation_code");
                }else{
    				$codigo = password_hash(rand() % 9000 + 1000, PASSWORD_DEFAULT);
    				$this->session->set("confrimation_code", "https://sosballet.com.br/auth/redefinir/".$codigo);
                }

				$html = fopen("../writable/uploads/mail.html", "r") or die("Unable to open file!");
				$data = fread($html,filesize("../writable/uploads/mail.html"));
				
				$content = str_replace("VERIFICATION_CODE", "<a href='https://sosballet.com.br/auth/redefinir/".$codigo."> Redefinir </a>", $data);
				$content = str_replace("DATE_NOW", date("d/m/Y"), $content);
							
				$headers = "From:" . $from . "\r\n";
				$headers .= "MIME-Version: 1.0\r\n";
				$headers .= "Content-Type: text/html; charset=UTF-8\r\n";

				mail($to,$subject,$content, $headers);

				$data['token'] = $codigo;
				$data['token_date'] = date("Y-m-d h:i:sa");

				$user = $this->usermdl->where("email", $to)->first();

				$this->usermdl->update($user->user_id, $data);

				return view('website/auth/forget');
			}
		}
		return view('website/auth/forget');
	}

	public function reset($token="")
	{	

		$user = $this->usermdl->where("token", $token)->first();
		
		if(!$user){
			return redirect()->to('/auth/entrar');
		}

		if ($this->request->getMethod() === 'post' and $this->authmdl->verify() != -1) {
			
			$data['passwd'] = password_hash($this->request->getPost('passwd'), PASSWORD_BCRYPT);		
			$data['token'] = "";

			$this->usermdl->update($this->session->get('user_id'), $data);
			return redirect()->to('/auth/entrar');
			
		}

		if(intval(date_sub(date("Y-m-d h:i:sa"), $user->token_date )) < 1 ){

			$session_data = [
				'user_id'  => $user->user_id,
				'auth' => TRUE
			];
			
			$this->session->set($session_data);

			return view('website/auth/reset');
		}
		
		return redirect()->to('/auth/entrar');
	}

}
