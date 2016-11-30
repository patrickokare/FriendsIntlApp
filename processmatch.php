<?php
include 'dbConnect.php';
/**
 * Created by PhpStorm.
 * User: wale patrick
 * Date: 4/11/2016
 * Time: 10:34 PM
 */

 if(isset($_POST['hostSelected'])){

    $getHostId = $_POST['hostSelected'];
     $select = "select * from host where h_id = $getHostId";
     $results = $dbs->query($select);
     $row = array();
     if(mysqli_num_rows($results)>0){
         $row = $results->fetch_assoc();
     }
     $h_email = $row['email'];
     $name = $row['name'];
     $food = $row['vegan'];
     $gender = $row['preference'];
     $hobbies = $row['interests'];
     $nation = $row['interest_nationality'];


     foreach($_POST['studentSelected'] as $student){

         $sql = "INSERT INTO `match` (`h_id`, `S_ID`)
            VALUES ('$getHostId', '$student')";
         if($query = $dbs ->query($sql)){

             //setting some variables with form value

//email subject
             $subject = "Friendship Link has been created for you!";


//email body in html
//ATTENTION, THE LINK MAY POINT TO THE MASTER DOMAIN, RATHER THAN YOUR OWN xxx.PHP
             $txt = "Dear $name,
					<br><br>
					Thank you for being a part of International Students Friendship Link
					<br><br>
					You have a match on the friendship link program.
					<br><br>
					This match was made based on your preferences at sign-up:
					<br>
					Gender prefrence: $gender
					<br>
					Interested Nationality to host: $nation
					<br>
					Hobbies: $hobbies

					<br><br>
					Please contact Kathrine on kathrine@friendsUk.com for more infomation on the student selected.
					<br><br>
					King Regards,
					<br><br>
					The Friendship link";

            //take in the necessary swiftmailer code
            require_once 'swiftmailer/lib/swift_required.php';

            $transport = Swift_SmtpTransport::newInstance('smtp.gmail.com', 465,'ssl')->setUsername('ukpehmfon@gmail.com')->setPassword('seveneleven711');

            $mailer = Swift_Mailer::newInstance($transport);
            $message = Swift_Message::newInstance('FriendshipLink: student matched')
                ->setFrom(array('ukpehmfon@gmail.com' => 'Friendship link'))
                ->setTo(array($h_email => $h_email))
                ->setBody($txt, 'text/html');
            $mailer->send($message);

            echo "Successful";
        header("Location: create_matches.php?s=1");
        }else{
        echo "Error" . $sql. '<br>'.mysqli_error($dbs);
        header('Location: create_matches.php?f=1');
        }
    }
}
    else{
header('Location: create_matches.php');
    }

/*
 *
 */

?>
