<?php
session_start();


if(isset($_POST['email']) && isset($_POST['password'])){

    $email = $_POST['email'];

    $serverip = "162.251.80.117";
    $dbusername = "apprenti_uyanga";
    $dbpassword = "bondooloi1208/";
    $dbname = "apprenti_uyanga";

    $conn = new mysqli($serverip, $dbusername, $dbpassword, $dbname);

if($conn->connect_error){
  header("Location: /register.php?error=database");
  exit();
}

 $sql = "SELECT * FROM `users` WHERE `email` = ''$email'";
  $result = $conn->query($sql);

  if($result->num_rows == 1){
      $row = $result->fetch_assoc();
      if(password_verify($_POST['password'], $row['password'])){
        $_SESSION['username'] = $row['username'];
        header("Location: /profile.php");
        exit();
      } else{
        header("Location: /?aldaa=password");
        exit();
      }
    //   while($row = $result->fetch_assoc()){
    //     echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " "
  } else{
    header("Location: /?aldaa=num_rows");
    exit();
  }
 } else{
    header("Location: /");
    exit();
  }

?>