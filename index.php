<?php
include ("dbConnect.php");
?>

<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <title> Admin </title>
    <link rel="stylesheet" href="css/style.css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
</head>
<header>
<div id ="logo">
    <a href="index.php"><img src="images/fi-logo-reverse.png" alt="Demo" width="200"></a>
</div>
</header>

<body>
<h2 style="color: ghostwhite" align="center"> Administrator Login </h2>
<div class="login-page">
    <div class="form">
        <form method="post" action="login.php" >
            <label style="color: darkorange"> Username </label> <input type="text" name="username" placeholder="username" />
            <br>
            <label style="color: darkorange"> Password </label> <input type="password" name="password" placeholder="password"  />

            <br>
            <br>
            <div class="submit">
             <button type="submit" name="submit" value="login" style="color: darkorange"> <Strong> LOGIN </Strong> </button>
                <br>
                <br>
            </div>
        </form>
    </div>
</div>



<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

<script src="js/index.js"></script>




</body>
</html>

