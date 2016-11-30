
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
    <title>View Students</title>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <link type="text/css" rel="stylesheet" href="css/stylesheet.css"/>
    <link href="images/favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon"/>
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
                <h2>All Student Details</h2>
            </header>
        </div>
        <span>
            <?php if($_GET['s']) {
                echo '<span style="color: blue;">Record Edited! </span>';
            }elseif ($_GET['f']) {echo'<span style="color: blue;"> Record Not Edited! </span>';}
            elseif ($_GET['d']){echo "<span style='color: blue;'> Record Deleted!</span>";}
            ?>

        </span>




    <div style="overflow-x:auto;">
    <table class="table_sommy" style="margin-left: auto; margin-right: auto;">
        <tr>
            <th>S_ID</th>
            <th>Name</th>
            <th>Address</th>
            <th>PostCode</th>
            <th>Telephone Number</th>
            <th>E-mail Address</th>
            <th>Home Country</th>
            <th>Age:</th>
            <th>Gender:</th>
            <th>Marital Status</th>
            <th>Married Details</th>
            <th>University</th>
            <th>Course of Study</th>
            <th>End of Study Date</th>
            <th>Special Interests</th>
            <th>Special Diet</th>

        <?php
            $sql_query = "SELECT * FROM student";
            $result =  $dbs->query($sql_query);

            if(mysqli_num_rows($result)>0){
                $counter = 0;

            while ($row = $result->fetch_array())
            {
                $counter++;
            ?>
        <tr>
            <td><?php echo $counter;?></td>
            <td><?php echo $row['name'];?></td>
            <td><?php echo $row['address'];?></td>
            <td><?php echo $row['postcode'];?></td>
            <td><?php echo $row['phoneNbr'];?></td>
            <td><?php echo $row['email'];?></td>
            <td><?php echo $row['nationality'];?></td>
            <td><?php echo $row['age'];?></td>
            <td><?php echo $row['gender'];?></td>
            <td><?php echo $row['status'];?></td>
            <td><?php echo $row['ifMarried'];?></td>
            <td><?php echo $row['university'];?></td>
            <td><?php echo $row['course'];?></td>
            <td><?php echo $row['endOfStudy'];?></td>
            <td><?php echo $row['interests'];?></td>
            <td><?php echo $row['diet'];?></td>
            <td><a href="edit_student.php?S_ID=<?php echo $row['S_ID'];?>">Edit Student</a>
                <a href="delete_student.php?S_ID=<?php echo $row['S_ID'];?>"  class="confirmation" style="text-decoration: none; color: red ">Delete Student</a>
            </td>
        </tr>
        <?php
            }
        }
        $result->close();
        $dbs->close();
        ?>
    </table>
    </div>
    <script type="text/javascript">
        var elems = document.getElementsByClassName('confirmation');
        var confirmIt = function (e) {
            if (!confirm('Are you sure you want to delete this record?')) e.preventDefault();
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


