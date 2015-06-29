<?php
include("connect.php");


if (isset($_POST['caller']))
{
    $caller=$_POST['caller'];
    $qry=Query("select * from information where phone=$caller");
    
    if ($qry)
    {
        $setname=Setname($qry);
        
        $value=array(
        
        "bfxm" => array("version"=>1),
        "seq"=> array(
        "action"=>"set_caller_name",
        "args"=>array("caller_name" =>"$setname")
        )
        );
        }else{
        
        $value=array(
        
        "bfxm" => array("version"=>1),
        "seq"=> array(
        "action"=>"dial",
        "args" => ["destination"=> 10]
        )
        );
    }
    
    
    
    header('Content-Type: application/json');
    die(json_encode($value));
    
}

function Query ($sorgu)
{
    $str = mysql_query($sorgu);
    return $str;
}

function Fetch ($sorgu)
{
    $str = mysql_fetch_array($sorgu);
    return $str;
}

function Setname ($qry)
{
    while ($take=Fetch($qry))
    {
        $setname=$take['name']." ".$take['surname'];
    }
    
    return $setname;
}


?>