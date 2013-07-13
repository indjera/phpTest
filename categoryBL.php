<?php 
include 'db_connection.php';
class CategoryBL 
{
    public function SaveObject($jsonStr){
    	$jsObject =json_decode($jsonStr);
        R::store(R::graph((array)$jsObject));
        return "true";
    }

    public function GetAll($param){
		return json_encode( 
		    R::$f->begin()->select('*')->from('category')->get()
		);
    }


}
Invoke(new CategoryBL());
?>