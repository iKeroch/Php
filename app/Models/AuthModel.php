<?php namespace App\Models;

use CodeIgniter\Model;

/**
 * 
 */
class AuthModel extends Model
{
	
	protected $table = 'user';
	protected $primaryKey = 'user_id';
	protected $allowedFields = [
		'user_id',
		'email',
		'passwd',
		'name',
		'last_name',
		'user_type',
	];
	protected $returnType = 'object';

	public function verify()
	{
		$session = \Config\Services::session();
		$auth = $session->get('auth');

		if (!$auth) {
			return -1;
		}else{
			return 	$session->get('user_id');
		}		
	}

	public function auth()
	{
		$request =  \Config\Services::request();
		$session =  \Config\Services::session();

		$email = $request->getPost('email');
		$passwd = $request->getPost('passwd');
		
		$user = $this->where('email', $email)->first();

		if(!$user or !password_verify($passwd, $user->passwd)){
			return -1;
		}

		$session_data = [
		    'user_id'  => $user->user_id,
	    	'auth' => TRUE
		];
		$session->set($session_data);

		return 1;
	}

	public function redirect_helper($url_id=0, $redirect_action=false, $redirect_optative=false)
	{
		$url[0] = '/auth/entrar';
		$url[1] = '/';
		$optative_url_id = 0;
		if($url_id == 0){
			$optative_url_id = 1;
		}

		if($this->verify() != -1){
			if ($redirect_action) {
				return redirect()->to($url[$url_id]);
			}			
		}else{
			if ($redirect_optative) {
				return redirect()->to($url[$optative_url_id]);
			}
		}
		
		return -1;

	}

}

?>