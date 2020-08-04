<?php 
/**
 * 
 */
class adminController extends controller
{
	

	function index(){		
		$this->show("khuvuon");
	}

	private $AttachModel = [	
		"dailuong"=>["donvido"],
		"huyen"		=>["tinh"],
		"tinh"		=>["huyen"],
		"nguoiquanly"=>["tinh","huyen"],
		"khuvuon"=>["tinh","huyen"]
	];

	/**
	*  Xây dưng các Action 
	*/


	//dùng để show tất cả obj của một model
	function show($model){
		$modelObject = $this->model($model);	
		$nguoiquanlyObject = $this->model("nguoiquanly");

		// thông tin mặc định cho một trang show
		$model_view = strtolower($model)."-view";		
		$pages		= "list-all";
		$myList		= $modelObject->listAll();		
		$nguoiquanlyObj = $nguoiquanlyObject->getByKey($_SESSION['taikhoan_nql']);
		$data = [
			"model-view" =>$model_view, // cambien-view
			"model"		 =>$model, // CamBien
			"pages"		 =>$pages,
			"myList"	 =>$myList,	
			"nql_obj"	 =>$nguoiquanlyObj
		];

		//thông tin bổ sung nếu có
		if(array_key_exists($model,$this->AttachModel)){
			$attachModelNames = $this->AttachModel[$model];
			// sẽ lưu các obj là một danh sách đi kèm với key là tên model và value là danh sách dạng json
			$attachLists = [];
			foreach ($attachModelNames as $value) {				
				$attachObject 	 = $this->model($value);
				$attachLists[$value]=$attachObject->listAll();				
				// var_dump($attachLists);
			}
			// print_r($attachLists);
			$data['attachLists'] = $attachLists;
		}
		if($modelObject){
			$this->view("masterLayout",$data);			
		}
	}


	function add($model){ 		

		$modelObject = $this->model($model);
		$nguoiquanlyObject = $this->model("nguoiquanly");
		// thông tin mặc định cho một trang show
		$model_view = strtolower($model)."-view";		
		$pages		= "add-form";		
		$nguoiquanlyObj = $nguoiquanlyObject->getByKey($_SESSION['taikhoan_nql']);

		if ($_SERVER['REQUEST_METHOD'] === 'POST'){
			$modelObject = $this->model($model);
			$modelObject->add($_POST);
		}

		$data = [
			"model-view"=>$model_view, // cambien-view
			"model"		=>$model, // CamBien
			"pages"		=>$pages,
			"nql_obj"	=>$nguoiquanlyObj,
		];
	
		//thông tin bổ sung nếu có (danh sách bổ sung theo model)
		if(array_key_exists($model,$this->AttachModel)){
			$attachModelNames = $this->AttachModel[$model];
			// sẽ lưu các obj là một danh sách đi kèm với key là tên model và value là danh sách dạng json
			$attachLists = [];
			foreach ($attachModelNames as $key => $value) {				
				$attachObject 	 = $this->model($value);
				$attachLists[$value]=$attachObject->listAll();				
			}
			$data['attachLists'] = $attachLists;
		}
		if($modelObject){
			$this->view("masterLayout",$data);			
		}
	}

	//Dùng để show thông tin chi tiết của một obj nhưng chỉ được xem không cho phép sửa thông
	function detail($model, $key){
		$modelObject = $this->model($model);
		$nguoiquanlyObject = $this->model("nguoiquanly"); // mặc định vì phải có vì phải đang nhập mới sử dụng được hệ thống
		// thông tin mặc định cho một trang show
		$model_view = strtolower($model)."-view";		
		$pages		= "detail";
		$obj		= $modelObject->getByKey($key);
		$nguoiquanlyObj = $nguoiquanlyObject->getByKey($_SESSION['taikhoan_nql']);
		$data = [
			"model-view"=>$model_view, // cambien-view
			"model"		=>$model, // CamBien
			"pages"		=>$pages,	
			"obj"		=>$obj,
			"nql_obj"   =>$nguoiquanlyObj
		];
		//thông tin bổ sung nếu có (danh sách bổ sung theo model)
		if(array_key_exists($model, $this->AttachModel)){
			$attachModelNames = $this->AttachModel[$model];			
			if (count($attachModelNames) > 1) { // có nhiều danh sách kèm theo
				// sẽ lưu các obj là một danh sách đi kèm với key là tên model và value là danh sách dạng json
				$attachLists = [];
				foreach ($attachModelNames as $value) {				
					$attachObject 	 = $this->model($value);
					$attachLists[$value]=$attachObject->listAll();						
				}
				// print_r($attachLists);
				$data['attachLists'] = $attachLists;	
			}else{ // chỉ một, biểu diễn dạng datatable
				$attachObject = $this->model($attachModelNames[0]); // danh sách đính kèm

				 // lấy danh sách những thằng(obj) ở attachModel thuộc obj hiện tại của $model chính dựa trên key của nó
				$attachList = $attachObject->listFkey($key);				
				// dùng datatable hiển thị nhiều thằng(obj) của attachModel thuộc obj hiện tại của model chính nên dùng myList
				$data['myList'] = $attachList; 				
			}
		}

		if($modelObject){
			$this->view("masterLayout",$data);			
		}
	}

	//dùng để show thông tin chi tiết một obj và có thể sửa được các trường thông tin của obj đó
	function edit($model,$key){
		$modelObject = $this->model($model);
		$nguoiquanlyObject = $this->model("nguoiquanly");

		$model_view = strtolower($model) . '-view';
		$model = strtolower($model);
		$pages = "edit-form";
		$obj = $modelObject->getByKey($key);
		$nguoiquanlyObj = $nguoiquanlyObject->getByKey($_SESSION['taikhoan_nql']);
		if ($_SERVER['REQUEST_METHOD'] === 'POST' && $key){
			// print_r($_POST);
			$modelObject = $this->model($model);
			if(isset($_POST['key']) && isset($_POST['val'])){
				echo $modelObject->edit($key,$_POST['key'],$_POST['val']);	
			}else{
				if(method_exists($model,"update"))
					$modelObject->update($key,$_POST);
			}
		}
		$data = [
			"model-view" => $model_view,
			"model" 	 => $model,
			"pages"  	 => $pages,
			"obj"		 => $obj, // edit thì gửi thêm obj
			"nql_obj"	 => $nguoiquanlyObj
		];
		if(array_key_exists($model,$this->AttachModel)){
			$attachModelNames = $this->AttachModel[$model];
			// sẽ lưu các obj là một danh sách đi kèm với key là tên model và value là danh sách dạng json
			$attachLists = [];
			foreach ($attachModelNames as $key => $value) {				
				$attachObject 	 = $this->model($value);
				$attachLists[$value]=$attachObject->listAll();	
				// var_dump($attachLists);
			}
			// print_r($attachLists);
			$data['attachLists'] = $attachLists;
		}
		if($modelObject){
			$this->view("masterLayout",$data);
		}
	}

	function del($modelName, $key){
		if($modelName && $key){
			$model = $this->model("$modelName");
			$model->remove($key);	
		}
		$this->show($modelName);
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
}
?>
