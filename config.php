<?php
 $DB_SERVER = 'localhost';
 $DB_USERNAME = 'root';
 $DB_PASSWORD = '';
 $DB_NAME = 'employee';

 $con = mysqli_connect($DB_SERVER, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);


 ##check connection
 if($con == false){
    die("ERROR: could not connect to db". mysqli_connect_error());
 }
?>