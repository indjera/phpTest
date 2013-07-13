<?php
require 'rb.php';
R::setup('mysql:host=84.238.193.106;dbname=time','ilko','1lk0#');
//R::freeze( true );
function Invoke($objectBL){

	$func = null;
	$param = null;

	if(array_key_exists('func',$_POST)){
		$func = $_POST['func'];
	}

	if(array_key_exists('param',$_POST)){
		 $param = $_POST['param'];
	}

    if($objectBL != null){
    	if($func != null){
            if(method_exists($objectBL,$func)){
             	if($param != null){
	                echo  $objectBL->$func($param);
                }
                 else{
                 	echo  $objectBL->$func($param);
                }
            }
        }
    }
 }
?>