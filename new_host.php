<?php

session_start();
if(!isset($_SESSION['login_user'])){
    header("location:index.php");
}
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
                <h2>New Host Details</h2>
            </header>
        </div>

       <span>
            <?php if($_GET['s']) {
                echo '<span style="color: blue;">Record Added! </span>';
            }elseif ($_GET['f']) {echo'<span style="color: blue;"> Record Not Added! </span>';}
            ?>

        </span>

        <br>
        <br>

        <form action="processhost.php" method="POST">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="" required/>
            <br>
            <br>
            <label for="address">Address:</label>
            <input type="text" id="address" name="address" value="" required/>
            <br>
            <br>
            <label for="postcode">Postcode:</label>
            <input type="text" id="postcode" name="postcode" value="" required/>
            <br>
            <br>
            <label for="phoneNbr">Telephone Number:</label>
            <input type="number" id="phoneNbr" name="phoneNbr" value="" required/>
            <br>
            <br>
            <label for="email">E-mail address:</label>
            <input type="email" id="email" name="email" value="" required/>
            <br>
            <br>
            <label for="status">Marital Status:</label>
            <input type="radio" id="status" name="status" value="Married" required/>Married
            <input type="radio" id="status" name="status" value="Single" required/>Single
            <br>
            <br>
            <label for="children">No. of Children</label>
            <input type="number" id="children" name="children" value=""/>
            <br>
            <br>
            <label for="vegan">Are you happy to provide Vegetarian food?</label>
            <input type="radio" id="vegan" name="vegan" value="yes"/>Yes
            <input type="radio" id="vegan" name="vegan" value="no"/>No
            <br>
            <br>
            <label for="pref">Would you prefer us to link you with male or female students? Or no preference?</label>
            <input type="radio" id="pref" name="preference" value="male" required/>Male
            <input type="radio" id="pref" name="preference" value="female" required/>Female
            <input type="radio" id="pref" name="preference" value="noPref" required/>No Preference
            <br>
            <br>
            <label for="Church">Church attended</label>
            <input type="text" id="Church" name="Church" value=""/>
            <br>
            <br>
            <label for="pastor">Name of minister/pastor</label>
            <input type="text" id="pastor" name="pastor" value=""/>
            <br>
            <br>
            <label for="interests">Special interests (sport, music, hobbies):</label>
            <textarea name="interests" id="interests" cols="45" rows="3"></textarea>
            <br>
            <br>
            <label for="interest_nation">Interest in particular areas of the world:</label>
            <textarea name="interest_nation" id="interest_nation" cols="45" rows="3"></textarea>
            <br>
            <br>
            <label for="comments">Any other relevant information:</label>
            <textarea name="comments" id="comments" cols="45" rows="3"></textarea>
            <br>
            <br>
            <br>
            <br>
            <button type="submit" value="Submit" name="submit">Submit</button>

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
