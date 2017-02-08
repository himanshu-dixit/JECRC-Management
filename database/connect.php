<?php
  $servername = "localhost"; //The  Ip Address of Database
  $username = "root"; //Username Of Database
  $password = "manudixc0"; //Passowrd Of Database
  $dbname = "db_maiet"; //Name Of Database
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password); //Establising Connection With Database
?>
