<?php
include("connect.php");


if (isset($_POST['caller'])) 
{
	$caller=$_POST['caller'];
	$qry=mysql_query("select * from information where phone=$caller");
	
	if ($qry) 
	{
		while ($take=mysql_fetch_array($qry)) 
		{
			$name=$take['name'];
			$surname=$take['surname'];
			$setname="$name"." "."$surname";
		}

		$value=array(
				
			"bfxm" => array("version"=>1),
			"seq"=> array(
						
						array(
							"action"=>"set_caller_name",
							"args"=>array("caller_name" =>"$setname")
							 )
											
				         )
					);
	}else{
			
		$value=array(
				
			"bfxm" => array("version"=>1),
			"seq"=> array(
						
						array(
							"action"=>"dial",
							"args" => ["destination"=> 10]	
							 )
						
						  )
				
					);

		 }
	


	header('Content-Type: application/json');
	die(json_encode($value));
	
}

?>
