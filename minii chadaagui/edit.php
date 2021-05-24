<?php
include 'logincheck.php';
if(isset($_POST['name']) && $_POST['name'] != ""){

    $name = $_POST['name'];
    $username = $_SESSION['username'];
    $serverip = "162.251.80.117";
    $dbusername = "apprenti_uyanga";
    $dbpassword = "bondooloi1208/";
    $dbname = "apprenti_uyanga";

    $conn = new mysqli($serverip, $dbusername, $dbpassword, $dbname);

if($conn->connect_error){
  header("Location: /register.php?error=database");
  exit();
}

 $sql = "UPDATE `users` set `name` = '$name' WHERE `username` = ''$username'";
  $result = $conn->query($sql);

  if($result === TRUE){
    header("Location: /profile.php");
    exit();
  } else{
    header("Location: /profile.php?aldaa=query");
    exit();
  }
 } else{
    header("Location: /");
    exit();
  }

?>