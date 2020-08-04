<?php 

/**
 * 
 */
class tinh extends data
{
	public function add($post_request){
		echo $this->InsertObject("tinh",$post_request);
	}

	public function edit($key,$column,$value){
		$result = $this->execute("UPDATE tinh SET `$column` = '$value' WHERE Ma_tinh = $key");
		// echo "UPDATE tinh SET `$column` = '$value' WHERE Ma_tinh = $key";
		if($result){
			$result = $this->execute("SELECT * FROM tinh WHERE Ma_tinh = $key");
			$result = $result->fetch_assoc();
			return json_encode($result);
		}
		return 0;
	}


	public function update($key,$dataSend)
	{
		echo $this->UpdateObject("tinh",$dataSend,"Ma_tinh",$key);
	}
	public function remove($key){		
		$result = $this->execute("DELETE FROM tinh WHERE Ma_tinh = $key");		
		// echo 'DELETE FROM tinh WHERE Ma_tinh = $key';
		if($result){				
			return 1;	
		}
		return 0;
	}		
	public function listAll(){
		$result = $this->execute("SELECT * FROM tinh");
		$list = [];
		if($result){
			while ($row = $result->fetch_assoc()) {
				array_push($list,["Ma_tinh"=>$row['Ma_tinh'],"Ten_tinh"=>$row['Ten_tinh']]);
			}			
			return json_encode($list);
		}
		return 0;		
	}

	public function getByKey($key){
		$result = $this->execute("SELECT * FROM tinh WHERE Ma_tinh = '$key'");		
		if($result){
			$tinh = $result->fetch_assoc();
			// print_r($tinh);
			return json_encode($tinh);
		}
		return 0;
	}
}