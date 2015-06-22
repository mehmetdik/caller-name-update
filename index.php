<?php
include("connect.php");

if (isset($_POST['caller'])) {
	
	$caller=$_POST['caller'];
	
$yazdir=mysql_query("select * from information where phone=$caller");
	
	
	if ($yaz=mysql_fetch_assoc($yazdir)) {
		while ($al=mysql_fetch_array($yazdir)) {
			$setname=$al['name']." ".$al['surname'];
			}

		$value=array(
			"bfxm" => array("version"=>1),
			"seq"=> array(
				array(
					"action"=>"dial",
					"args"=>array(
						"set_caller_name" =>"$setname"
					)
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