<?php 
/**
 * 
 */
class app
{

	protected $controller = "loginController";
	protected $action = "index";
	protected $params = [];

	//setter
	public function setController($controller){
	//  CONTROLLERS.$controller."Controller.php";	
		if(file_exists(CONTROLLERS.$controller."Controller.php")){ // kiểm tra xem controller request có tồn tại trong project hay không?
			$this->controller = $controller."Controller"; 
			/* quy ước đặt tên controller là ten controller + Controller 
			VD: homeController*/	
		}
	}

	public function setAction($action){
	//  $action;
		$this->controller."</br>";
		if(method_exists($this->controller, $action)){	//kiểm tra xem action request có tồn tại trong controller vừa chọn hay không?
			$this->action = $action;			
		}
	}

	public function setParams($params=[]){
		if(isset($params)){
			$this->params = array_values($params);	
		}else 
			$this->params = [];			
	}

	//getter
	public function getController(){
		return $this->controller;
	}

	public function getAction(){
		return $this->action;
	}

	public function getParams(){
		return $this->params;
	}

	//method

	function urlProcess($url){
		$arr_url = explode("/",trim($url));			
		if(isset($arr_url[0])){		
			$this->setController($arr_url[0]);
		}	
		require_once CONTROLLERS.$this->controller.".php";
		if(isset($arr_url[1])){			
			$this->setAction($arr_url[1]);
		}
		unset($arr_url[0],$arr_url[1]);
		if(isset($arr_url)){
			$this->setParams($arr_url);
		}
	}	

	function __construct()
	{			
		// print_r($_SESSION);
		if(isset($_GET['url'])){			
			$this->urlProcess($_GET['url']);		
		}
		// echo $this->controller."</br>".$this->action."</br>";
		require_once CONTROLLERS.$this->controller.".php";// đề phòng trường hợp đường dẫn tầm bậy
		$this->controller = new $this->controller;	
		// $this->controller = new home();
		call_user_func_array([$this->controller,$this->action], $this->params);
	}

}
 ?>