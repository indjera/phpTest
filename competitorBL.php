<?php 
include 'db_connection.php';
class CompetitorBL 
{
    public function SaveObject($jsonStr){
    	$jsObject =json_decode($jsonStr);
        R::store(R::graph((array)$jsObject));
        return "true";
    }

    public function GetByRaceID($id){
        $id = json_decode($id);
		return json_encode( 
		    R::$f->begin()
                 ->select('*')
                 ->from('competitor')
                 ->where('discipline_id=?')
                 ->put($id)
                 ->addSQL('order by id desc')
                 ->get()
		);
    }

     public function DeleteObject($jsonStr){
        $objFromJS =json_decode($jsonStr);
        R::trash(R::load('competitor', $objFromJS->id));
        return "true";
    }
}
Invoke(new CompetitorBL());
?>