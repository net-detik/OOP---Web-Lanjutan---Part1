<?php
class db{
	public $config;
	
	function __construct($config){
		$this->config	=$config;
	}
	
	private function con(){
		$config=$this->config;
		$conn = new mysqli(
			$config['db_server'], 
			$config['db_user'], 
			$config['db_pass'], 
			$config['db_name']
		);
		return $conn;
	}
	
	public function save($params,$table){
		$con=self::con();
		
		foreach($params as $key=>$val){
			$fields .=','.$key;
			$values .=',"'.$val.'"';
		}
		$fields=substr($fields,1);
		$values=substr($values,1);

		$prepare='insert into '.$table.' ('.$fields.') values('.$values.')';
		$sql=mysqli_query($con,$prepare);


		$callback['respon']['pesan']	="sukses";
		$callback['respon']['text_msg']	="OK";
		$callback['respon']['input']	=$params;
		$callback['respon']['key']	=$fields;
		$callback['respon']['values']	=$values;
		$callback['respon']['prepare']	=$prepare;
		return $callback;
	}

	public function delete($table,$filter){
		$con=self::con();
		$prepare='delete from '.$table.' '.$filter;
		$sql=mysqli_query($con,$prepare);
		$callback['respon']['pesan']	="sukses";
		$callback['respon']['text_msg']	="OK";
		$callback['respon']['prepare']	=$prepare;
		return $callback;
	}
	public function update($params,$table,$filter){
		$con=self::con();
		foreach($params as $key=>$val){
			$set .=','.$key.'="'.$val.'"';
		}
		$set=substr($set,1);
		$prepare='update '.$table.' set '.$set .' '.$filter;
		$sql=mysqli_query($con,$prepare);
		$callback['respon']['pesan']	="sukses";
		$callback['respon']['text_msg']	="OK";
		$callback['respon']['prepare']	=$prepare;
		$callback['respon']['set']	=$set;
		return $callback;
	}
	
	public function data($params,$table,$filter){
		$con	=self::con();
		$sql	=mysqli_query($con,"select * from ".$table .''.$filter);
		while($r=mysqli_fetch_assoc($sql)){
			$data[]=$r;
		}
		$callback['data']=$data;
		return $callback;
	}
}

?>
