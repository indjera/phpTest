<?php 
include 'db_connection.php';

class DisciplineBL 
{
	public function GetAll(){
		return json_encode( 
		    R::$f->begin()->select('*')->from('discipline')->get()
		);
    }

    public function GetDisciplineByCategory($category){
    	return json_encode( 
		    R::$f->begin()
		        ->select('*')
		        ->from('discipline')
		        ->where('category = ?')
		        ->put($category)->get()
		);
    }
}

$func = $_GET['func'];
$param = $_GET['param'];
$diciplineBL  =  new DisciplineBL();

if(method_exists($diciplineBL,$func)){
	echo  $diciplineBL->$func($param);
}

?>
