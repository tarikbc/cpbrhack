<?php
require_once 'common.php';
require_once 'consts.php';

$con = null;
function connect()
{
    global $con;
    $con = mysqli_connect(DB_HOST, DB_USER, DB_PASS);

    if(!$con)
        die("Unable to connect to: " . DB_USER . ":" . DB_PASS . "@" . DB_HOST . ". Error: " . mysql_error());
    mysqli_select_db($con, DB_DB);
    return $con;
}


function getSelect($query){
        $con = connect();
        $result = mysqli_query($con, $query);


            $rows = array();
            while($row = mysqli_fetch_row($result)) {
                $rows[] = $row;
            }
            return $rows;
    }


function insertQuery($query, $update = false)
{
        $con = connect();
        $result = mysqli_query($con, $query);
        if($result !== true) {
            return false;
        }
        return ($update === false) ? true : mysqli_insert_id($con);

}
