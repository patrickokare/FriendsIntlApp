<?php
include ("dbConnect.php");

session_start();

$user_check = $_SESSION['login_user'];

$ses_sql = mysqli_query($dbs," select username
                                       from users
                                       where username = '$user_check'
                                       ");

$row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

$login_session = $row['username']; // This displays the username the client or user type's in .......

if(!isset($_SESSION['login_user'])){
    header("location:login.php");
}
else{
    header("location: index.php");
}


?>
