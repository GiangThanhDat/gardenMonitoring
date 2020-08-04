<?php 
/**
 * 
 */
class dulieu extends data
{
	public function add($post_request){		
		echo $this->InsertObject("giatri",$post_request);
	}

	public function getNumbersOfMeasure($Ma_khuvuon)
	{
		$number_of_measures = "SELECT DISTINCT `Ma_dailuong` FROM giatri WHERE `Ma_khuvuon` = '$Ma_khuvuon'";		
		$result = $this->execute($number_of_measures);
		require_once(MODElS."dailuong.php");
		$dailuongObject = new dailuong;
		$list = [];
		if($result){
			while ($row = $result->fetch_assoc()) {			
				$measureKey = $row['Ma_dailuong'];
				// print_r($dailuongObject->getByKey($measureKey));
				array_push($list,json_decode($dailuongObject->getByKey($measureKey),true));
			}
			return $list;
		}
		return 0;
	}

	public function get($Ma_khuvuon,$Ma_dailuong)
	{
		$getLatestVal = "SELECT `giatri`,`thoigian` FROM `giatri` WHERE `Ma_khuvuon` = '$Ma_khuvuon' AND `Ma_dailuong` = '$Ma_dailuong' ORDER BY thoigian DESC LIMIT 1";
		$dataObj = new data;
		$result = $dataObj->execute($getLatestVal);		
		if($result->num_rows==1){
			$val = $result->fetch_assoc();
			$myVal = [
				"val"=>$val['giatri'],
				"time"=>$val['thoigian']
			];
			echo json_encode($myVal);
		}else{
			echo 'null';
		}		
	}

	public function remove_DL($Ma_khuvuon,$Ma_dailuong)
	{
		$remove_DL_string = "DELETE FROM giatri WHERE `Ma_khuvuon`='$Ma_khuvuon' and `Ma_dailuong`='$Ma_dailuong'";
		$result = $this->execute($remove_DL_string);
		if($result){
			return 1;
		}
		return 0;
	}



	
}