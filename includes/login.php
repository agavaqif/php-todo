<?php
session_start();
require_once '../config.php';
$username=$_POST["user_username"];
$password=$_POST["user_password"];
$passwordHashed=password_hash($password,PASSWORD_DEFAULT);

if(empty($username) || empty($passwordHashed)){
  header("location:../views/login.php?error=empty");
  exit();
};
$sql="SELECT * FROM  users where user_username=?";
if($stmt=$conn->prepare($sql)){
  $stmt->bind_param('s',$username);
  if($stmt->execute()){
    $result=$stmt->get_result();
    if($result->num_rows==1){
      $row = $result->fetch_array(MYSQLI_ASSOC);
      if(password_verify($password, $row["user_password"])){
        $_SESSION["username"]=$username;
        header("location:../index.php");
      }else{
        header("location:../views/login.php?error=wrongpass");
        exit();
      }
    }else{
      header("location:../views/login.php?error=wronguser");
      exit();
    }
  }else{
    echo "DB Error";
  }
  $stmt->close();

}else{
  echo "SERVER error";
}

$conn->close();



 ?>
