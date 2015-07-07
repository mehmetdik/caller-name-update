<?php
mysql_select_db("directory",mysql_connect("localhost","root","root"));


/**
* Makes MySQL Query
*
* @param string $qry MySQL query
*
* @return $str
*/
function query ($qry)
{
    $str = mysql_query($qry);
    return $str;
}

/**
* PHP also makes data that can be used easily.
*
* @param string $qry MySQL query
*
* @return $str
*/
function fetch ($qry)
{
    $str = mysql_fetch_array($qry);
    return $str;
}

/**
* return caller number name
*
* @param string $qry MySQL query
*
* @return $setname name will be sent to the phone
*/
function setname ($qry)
{
    while ($take=fetch($qry)) {
        $setname=$take['name']." ".$take['surname'];
    }
    
    return $setname;
}
?>