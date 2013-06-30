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

$diciplineBL  =  new DisciplineBL();
if(method_exists($diciplineBL,$_GET['func'])){
	echo  $diciplineBL->$_GET['func']();
}

?>
