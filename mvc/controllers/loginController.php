<?php 

/**
 * 
 */
class loginController extends controller
{
	
	function __construct()
	{
					
	}

	function index(){
		if(isset($_SESSION['taikhoan_nql'])){
			unset($_SESSION['taikhoan_nql']);
		}
		$this->view("login");				
	}	

	function register(){
		$this->view("register");
	}
	
	function logout(){
		if(isset($_SESSION['taikhoan_nql'])){
			unset($_SESSION['taikhoan_nql']);
		}
		$this->view("login");
	}
}
