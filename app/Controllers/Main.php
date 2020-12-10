<?php namespace App\Controllers;

use Config\View;
use App\Libraries\Usuario;

class Main extends BaseController
{
   protected $helpers = array('date','url');


	public function index(){

  echo view("index.php");

   }


}