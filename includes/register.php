<?php
require_once '../config.php';
$username=$_POST["user_username"];
$email=$_POST["user_email"];
$password=$_POST["user_password"];
$passwordHashed=password_hash($password,PASSWORD_DEFAULT);



if(isset($_POST["submit"])){
  $result = $conn->query("SELECT * FROM users WHERE user_email='$email' OR user_username='$username'") or die($mysqli->error());
  if ( $result->num_rows > 0 ) {
      header("location:../views/register.php?error=used");
      exit();
  }else if(empty($username) || empty($email) || empty($passwordHashed)){
    header("location:../views/register.php?error=empty");
    exit();
  }else if(preg_match('/[^a-z0-9\-\_\.]+/i',$username))
      {
        header("location:../views/register.php?error=badcharacter");
        exit();
  }else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    header("location:../views/register.php?error=invalidemail");
    exit();
  }else{
    $sql="Insert into users (user_username,user_email,user_password) values(?,?,?)";
    if($stmt=$conn->prepare($sql)){
      $stmt->bind_param('sss',$username,$email,$passwordHashed);
      if($stmt->execute()){
        header("location:../views/login.php");
      }else{
        echo "Some Error";
      }
      $stmt->close();

    }else{
      echo "stmt error";
    }

    $conn->close();
  }


}



 ?>
