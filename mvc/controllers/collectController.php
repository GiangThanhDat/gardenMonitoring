
<?php
class collectController extends controller
{
	function __construct()
	{		
	}


	//&Ma_khuvuon=01&1_1=2&1_1=3
	function send()
	{
		if(isset($_GET)){
			$data = $_GET;
			if(array_key_exists("url",$data)){
				unset($data['url']);
			}

			if (array_key_exists("Ma_khuvuon",$data)) {
				$Ma_khuvuon = $data['Ma_khuvuon'];
				unset($data['Ma_khuvuon']);
			}

			$data_keys = array_keys($data);
			$amount = count($data_keys);
			$data_string = "";
			date_default_timezone_set('Asia/Ho_Chi_Minh');
			$time = date('Y-m-d H:i:s');			
			$dulieu = $this->model("dulieu");
			foreach ($data_keys as $key) {
				$data_string =  $time ."=".$key."=".$data[$key]."\n";
				$dataString = $this->dataProcess($data_string);
				$dataString['Ma_khuvuon'] = $Ma_khuvuon;
				$dataObj = $dataString;
				$dulieu->add($dataObj);				
			}
		}
	}


	function show($Ma_khuvuon){
		//prepare model		
		$cambienObject = $this->model("cambien");
		$dulieu = $this->model("dulieu");
		// $nguoiquanlyObject = $this->model("nguoiquanly"); // mặc định vì phải có vì phải đang nhập mới sử dụng 
		$khuvuonObject = $this->model("khuvuon");

		//get data from database
		$numbersOfMeasure = $dulieu->getNumbersOfMeasure($Ma_khuvuon);
		// $nguoiquanlyObj = $nguoiquanlyObject->getByKey($_SESSION['taikhoan_nql'],$_SESSION['adm']);
		$khuvuonObj = $khuvuonObject->getByKey($Ma_khuvuon);
		
		//view			
		$model = "khuvuon";
		$model_view = strtolower($model)."-view";		
		$pages		= "detail";

		$dataSend = [
			"model-view"=>$model_view, // cambien-view
			"model"		=>$model, // CamBien
			"pages"		=>$pages,					
			// "nql_obj"   =>$nguoiquanlyObj,
			"khuvuon_obj"  =>$khuvuonObj,
			"numbersOfMeasure" =>json_encode($numbersOfMeasure),
		];
		$this->view("masterLayout",$dataSend);
	}

	function load($Ma_khuvuon,$Ma_dailuong)
	{
		echo $this->model("dulieu")->get($Ma_khuvuon,$Ma_dailuong);
	}

	function them_dl($Ma_khuvuon,$ma_cambien)
	{		
		$dulieu = $this->model("dulieu");
		$cambienObject = $this->model("cambien");
		$khuvuonObject = $this->model("khuvuon");
		// $nguoiquanlyObject = $this->model("nguoiquanly"); // mặc định vì phải có vì phải đang nhập mới sử dụng 
			
		//data
		$cambienObj = $cambienObject->getByKey($ma_cambien);
		$khuvuonObj = $khuvuonObject->getByKey($Ma_khuvuon);
		// $nguoiquanlyObj = $nguoiquanlyObject->getByKey($_SESSION['taikhoan_nql'],$_SESSION['adm']);
		$list = $dulieu->getListMeasuresBySensor($Ma_khuvuon,$ma_cambien);

		$model = "dailuongdo";
		$model_view = strtolower($model)."-view";		
		$pages		= "add-form";
		$attachLists["donvido"] = $this->model("donvido")->listAll();
		$dataSend = [
			"model-view"=>$model_view, // cambien-view
			"model"		=>$model, // CamBien
			"pages"		=>$pages,					
			// "nql_obj"   =>$nguoiquanlyObj,
			"cb_obj"	=>$cambienObj,
			"khuvuon_obj"  =>$khuvuonObj,
			"listMeasuresBySensor"=>json_encode($list),
			"myList"=>json_encode($list),
			'attachLists'=>$attachLists
		];
		$this->view("masterLayout",$dataSend);
	
	}

	function sua_dl($Ma_khuvuon,$ma_dailuong)
	{
		if ($_SERVER['REQUEST_METHOD'] === 'POST' && $Ma_khuvuon && $ma_dailuong){
			// print_r($_POST);
			$model = $this->model("dailuongdo");
			if(isset($_POST['key']) && isset($_POST['val'])){
				echo $model->edit($key,$_POST['key'],$_POST['val']);	
			}else{
				if(method_exists($model,"update"))
					$model->update($ma_dailuong,$_POST);					
				$this->load($Ma_khuvuon);
			}
		}
	}
	
	function xoa_dl($Ma_khuvuon, $key){
		$dulieu = $this->model("dulieu");
		$dulieu->remove_DL($Ma_khuvuon,$key);
		$this->show($Ma_khuvuon);
	}

	function bieudo($Ma_khuvuon,$ma_cambien,$ma_dailuong)
	{
		//prepare model
		$dulieu = $this->model("dulieu");
		$nguoiquanlyObject = $this->model("nguoiquanly");
		// $nguoiquanlyObj = $nguoiquanlyObject->getByKey($_SESSION['taikhoan_nql'],$_SESSION['adm']);

		//data
		$listSensorMeasures = $dulieu->getSensorMeasureKeys($Ma_khuvuon);

		// thông tin mặc định cho một trang show
		$model = "khuvuon";
		$model_view = strtolower($model)."-view";
		$pages		= "chart-type";		
		$keys = ["Ma_khuvuon"=>$Ma_khuvuon,"ma_cambien"=>$ma_cambien,"ma_dailuong"=>$ma_dailuong];

		$data = [
			"model-view" =>$model_view, //cambien-view
			"model"		 =>$model, //CamBien
			"pages"		 =>$pages,
			"keys"		 =>json_encode($keys),
			// "nql_obj"	 =>$nguoiquanlyObj,
 			"sensorMeasuresList"=>json_encode($listSensorMeasures)			
		];
		$this->view("masterLayout",$data);
	}

	//input string : 2020-07-28 15:36:40=1=123
	private function dataProcess($dataString){
		$row = explode("=",$dataString);		
		$time = $row[0];
		$resultData = [];
		$resultData["ThoiGian"] = $row[0];
		$resultData["Ma_dailuong"] = $row[1];
		$resultData["GiaTri"] = trim($row[2]);
		return ($resultData);
	}
}	
?>