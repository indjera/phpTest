<?php 
include 'db_connection.php';
class UserBL 
{
    public function SaveObject($jsonStr){
    	$jsObject =json_decode($jsonStr);
        R::store(R::graph((array)$jsObject));
        return "true";
    }
}
Invoke(new UserBL());
?>