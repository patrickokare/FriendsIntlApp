<?php
define('DB_SERVER','ap-cdbr-azure-east-c.cloudapp.net');
define('DB_USERNAME','b3c438583f3e44');
define('DB_PASSWORD','3cf27899');
define('DB_DATABASE','friendshiplink');

$dbs = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

// test if connection was established, and print any errors
if($dbs ->connect_errno){
    die('Connectfailed['.$dbs->connect_errno.']');}


?>

