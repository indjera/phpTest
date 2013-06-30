<?php 
include 'db_connection.php';
class ResultsBL 
{
	public function GetAll(){
		return json_encode( 
		    R::$f->begin()->select('*')->from('results')->get()
		);
    }
}

$func = $_GET['func'];
$param = $_GET['param'];
$objectBL  =  new ResultsBL();

if(method_exists($objectBL,$func)){
	echo  $objectBL->$func($param);
}

?>