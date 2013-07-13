<?php 
include 'db_connection.php';

class DisciplineBL 
{
	public function GetAll(){
		return json_encode( 
		    R::$f->begin()->select('*')->from('discipline')->get()
		);
    }

    public function SaveObject($jsonStr){
    	$disciplineFromJS =json_decode($jsonStr);
        R::store(R::graph((array)$disciplineFromJS));
        return "true";
    }

    public function GetDisciplineByCategory($category){
    	if($category){
    	return json_encode( 
		    R::$f->begin()
		        ->select('*')
		        ->from('discipline')
		        ->where('category = ?')
		        ->addSQL('order by id desc')
		        ->put($category)->get()
		);
    }
    else{return $this->GetAll();}
    }


    public function DeleteObject($jsonStr){
        $objFromJS =json_decode($jsonStr);
        R::trash(R::load('discipline', $objFromJS->id));
        return "true";
    }
}

Invoke(new DisciplineBL());

?>
