<?php
/**
 * Created by PhpStorm.
 * User: wale patrick
 * Date: 4/22/2016
 * Time: 4:23 PM
 */

include "dbConnect.php";

include 'edit_host.php';




if(isset($_POST['update'])) {
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
    $h_id = $_POST['update'];

    $sql = "UPDATE host
            SET name ='$Name',
            address ='$Address' ,
            postcode ='$Postcode',
            phoneNbr = '$phoneNbr',
            email='$Email',
            status = '$Status',
            children = $Children,
            vegan = '$vegan',
            preference = '$preference',
            church ='$Church',
            pastor = '$pastor',
            interests = '$interests',
            interest_nationality = '$interests_nation' ,
            comments = '$comments'
            WHERE `h_id` = '$h_id'";
//
    if ($sth = $dbs->query($sql)) {

        header('Location:view_host.php?s=1');

    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($dbs);
        header('Location:view_host.php?f=1');
    }

}
else{
    header('Location: view_host.php');

}
?>