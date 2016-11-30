<?php
/**
 * Created by PhpStorm.
 * User: wale Patrick
 * Date: 3/8/2016
 * Time: 10:32 PM
 */



include "dbConnect.php";

$Name = $_POST['name'];
$Address = $_POST['address'];
$Postcode = $_POST['postcode'];
$phoneNbr = $_POST['phoneNbr'];
$email = $_POST['email'];
$nationality = $_POST['nationality'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$Status = $_POST['status'];
$ifMarried = $_POST['ifMarried'];
$university = $_POST['university'];
$course = $_POST['course'];
if(empty($_POST['endOfStudy'])){
    $endOfStudy = "00/00/0000";
}else{
    $endOfStudy = $_POST['endOfStudy'];
}


$interests = $_POST['interests'];
$diet = $_POST['diet'];



        $sql = "INSERT INTO student (name, address,postcode,phoneNbr,email,nationality,age,gender,status,ifMarried,university,course,endOfStudy,interests,diet)
                VALUES ('$Name', '$Address', '$Postcode',$phoneNbr,'$email', '$nationality', $age, '$gender','$Status', '$ifMarried', '$university', '$course','$endOfStudy','$interests','$diet')";
if($sth = $dbs->query($sql)){
        
    header('Location:new_student.php?s=1');
    
}else{
    echo "Error: " . $sql . "<br>" . mysqli_error($dbs);
    header('Location:new_student.php?f=1');
}






?>

