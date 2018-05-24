<?php
include_once '../header.php';
 ?>


<div class="row col-md-2 offset-md-4">
  <p>Login Form</p>
  <br>
  <p></p>
  <form action="../includes/login.php" method="POST">
    <div class="form-group">
      <input type="text" class="form-control" id="registerUsername"  placeholder="Enter username" name="user_username">
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
    }else if($_GET["error"]=="wrongpass"){
      echo "Password is wrong";
    }else if($_GET["error"]=="wronguser"){
      echo "Username is wrong";
    }
  }

   ?>
</div>


<?php
include_once '../footer.php';
 ?>
