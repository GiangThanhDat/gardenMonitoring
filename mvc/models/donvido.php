<?php 
/**
 * 
 */
class donvido extends data
{
	public function add($post_request){		
		echo $this->InsertObject("donvido",$post_request);
	}
	public function edit($key,$column,$value){
		$result = $this->execute("UPDATE donvido SET `$column` = '$value' WHERE Ma_donvido = $key");
		// echo "UPDATE donvido SET `column` = '$value' WHERE Ma_donvido = $key";
		if($result){
			$result = $this->execute("SELECT * FROM donvido WHERE Ma_donvido = $key");
			$result = $result->fetch_assoc();
			return json_encode($result);
		}
		return 0;
	}

	public function update($key,$dataSend)
	{
		echo $this->UpdateObject("donvido",$dataSend,"Ma_donvido",$key);
	}


	public function remove($key){		
		$result = $this->execute("DELETE FROM donvido WHERE Ma_donvido = $key");		
		if($result){			
			return 1;	
		}
		return 0;
	}	
	public function listAll(){
		$result = $this->execute("SELECT * FROM donvido");
		$list = [];
		if($result){
			while ($row = $result->fetch_assoc()) {
				array_push($list,["Ma_donvido"=>$row['Ma_donvido'],"Ten_donvido"=>$row['Ten_donvido']]);
			}			
			return json_encode($list);
		}
		return 0;
	}

	public function getByKey($key){
		$result = $this->execute("SELECT * FROM donvido WHERE Ma_donvido = '$key'");		
		if($result){
			$donvi = $result->fetch_assoc();
			// print_r($donvi);
			return json_encode($donvi);
		}
		return 0;
	}
}
 ?>