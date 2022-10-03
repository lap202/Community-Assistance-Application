<?php
    $servername='192.64.86.141';
    $username='andrewba_user';
    $password='goldenuser';
    $dbname = "andrewba_communityassistance";
    $conn=mysqli_connect($servername,$username,$password,"$dbname");
      if(!$conn){
          die('Could not Connect MySql Server:' .mysql_error());
        }
?>
