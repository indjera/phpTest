<?php 
include 'db_connection.php';
class RaceBL {
	public function GetAll(){
		return json_encode( 
		    R::$f->begin()
                 ->select('*')
                 ->from('race')
                 ->addSQL('order by id desc')->get()
		);
    }
    public function SaveObject($jsonStr){
        $jsObject =json_decode($jsonStr);
        if(!$jsObject->id){
        R::store(R::graph((array)$jsObject->data));
        }else{
            $objToUpdate = R::load('race',$jsObject->id);
            if( $objToUpdate->id){
                $objToUpdate->import((array)$jsObject->data);
                R::store( $objToUpdate);
            }
        }
        return "true";
    }

    public function GetRaceByPlace($jsObject){
        if($jsObject){
            return json_encode( 
            R::$f->begin()
                 ->select('*')
                 ->from('race')
                 ->where('location=?')
                 ->put(trim($jsObject))
                 ->addSQL('order by id desc')->get()
        );
        }
        else{
            return $this->GetAll();
        }
    
    }

    public function DeleteObject($jsonStr){
        $objFromJS =json_decode($jsonStr);
        R::trash(R::load('race', $objFromJS->id));
        return "true";
    }

}
//phpinfo();
Invoke(new RaceBL());

?>