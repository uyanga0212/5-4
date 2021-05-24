<?php
function hoosonbish($field){
  if($field != ""){
    return true;
  }return false;
}

if(isset($_POST['email'])){
   foreach($_POST as $index =>$data){
     if(hoosonbish($data) == false){
       die('hooson baina' . $index);
     }
   }
   if($_POST['password'] != $_POST['password_confirmation']){
     header('Location: /register.php?error=confirmation');
     exit();
   }
 $email = $_POST['email'];
 $name = $_POST['name'];
 $username = $_POST['username'];
 $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

$serverip = "162.251.80.117";
$dbusername = "apprenti_uyanga";
$dbpassword = "bondooloi1208/";
$dbname = "apprenti_uyanga";


$conn = new mysqli($serverip, $dbusername, $dbpassword, $dbname);

if($conn->connect_error){
  header("Location: /register.php?error=database");
  exit();
}

 $sql = "SELECT * FROM `users` WHERE `email` = `$email`";
 //echo $sql;
  $result = $conn->query($sql);

  //print_r($result);
  // die();

  if($result->num_rows > 0){
    header("location: /register.php?error=email");
    exit();
  } 
    

  $sql = "SELECT * FROM `users` WHERE `username` = `$username`";
  $result = $conn->query($sql);

  if($result->num_rows > 0){
    header("location: /register.php?error=username");
    exit();
  }
  $insertSql = "INSERT INTO `users` (`name`, `username`, `email`, `password`) VALUE ('$name', '$username', '$email', '$password')";

  $result = $conn->query($insertSql);


  if($result ===TRUE){
    header('Location: /profile.php');
    exit();
  } else {
    header('Location: /register.php?error=unknown');
    exit();
  }
  $conn->close();

} else{
  header('Location: /register.php?ugui');
}
?>