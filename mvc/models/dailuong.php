<?php 	
/**
 * 
 */
class dailuong extends data
{
	public function add($post_request){		
		echo $this->InsertObject("dailuong",$post_request);
	}

	public function edit($key,$column,$value){
		$result = $this->execute("UPDATE dailuong SET `$column` = '$value' WHERE Ma_dailuong = $key");
		// echo "UPDATE dailuong SET `$column` = '$value' WHERE Ma_dailuong = $key";
		if($result){
			$result = $this->execute("SELECT * FROM dailuong WHERE Ma_dailuong = $key");
			$result = $result->fetch_assoc();
			return json_encode($result);
		}
		return 0;
	}

	public function update($key,$dataSend)
	{
		echo $this->UpdateObject("dailuong",$dataSend,"Ma_dailuong",$key);
	}

	public function remove($key){		
		$result = $this->execute("DELETE FROM dailuong WHERE `Ma_dailuong` = $key");		
		if($result){			
			return 1;
		}
		return 0;
	}		
	
	public function listAll(){
		$result = $this->execute("SELECT * FROM dailuong LEFT JOIN donvido ON(dailuong.Ma_donvido=donvido.Ma_donvido)");
		$list = [];
		if($result){
			while ($row = $result->fetch_assoc()) {
				array_push($list,[
					"Ma_dailuong"=>$row['Ma_dailuong'],
					"Ten_dailuong"=>$row['Ten_dailuong'],
					"Ten_donvido"=>$row['Ten_donvido'],
				]);
			}			
			return json_encode($list);
		}
		return 0;
	}

	public function getByKey($key){
		$queryString = "SELECT * FROM dailuong LEFT JOIN donvido ON(dailuong.Ma_donvido=donvido.Ma_donvido) WHERE Ma_dailuong = '$key'";
		// echo $queryString;
		$result = $this->execute($queryString);
		if($result){
			$dailuong = $result->fetch_assoc();
			return json_encode($dailuong);
		}
		return 0;
	}
}
 ?>