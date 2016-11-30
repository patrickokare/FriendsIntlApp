<?php include 'dbConnect.php' ?>

<?php
/**
 * Created by PhpStorm.
 * User: wale patrick
 * Date: 4/17/2016
 * Time: 1:51 PM
 */

$sql = "SELECT host.* FROM host, `match` where host.h_id = `match`.h_id Group by `match`.h_id;";
$sql .= "SELECT student.* FROM student inner Join `match` on student.S_ID = `match`.S_ID  WHERE `match`.h_ID = " + $row['h_id'] + ";";

// Execute multi query
if (mysqli_multi_query($dbs,$sql))
{
    do
    {
        // Store first result set
        if ($result=mysqli_store_result($dbs)) {
            // Fetch one and one row
            while ($row=mysqli_fetch_row($result))
            {
                echo $counter;
                echo $row['host.name'];
                echo $row['host.preference'];
                echo $row['host.interests'];
                echo $row['host.interest_nationality'];
                echo $row['host.vegan'];
                echo "<br><br><br><br><br>";
                echo $row['student.name'];
                echo $row['student.age'];
                echo $row['student.gender'];
                echo $row['student.nationality'];
                echo $row['student.diet'];
                echo "<br><br>";

            }
            // Free result set
            mysqli_free_result($result);
        }
    }
    while (mysqli_next_result($dbs));
}

mysqli_close($dbs);
?>
<!--
$sql_query = "SELECT host.* FROM host, `match` where host.h_id = `match`.h_id Group by `match`.h_id;";

$result =  $dbs->

while ($row = $result->fetch_array()) {
    $counter++;

    echo $counter;
    echo $row['name'];
    echo $row['preference'];
    echo $row['interests'];
    echo $row['interest_nationality'];
    echo $row['vegan'];
   echo "<br><br><br><br><br>";

}


    $sql = "SELECT student.* FROM student inner Join `match` on student.S_ID = `match`.S_ID  WHERE `match`.h_ID = " + $row['h_id'] + ";";
    $result2 = $dbs->query($sql);

while ($row2 = $result2->fetch_array()) {

        echo $row2['name'];
        echo $row2['age'];
        echo $row2['gender'];
        echo $row2['nationality'];
        echo $row2['diet'];
        echo "<br><br>";

//}

}

/*$sql = "SELECT student.* FROM student inner Join `match` on student.S_ID = `match`.S_ID  WHERE `match`.h_ID =" + $row['h_id'] + ";";
$
while ($row2 = $result2->fetch_array()) {

    echo $row2['name'];
    echo $row2['age'];
    echo $row2['gender'];
    echo $row2['nationality'];
    echo $row2['diet'];
    echo "<br><br>";*/




?>-->