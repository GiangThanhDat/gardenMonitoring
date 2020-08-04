

<?php 
/**
 * 
 */
class khuvuon exTends data
{

	public function add($post_request){		
		echo $this->InsertObject("khuvuon",$post_request);
	}

	public function edit($key,$column,$value){
		$result = $this->execute("UPDATE khuvuon SET `$column` = '$value' WHERE Ma_khuvuon = '$key'");
		// echo "UPDATE khuvuon SET `$column` = '$value' WHERE Ma_khuvuon = $key";
		if($result){
			$result = $this->execute("SELECT * FROM khuvuon WHERE Ma_khuvuon = '$key'");
			$result = $result->fetch_assoc();
			return json_encode($result);
		}
		return 0;
	}


	public function update($key,$dataSend)
	{
		// var_dump($dataSend);
		echo $this->UpdateObject("khuvuon",$dataSend,"Ma_khuvuon",$key);
	}


	public function remove($key){		
		$result = $this->execute("DELETE FROM khuvuon WHERE Ma_khuvuon = '$key'");		
		if($result){			
			return 1;	
		}
		return 0;
	}

	public function listAll(){
		$result = $this->execute("SELECT * FROM khuvuon LEFT JOIN `huyen` ON (`khuvuon`.`Ma_huyen` = `huyen`.`Ma_huyen`) LEFT JOIN `tinh` ON (`huyen`.`Ma_tinh` = `tinh`.`Ma_tinh`)");
		$list = [];
		if($result){
			while ($row = $result->fetch_assoc()) {
				array_push($list,[
					"Ma_khuvuon"=>$row['Ma_khuvuon'],
					"Ten_khuvuon"=>$row['Ten_khuvuon'], 
					"Diachi" => $row['Diachi'],
					"Ten_huyen"=>$row['Ten_huyen'],
					"Ten_tinh"=>$row['Ten_tinh'],
					"taikhoan_nql"=>$row['taikhoan_nql']
				]);
			}			
			return json_encode($list);	
		}
		return 0;
	}

	public function getByKey($key){
		$result = $this->execute("SELECT * FROM khuvuon  LEFT JOIN `huyen` ON (`khuvuon`.`Ma_huyen` = `huyen`.`Ma_huyen`) LEFT JOIN `tinh` ON (`huyen`.`Ma_tinh` = `tinh`.`Ma_tinh`) WHERE Ma_khuvuon = '$key'");
		if($result){
			$khuvuon = $result->fetch_assoc();
			return json_encode($khuvuon);
		}
		return 0;
	}
}
 ?>