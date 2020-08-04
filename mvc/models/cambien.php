<?php 
/**
 * 
 */
class cambien extends data
{
	

	public function add($post_request){		
		echo $this->InsertObject("cambien",$post_request);
	}

	public function edit($key,$column,$value){
		$result = $this->execute("UPDATE cambien SET `$column` = '$value' WHERE Ma_cambien = $key");
		// echo "UPDATE cambien SET `$column` = '$value' WHERE Ma_cambien = $key";
		if($result){
			$result = $this->execute("SELECT * FROM cambien WHERE Ma_cambien = '$key'");
			$result = $result->fetch_assoc();
			return json_encode($result);
		}
		return 0;
	}

	public function update($key,$dataSend)
	{
		echo $this->UpdateObject("cambien",$dataSend,"Ma_cambien",$key);
	}

	public function remove($key){		
		$result = $this->execute("DELETE FROM cambien WHERE Ma_cambien = '$key'");		
		if($result){			
			return 1;	
		}
		return 0;
	}

	public function listAll(){
		$result = $this->execute("SELECT * FROM cambien");
		$list = [];
		if($result){
			while ($row = $result->fetch_assoc()) {
				array_push($list,["Ma_cambien"=>$row['Ma_cambien'],"Ten_cambien"=>$row['Ten_cambien']]);
			}			
			return json_encode($list);
		}
		return 0;
	}

	public function getByKey($key){
		$result = $this->execute("SELECT * FROM cambien WHERE Ma_cambien = '$key'");
		if($result){
			$cambien = $result->fetch_assoc();
			return json_encode($cambien);
		}
		return 0;
	}
}
 ?>