
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
    <title>View Hosts</title>
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
                <h2>All Host Details</h2>
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
    <table style="margin-left: auto; margin-right: auto;" class="table_sommy">
        <tr>
            <th class="table-style">H_ID</th>
            <th class="table-style">Name</th>
            <th class="table-style">Address</th>
            <th class="table-style">PostCode</th>
            <th class="table-style">Telephone Number</th>
            <th class="table-style">E-mail Address</th>
            <th class="table-style">Marital Status</th>
            <th class="table-style">No. Children</th>
            <th class="table-style">Vegeterian Provision</th>
            <th class="table-style">Student Prefrence</th>
            <th class="table-style">Church Attended</th>
            <th class="table-style">Name of Pastor</th>
            <th class="table-style">Special Interests</th>
            <th class="table-style">Interested Nation</th>
            <th class="table-style">Other Information</th>


            <?php
            $sql_query = "SELECT * FROM host";
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
            <td><?php echo $row['status'];?></td>
            <td><?php echo $row['children'];?></td>
            <td><?php echo $row['vegan'];?></td>
            <td><?php echo $row['preference'];?></td>
            <td><?php echo $row['church'];?></td>
            <td><?php echo $row['pastor'];?></td>
            <td><?php echo $row['interests'];?></td>
            <td><?php echo $row['interest_nationality'];?></td>
            <td><?php echo $row['comments'];?></td>
            <td><a href="edit_host.php?h_id=<?php echo $row['h_id'];?>">Edit host</a>
                <a href="delete_host.php?h_id=<?php echo $row['h_id'];?>"  class="confirmation" style="text-decoration: none; color: red ">Delete Host</a>
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


