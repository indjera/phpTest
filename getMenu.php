<?php
require 'rb.php';
R::setup('mysql:host=84.238.193.106;dbname=time','ilko','1lk0#');

class CompetitorsOperation
{
	public function CompetitorSave($competitor)
	{
		if($competitors != null)
		{
			R::store(json_decode($competitor));
		}
	}
	public function CompetitorLoadById($idParam)
	{
		$id = intval($idParam);
        $competitorToReturn = R::load("competitors",$id);
        if($competitorToReturn != null )
        {
            return json_encode($competitorToReturn);        	
        }
        else
        {
        	return "";
        }
	}
	public function GetAll()
	{
		return json_encode( 
		    R::$f->begin()->select('*')->from('competitors')->get()
		);
	}
}
$competitorsOperation = new CompetitorsOperation();
echo $competitorsOperation->GetAll();
?>