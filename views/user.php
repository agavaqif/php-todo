<?php
include_once '../header.php';
include_once '../config.php';

$sql="SELECT * from todo where todo_author=?";
$stmt=$conn->prepare($sql);
$stmt->bind_param('s',$_SESSION["username"])
 ?>
<br>
<div class="container">
  <form method="POST">
    <button name="create" class="btn btn-warning">CREATE TODO</button>
  </form>

</div>

<?php
if(isset($_POST["create"])){
echo ' <div class="container">
   <form class="form-inline"  method="POST" style="margin-top:50px;">
   <label for="todo">TODO:</label>
   <br>
   <input type="text" name="content" class="form-control" id="todo" style="width:80%;">
   <button type="submit" class="btn btn-primary" name="submit">Submit</button>
 </form>
 </div>';

}

if(isset($_POST["submit"])){
  $content=$_POST["content"];
  $author=$_SESSION["username"];
  $sql="Insert into todo (todo_content,todo_author) values(?,?)";
  if($stmt=$conn->prepare($sql)){
    $stmt->bind_param('ss',$content,$author);
    if($stmt->execute()){
      header("location:../index.php");

      echo "DONE";
    }else{
      echo "Some Error";
    }
    $stmt->close();

  }else{
    echo "stmt error";
  }

  $conn->close();
}


 ?>



 <?php
 include_once '../footer.php';
  ?>
