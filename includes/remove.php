<?php
require_once '../config.php';

$sql="DELETE FROM todo where todo_id=?";
if($stmt=$conn->prepare($sql)){
  $stmt->bind_param('s',$_POST["id"]);
  $stmt->execute();
}else{
  echo "Error";
};

 ?>
