
<?php include 'dbConnect.php';


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
    <title>View Matches</title>
    <script src="https://code.jquery.com/jquery-2.2.3.min.js" integrity="sha256-a23g1Nt4dtEYOj7bR+vTu7+T8VP13humZFBJNIYoEJo="   crossorigin="anonymous"></script>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <link type="text/css" rel="stylesheet" href="css/stylesheet.css"/>
    <link href="images/favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon" />
    <style>



    </style>
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
                <a class="active dropbtn" href="#">New</a>
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
            <h2>Match Details</h2>
        </header>
    </div>

    <p>The Table below shows the Host first with the students matched to the host directly below it</p>

    <?php
    if ($_GET['d']){echo "<span style='color: blue;'> Record Deleted!</span>";}
    elseif ($_GET['f']) {echo'<span style="color: blue;"> Record Not Edited! </span>';}
    ?>


    <table class="table_sommy">
        <thead>
        <tr>
            <th></th>
            <th>Name</th>
            <th>Student preference</th>
            <th>Interests</th>
            <th>Country</th>
            <th>Accommodate Vegans</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $sql_query = "SELECT host.* FROM host, `match` where host.h_id = `match`.h_id Group by `match`.h_id;";

        $result =  $dbs->query($sql_query);

        if(mysqli_num_rows($result)>0){
            $counter = 0;

            while ($row = $result->fetch_array())
            {
                $counter++;
                ?>
                <tr>
                    <td style="padding: 15px"></td>
                    <td style="padding: 15px"></td>
                    <td style="padding: 15px"></td>
                    <td style="padding: 15px"></td>
                    <td style="padding: 15px"></td>
                    <td style="padding: 15px"></td>
                </tr>
                <tr>
                    <td ><strong><?php echo "Host ". $counter;?></strong></td>
                    <td><?php echo $row['name'];?></td>
                    <td><?php echo $row['preference'];?></td>
                    <td><?php echo $row['interests'];?></td>
                    <td><?php echo $row['interest_nationality'];?></td>
                    <td><?php echo $row['vegan'];?></td>
                </tr>

                <br>
                <tr>
                    <th>Students Matched</th>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Gender</th>
                    <th>Country</th>
                    <th>Diet</th>
                </tr>
                <tr><?php

                $sql = "SELECT student.*
                        FROM student
                          inner Join `match` on student.S_ID = `match`.S_ID
                        WHERE `match`.h_ID = {$row['h_id']}";
                $result2= $dbs->query($sql);
                while( $row2 = $result2->fetch_array()){
                    ?>
                    <td style="border-bottom: hidden"></td>
                    <td><?php echo $row2['name'];?></td>
                    <td><?php echo $row2['age'];?></td>
                    <td><?php echo $row2['gender'];?></td>
                    <td><?php echo $row2['nationality'];?></td>
                    <td><?php echo $row2['diet'];?></td>
                    <td style="border-bottom: hidden;">
                        <a href="delete_match_student.php?S_ID=<?php echo $row2['S_ID'];?>"  class="confirmation" style="text-decoration: none; color: red ">Delete match</a>
                    </td>
                    </tr>
                    <?php
                }
            }


        }
        $result->close();
        $dbs->close();
        ?>
    </table>


    <script type="text/javascript">
        var elems = document.getElementsByClassName('confirmation');
        var confirmIt = function (e) {
            if (!confirm('Are you sure you want to delete this match?')) e.preventDefault();
        };
        for (var i = 0, l = elems.length; i < l; i++) {
            elems[i].addEventListener('click', confirmIt, false);
        }
    </script>


</main>



<footer>
    <p>
        <a href="#top"><img alt="" src="images/fi-logo-reverse.png" style="width: 200px; height: 100px;" title="Back to top"></a>
    </p>
    <p>Copyright © 2016 Team B(eta) </p>

</footer>

</body>
</html>







<!-- $sql_query = "SELECT host.* FROM host, `match` where host.h_id = `match`.h_id Group by `match`.h_id;";


<thead host>
            <tr>
                <th></th>
                <th>Name</th>
                <th>Student preference</th>
                <th>Interests</th>
                <th>Country</th>
                <th>Accomodate Vegans</th>
            </tr>
        </thead>

        student
         <th class="expand1"></th>
                <th class="expand1">Name</th>
                <th class="expand1">Age</th>
                <th class="expand1">Gender</th>
                <th class="expand1">Country</th>
                <th class="expand1">Diet</th>









-->




