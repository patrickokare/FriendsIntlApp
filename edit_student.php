
<?php
include 'dbConnect.php';

session_start();
if(!isset($_SESSION['login_user'])){
    header("location:index.php");
}


if(isset($_GET['S_ID'])){
    $user_login=$_GET['S_ID'];
    $sql_query="select * from student where `S_ID` ='$user_login'";
    $result=$dbs->query($sql_query);
    $row = $result->fetch_assoc();

}
else{
    header("location: view_student.php");
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Student</title>
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
            <h2>Edit Student Details</h2>
        </header>
        </div>



        <form action="process_edit_student.php" method="POST">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="<?php echo $row['name'];?>" required/>
            <br>
            <br>
            <label for="address">Address:</label>
            <input type="text" id="address" name="address" value="<?php echo $row['address'];?>"/>
            <br>
            <br>
            <label for="postcode">Postcode:</label>
            <input type="text" id="postcode" name="postcode" value="<?php echo $row['postcode'];?>"/>
            <br>
            <br>
            <label for="number">Telephone Number:</label>
            <input type="number" id="number" name="phoneNbr" value="<?php echo $row['phoneNbr'];?>" required/>
            <br>
            <br>
            <label for="email">E-mail address:</label>
            <input type="email" id="email" name="email" value="<?php echo $row['email'];?>" required/>
            <br>
            <br>
            <label for="nationality">Home Country:</label>
            <input required type="text" id="nationality" name="nationality" value="<?php echo $row['nationality'];?>"/>
            <br>
            <br>
            <label for="age">Age:</label>
            <input required type="number" id="age" name="age" value="<?php echo $row['age'];?>"/>
            <br>
            <br>
            <label for="gender">Gender:</label>
            <input required type="text" id="gender" name="gender" value="<?php echo $row['gender'];?>"/>
            <br>
            <br>
            <label for="status">Marital Status:</label>
            <input required type="text" id="status" name="status" value="<?php echo $row['status'];?>"/>
            <br>
            <br>
            <label for="ifMarried">If Married, Enter Details:</label>
            <textarea name="ifMarried" id="ifMarried" cols="45" rows="3" ><?php echo $row['ifMarried'];?></textarea>
            <br>
            <br>
            <label for="university">University:</label>
            <input type="text" id="university" name="university" value="<?php echo $row['university'];?>"/>
            <br>
            <br>
            <label for="course">Course of study:</label>
            <input type="text" id="course" name="course" value="<?php echo $row['course'];?>"/>
            <br>
            <br>
            <label for="endOfStudy">End of Study date:</label>
            <input type="text" id="endOfStudy" name="endOfStudy" value="<?php echo $row['endOfStudy'];?>" placeholder="yyyy/mm/dd"/>
            <br>
            <br>
            <label for="interests">Special interests (sport, music, hobbies):</label>
            <textarea name="interests" id="interests" cols="45" rows="3"><?php echo $row['interests'];?></textarea>
            <br>
            <br>
            <label for="diet">Special diet (Vegan, Allergies):</label>
            <textarea name="diet" id="diet" cols="45" rows="3"><?php echo $row['diet'];?></textarea>
            <br>
            <br>
            <br>
            <br>
            <button type="submit"  value="<?php echo $row['S_ID'];?>" id="update" name="update">Submit</button>

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
