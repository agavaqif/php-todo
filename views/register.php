<?php
include_once '../header.php';
 ?>


<div class="row col-md-2 offset-md-4">
  <p>Registration Form</p>
  <br>
  <p></p>
  <form action="../includes/register.php" method="POST">
    <div class="form-group">
      <input type="text" class="form-control" id="registerUsername"  placeholder="Enter username" name="user_username">
    </div>
    <div class="form-group">
      <input type="email" class="form-control" id="registerEmail" aria-describedby="emailHelp" placeholder="Enter email" name="user_email">
    </div>
    <div class="form-group">
      <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Enter Password" name="user_password">
    </div>
    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
  </form>
  <?php


  if(isset($_GET["error"])){
    if($_GET["error"]=="empty"){
      echo "Plese fill all the fields";
    }else if($_GET["error"]=="badcharacter"){
      echo "Use proper characters";
    }else if($_GET["error"]=="invalidemail"){
      echo "Email is invalid";
    }else if($_GET["error"]=="used"){
      echo "Email or Username already used.";
    }
  }

   ?>
</div>


<?php
include_once '../footer.php';
 ?>
