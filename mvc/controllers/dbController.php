<?php 
/**
 * 
 */
class dbController extends controller
{

	/*method for model*/

	function add($modelName){
		if ($_SERVER['REQUEST_METHOD'] === 'POST'){
			$model = $this->model("$modelName");
			if($model->add($_POST)){
				$this->view("");
			}
		}
	}

	function edit($modelName, $key){
		if ($_SERVER['REQUEST_METHOD'] === 'POST' && $key){
			// print_r($_POST);
			$model = $this->model($modelName);
			if(isset($_POST['key']) && isset($_POST['val'])){
				echo $model->edit($key,$_POST['key'],$_POST['val']);	
			}else{
				if(method_exists($model,"update"))
					$model->update($key,$_POST);
				require_once "adminController.php";
				$adminController = new adminController;
				$adminController->edit($modelName, $key);
			}
		}
	}


	function getListByFK($modelName, $FK){
		if($modelName){
			$model = $this->model($modelName);
			echo $model->listFkey($FK);
		}
	}

	function register(){
		if($_SERVER['REQUEST_METHOD'] == "POST"){
			$nguoiquanlyObj = $this->model("nguoiquanly");
			echo $nguoiquanlyObj->add($_POST);
		}	
	}

	function validation(){
		if($_SERVER['REQUEST_METHOD'] === "POST"){
			$taikhoan_nql = $_POST['taikhoan_nql'];
			echo $this->model("nguoiquanly")->duplicateValidation($taikhoan_nql);
		}
	}	

	function login(){
		if($_SERVER['REQUEST_METHOD'] === 'POST'){
			$nguoiquanlyObj = $this->model("nguoiquanly");
			$taikhoan_nql = $nguoiquanlyObj->loginCheck($_POST);			
			if ($taikhoan_nql != false) {	
				if(!array_key_exists("taikhoan_nql", $_SESSION)){
					$_SESSION['taikhoan_nql'] = $taikhoan_nql;	
					print_r($_SESSION);			
					require_once "adminController.php";
					$adminController = new adminController;
					$adminController->index();
				}
			}else{
				echo 0;
			}
		}
	}


	function index()
	{
		
	}
}
?>
