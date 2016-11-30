<?php
/**
 * Created by PhpStorm.
 * User: wale patrick
 * Date: 4/23/2016
 * Time: 6:32 PM
 */
/**/

include "dbConnect.php";

$h_id =  $_GET['h_id'];



$sql = "DELETE FROM host WHERE h_id = '$h_id' ";
$result = $dbs->query($sql);

if($result = $dbs->query($sql)){

    header('Location:view_host.php?d=1');

}else{
    echo "Error: " . $sql . "<br>" . mysqli_error($dbs);
    header('Location:view_host.php?f=1');
}

