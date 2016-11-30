<?php ?>
<?php include 'dbConnect.php' ;
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
    <title>Create Link</title>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <link type="text/css" rel="stylesheet" href="css/stylesheet.css"/>
    <link href="images/favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon" />
    <script src="https://code.jquery.com/jquery-2.2.3.min.js" integrity="sha256-a23g1Nt4dtEYOj7bR+vTu7+T8VP13humZFBJNIYoEJo="   crossorigin="anonymous"></script>
    <style type="text/css">
    *{
        margin: 0;
        padding: 0;
    }
    .middle{
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translateX(-50%) translate(-50%);
            text-align: center;
        }

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
<!-- end of Header -->


<!-- Start of Main-->
<main>

    <div id="title">
        <header>
            <h2> Student & Host - Table Explorer </h2>
        </header>
    </div>


     <span style="text-align: center">
            <?php if($_GET['s']) {
                echo '<span style="color: blue; text-align: center; font-size: smaller"   >Link created!</span>';
            }elseif ($_GET['f']) {echo'<span style="color: blue; text-align: center; font-size: smaller">Student already matched</span>';}
            ?>

        </span>


    <div id="hosttable" style=" overflow-y: scroll ;width: 40%; float: left; font-size: small; height: 400px; margin-bottom: 50px;">

        <form name="submitMatch" id="submitMatch" action="processmatch.php" method="post">
        <table id="host_table" class="table_sommy">
            <caption>Select Host to Link</caption>
            <thead>
            <tr>
                <th></th>
                <th>SN</th>
                <th>Name</th>
                <th>Student preference</th>
                <th>Interests</th>
                <th>Country</th>
                <th>Accomodate Vegans</th>
            </tr>
            </thead>
            <tbody>
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
                        <!--<td><input type="checkbox" name="studentSelected" id="studentSelected" value="<?php
                            //echo $row["h_id"]; ?>" onchange="this.disabled = 'disabled';" /></td> -->

                        <td><input type="radio" name="hostSelected" id="studentSelected" value="<?php
                            echo $row["h_id"]; ?>" /></td>
                        <td><?php echo $counter;?></td>
                        <td><?php echo $row['name'];?></td>
                        <td><?php echo $row['preference'];?></td>
                        <td><?php echo $row['interests'];?></td>
                        <td><?php echo $row['interest_nationality'];?></td>
                        <td><?php echo $row['vegan'];?></td>
                    </tr>
                    <?php
                }
            }
            $result->close();
            ?>
            </tbody>

        </table>

    </div>

<div class="middle">

   <button class="confirmation" id="match" name="match" type="submit" style=" color:darkorange;border-radius: 5000px ">MATCH</button>


</div>

    <div id="studenttable" style=" overflow-y: scroll; width:40%; float: right; font-size: small; height: 400px; margin-bottom: 50px;">
            <table id="student_table" class="table_sommy">
                <caption>Select Student(s) to Link</caption>
            <thead>
            <tr>
                <th></th>
                <th>SN</th>
                <th>Name</th>
                <th>Age</th>
                <th>Gender</th>
                <th>Country</th>
                <th>Diet</th>
            </tr>
            </thead>
                <tbody>
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
                            <td><input type="checkbox" name="studentSelected[]" value="<?php echo $row["S_ID"]; ?>" /></td>
                            <td><?php echo $counter;?></td>
                            <td><?php echo $row['name'];?></td>
                            <td><?php echo $row['age'];?></td>
                            <td><?php echo $row['gender'];?></td>
                            <td><?php echo $row['nationality'];?></td>
                            <td><?php echo $row['diet'];?></td>
                        </tr>
                        <?php
                    }
                }
                $result->close();
                $dbs->close();
                ?>
                </tbody>
        </table>
    </div>

    <script type="text/javascript">
        var elems = document.getElementsByClassName('confirmation');
        var confirmIt = function (e) {
            if (!confirm('Are you sure you want to create this match? ' +
                    'An email notification will be sent to the host if successful. ')) e.preventDefault();
        };
        for (var i = 0, l = elems.length; i < l; i++) {
            elems[i].addEventListener('click', confirmIt, false);
        }
    </script>
    </form>





</main>
<!-- End of Main-->


<footer>
    <p>
        <a href="#top"><img alt="" src="images/fi-logo-reverse.png" style="width: 200px; height: 100px;" title="Back to top"></a>
    </p>
    <p>Copyright © 2016 Team B(eta) </p>

</footer>

<!--
<script type="application/javascript">
    function enable() {
        var x = document.getElementById("studentSelected");
        x.removeAttribute("disabled", "false");
    }

    function disable() {
        var x = document.getElementById("studentSelected");
        x.setAttribute("disabled", "true");
    }
    document.getElementById("studentSelected").addEventListener("change", enable);
    //document.getElementById("btn2").addEventListener("click", disable);
</script>
-->
</body>
</html>
