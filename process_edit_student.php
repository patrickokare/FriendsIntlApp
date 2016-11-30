<?php

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
$endOfStudy = $_POST['endOfStudy'];
$interests = $_POST['interests'];
$diet = $_POST['diet'];
$S_ID = $_POST['update'];



        $sql = "UPDATE student

                SET name ='$Name' ,
                address = '$Address' ,
                postcode= '$Postcode',
                phoneNbr= $phoneNbr,
                email= '$email',
                nationality= '$nationality',
                age= $age,
                gender= '$gender',
                status= '$Status',
                ifMarried= '$ifMarried' ,
                university= '$university',
                course='$course',
                endOfStudy='$endOfStudy',
                interests= '$interests',
                diet='$diet'

                WHERE S_ID = '$S_ID'";


if($sth = $dbs->query($sql)){
        
    header('Location:view_student.php?s=1');
    
}else{
    echo "Error: " . $sql . "<br>" . mysqli_error($dbs);
    header('Location:view_student.php?f=1');
}






?>

