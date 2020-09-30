<?php 
  //ตัวแปรเก็บข้อมูลและฐานข้อมูล
  $servername = "localhost";
  $username = "root";
  $password ="";
  $dbname="register_db";

  //Create Connection
  $conn = mysqli_connect($servername,$username,$password,$dbname);

  //Check connection
  if(!$conn){
    die("Connection falied" . mysqli_connect_error());
  } 

?>