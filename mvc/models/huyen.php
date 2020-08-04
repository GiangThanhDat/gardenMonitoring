<?php 
/**
 * 
 */
class huyen extends data
{
	

	public function add($post_request){		
		echo $this->InsertObject("huyen",$post_request);
	}

	public function edit($key,$column,$value){
		$result = $this->execute("UPDATE huyen SET `$column` = '$value' WHERE Ma_huyen = $key");
		// echo "UPDATE huyen SET `$column` = '$value' WHERE Ma_huyen = $key";
		if($result){
			$result = $this->execute("SELECT * FROM huyen WHERE Ma_huyen = '$key'");
			$result = $result->fetch_assoc();
			return json_encode($result);
		}
		return 0;
	}

	public function update($key,$dataSend)
	{
		echo $this->UpdateObject("huyen",$dataSend,"Ma_huyen",$key);
	}
	public function remove($key){		
		$result = $this->execute("DELETE FROM huyen WHERE Ma_huyen = $key");		
		if($result){			
			return 1;	
		}
		return 0;
	}

	public function listAll(){
		$result = $this->execute("SELECT * FROM huyen JOIN tinh ON(huyen.Ma_tinh = tinh.Ma_tinh)");
		$list = [];
		if($result){
			while ($row = $result->fetch_assoc()) {
				array_push($list,[
					"Ma_huyen"=>$row['Ma_huyen'],
					"Ten_huyen"=>$row['Ten_huyen'],
					"Ma_tinh"=>$row['Ma_tinh'],
					"Ten_tinh"=>$row['Ten_tinh']
				]);
			}			
			return json_encode($list);
		}
		return 0;
	}

	public function listFkey($fkey){
		$result = $this->execute("SELECT * FROM huyen WHERE Ma_tinh = '$fkey'");
		$list = [];
		if($result){
			while ($row = $result->fetch_assoc()) {
				array_push($list,[
					"Ma_huyen"=>$row['Ma_huyen'],
					"Ten_huyen"=>$row['Ten_huyen'],
					"Ma_tinh"=>$row['Ma_tinh']
				]);
			}			
			return json_encode($list);
		}
		return 0;		
	}

	public function getByKey($key){
		$result = $this->execute("SELECT * FROM huyen WHERE Ma_huyen = '$key'");
		if($result){
			$huyen = $result->fetch_assoc();
			return json_encode($huyen);
		}
		return 0;
	}
}
 ?>