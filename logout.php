<?php
session_start();

/**
To end a session and clear up its data, use this code:
<?php
session_start();
$_SESSION = array();
session_destroy();
?>

 **/


if(session_destroy()) {
    header("Location: index.php");
}

?>

