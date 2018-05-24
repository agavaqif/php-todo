<!DOCTYPE html>
<?php
session_start();
 ?>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
</head>
<body>


<nav class="navbar navbar-expand-sm bg-success navbar-dark">
  <ul class="navbar-nav">

    <li class="nav-item active">
      <a class="nav-link" href="/blog/index.php">Home</a>
    </li>

    <?php
      if(!isset($_SESSION["username"])){
        echo '<li class="nav-item">
          <a class="nav-link" href="/blog/views/login.php">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/blog/views/register.php">Register</a>
        </li>';
      }
     ?>
  </ul>

  <?php
  if(isset($_SESSION["username"])){
    echo '<ul class="navbar-nav ml-auto">
       <li class="nav-item">
         <a class="nav-link" href="/blog/views/user.php">'.$_SESSION["username"].'</a>
       </li>
     </ul>
     <form action="includes/logout.php" action="POST">
       <button name="logout" class="btn btn-success">Logout</button>
     </form>';
  }


   ?>
</nav>
