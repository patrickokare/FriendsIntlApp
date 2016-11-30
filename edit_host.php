
<?php
include 'dbConnect.php';

session_start();
if(!isset($_SESSION['login_user'])){
    header("location:index.php");
}



if(isset($_GET['h_id'])){
    $user_login=$_GET['h_id'];
    $sql_query="select * from host where `h_id` ='$user_login'";
    $result=$dbs->query($sql_query);
    $row = $result->fetch_assoc();

}
else{
    header("location: view_host.php");
}

/*
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
            WHERE `name` = {$_GET['name'] }";

    if ($sth = $dbs->query($sql)) {

        header('Location:view_host.php?s=1');

    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($dbs);
        header('Location:view_host.php?f=1');
    }
}

else{
    header('Location: view_host.php');}
?>*/
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Host</title>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <link type="text/css" rel="stylesheet" href="css/stylesheet.css"/>
    <link href="images/favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon" />
</head>


<body>
<header>
    <div id ="logo">
        <a href="home.php"><img src="images/fi-logo.png" alt="Demo" width="200"></a>
    </div>

    <h1><a href="home.php">FriendshipLink WebApp</a></h1>

    <nav>
        <ul>
            <li><a href="home.php">Home</a></li>
            <li class="dropdown">
                <a class="dropbtn" href="#">New</a>
                <div class="dropdown-content">
                    <a href="new_student.php">New Student Details</a>
                    <a href="new_host.php">New Host Details</a>
                </div>
            </li>
            <li  class="dropdown">
                <a href="#" class="dropbtn">View</a>
                <div class="dropdown-content">
                    <a href="view_student.php">View Students </a>
                    <a href="view_host.php">View Hosts</a>
                    <a href="view_match.php">View Match</a>
                </div>
            </li>
            <li><a href="create_matches.php">Create Match</a></li>
            <li><a href="#">Generate Report</a></li>
            <li  style="float:right"> <a href = "logout.php">Log Out</a></li>
        </ul>
    </nav>
</header>

<main>

    <div id="title">
        <header>
            <h2>Edit Host Details</h2>
        </header>
    </div>



    <form action="process_edit_host.php" method="POST">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?php echo $row['name'];?>" required/>
        <br>
        <br>
        <label for="address">Address:</label>
        <input type="text" id="address" name="address" value="<?php echo $row['address'];?>" required/>
        <br>
        <br>
        <label for="postcode">Postcode:</label>
        <input type="text" id="postcode" name="postcode" value="<?php echo $row['postcode'];?>" required/>
        <br>
        <br>
        <label for="phoneNbr">Telephone Number:</label>
        <input type="number" id="phoneNbr" name="phoneNbr" value="<?php echo $row['phoneNbr'];?>" required/>
        <br>
        <br>
        <label for="email">E-mail address:</label>
        <input type="email" id="email" name="email" value="<?php echo $row['email'];?>" required/>
        <br>
        <br>
        <label for="status">Marital Status:</label>
        <input type="text" id="status" name="status" value="<?php echo $row['status'];?>" />
        <br>
        <br>
        <label for="children">No. of Children</label>
        <input type="number" id="children" name="children" value="<?php echo $row['children'];?>"/>
        <br>
        <br>
        <label for="vegan">Are you happy to provide Vegetarian food?</label>
        <input type="text" id="vegan" name="vegan" value="<?php echo $row['vegan'];?>"/>
        <br>
        <br>
        <label for="pref">Would you prefer us to link you with male or female students? Or no preference?</label>
        <input type="text" id="pref" name="preference" value="<?php echo $row['preference'];?>"/>
        <br>
        <label for="Church">Church attended</label>
        <input type="text" id="Church" name="Church" value="<?php echo $row['church'];?>"/>
        <br>
        <br>
        <label for="pastor">Name of minister/pastor</label>
        <input type="text" id="pastor" name="pastor" value="<?php echo $row['pastor'];?>"/>
        <br>
        <br>
        <label for="interests">Special interests (sport, music, hobbies):</label>
        <textarea name="interests" id="interests" cols="45" rows="3"><?php echo $row['interests'];?></textarea>
        <br>
        <br>
        <label for="interest_nation">Interest in particular areas of the world:</label>
        <textarea name="interest_nation" id="interest_nation" cols="45" rows="3"><?php echo $row['interest_nationality'];?></textarea>
        <br>
        <br>
        <label for="comments">Any other relevant information:</label>
        <textarea name="comments" id="comments" cols="45" rows="3"><?php echo $row['comments'];?></textarea>
        <br>
        <br>
        <br>
        <br>
        <button type="submit" value="<?php echo $row['h_id'];?>" id="update" name="update">Submit</button>


    </form>
</main>

<footer>
    <p>
        <a href="#top"><img alt="" src="images/fi-logo-reverse.png" style="width: 200px; height: 100px;" title="Back to top"></a>
    </p>
    <p>Copyright © 2016 Team B(eta) </p>

</footer>
</body>
</html>
