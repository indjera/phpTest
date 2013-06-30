<?php 
include 'db_connection.php';
class RaceBL 
{
	public function GetAll(){
		return json_encode( 
		    R::$f->begin()->select('*')->from('races')->get()
		);
    }
}

$func = $_GET['func'];
//$param = $_GET['param'];
$objectBL  =  new RaceBL();

if(method_exists($objectBL,$func)){
	echo  $objectBL->$func();
}

?>