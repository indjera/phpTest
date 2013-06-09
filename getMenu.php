<?php

require 'rb.php';

//R::setup('mysql:host=84.238.193.106;dbname=time.db',"ilko","1lk0#");
R::setup('mysql:host=84.238.193.106;dbname=time','ilko','1lk0#');
$competitors = R::dispense("competitors");
$competitors->full_name = "iliq velev";
$competitors->type_id = 7;
$competitors->sex = 1;
R::store($competitors);
echo '{"horisontalMenu":["json1","json2","json1","json4"]}';
?>