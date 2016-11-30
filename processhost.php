<?php
/**
 * Created by PhpStorm.
 * User: wale patrick
 * Date: 3/1/2016
 * Time: 12:47 PM
 */

include "dbConnect.php";

$Name = $_POST['name'];
$Address = $_POST['address'];
$Postcode = $_POST['postcode'];
$phoneNbr = $_POST['phoneNbr'];
$Email = $_POST['email'];
$Status = $_POST['status'];
$Children = $_POST['children'];
$vegan = $_POST['vegan'];
$preference = $_POST['preference'];
$Church = $_POST['Church'];
$pastor = $_POST['pastor'];
$interests = $_POST['interests'];
$interests_nation = $_POST['interest_nation'];
$comments = $_POST['comments'];


/*
echo '<p>'.$Name. '</p>';
echo '<p>'.$Address. '</p>';
echo '<p>'.$Postcode. '</p>';
echo '<p>'.$phoneNbr. '</p>';
echo '<p>'.$Email. '</p>';
echo '<p>'.$Status. '</p>';
echo '<p>'.$Children. '</p>';
echo '<p>'.$vegan. '</p>';
echo '<p>'.$preference. '</p>';
echo '<p>'.$Church. '</p>';
echo '<p>'.$pastor. '</p>';
echo '<p>'.$interests. '</p>';
echo '<p>'.$interests_nation. '</p>';
echo '<p>'.$comments. '</p>';
*/

/*$Nationality= $_POST['Nationality'];
$Lastname = $_POST['Lastname'];
$Address = $_POST['address'];

$Nationality= $_POST['Nationality'];*/



        $sql = "INSERT INTO host (name, address,postcode,phoneNbr,email,status,children,vegan,preference,church,pastor,interests,interest_nationality,comments)
                  VALUES ('$Name', '$Address', '$Postcode', '$phoneNbr','$Email', '$Status', $Children, '$vegan','$preference', '$Church', '$pastor', '$interests','$interests_nation','$comments')";
       if($sth = $dbs->query($sql)){

    header('Location:new_host.php?s=1');
}else{
    echo "Error:" . $sql . "<br>" . mysqli_error($dbs);
    header('Location:new_host.php?f=1');
}

?>