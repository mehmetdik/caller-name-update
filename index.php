<?php 

/**
 * Caller number is sent to the phone
 *
 * PHP Version 5.5.9
 *
 * @category Callernameupdate
 * @package  Callernameupdate
 * @author   Mehmet Dik <mdik1212@gmail.com>
 * @web      http://mehmetdik.com/
 * @license  http://opensource.org/licenses/MIT MIT
 * @link     http://www.github.com/mehmetdik/caller-name-update
 */
namespace CNupdate;

require 'connect.php';

if (isset($_POST['caller'])) {
    $caller=$_POST['caller'];
    $qry=query("select * from information where phone=$caller");
    $name=setname($qry);

    if ($name != "") {
                
        $value=array(
        
        "bfxm" => array("version"=>1),
        "seq"=> array(
        "action"=>"set_caller_name",
        "args"=>array("caller_name" =>"$name")
        )
        );
    } else {
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




?>
