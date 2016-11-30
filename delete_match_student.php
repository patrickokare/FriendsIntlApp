<?php
/**
 * Created by PhpStorm.
 * User: wale patrick
 * Date: 4/23/2016
 * Time: 6:32 PM
 */


include "dbConnect.php";

$S_ID =  $_GET['S_ID'];



$sql = "DELETE FROM `match` WHERE `match`.S_ID = '$S_ID' ";
$result = $dbs->query($sql);

if($result = $dbs->query($sql)){

    header('Location:view_match.php?d=1');

}else{
    echo "Error: " . $sql . "<br>" . mysqli_error($dbs);
    header('Location:view_match.php?f=1');
}

