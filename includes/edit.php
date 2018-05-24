<?php
require_once '../config.php';
header('Content-Type: text/plain');
  $test = utf8_encode($_POST['data']); // Don't forget the encoding
  $data = json_decode($test);
  $content=$data->content;
  $id=$data->id;
  $sql="UPDATE todo SET todo_content=? WHERE todo_id=?";
  $stmt=$conn->prepare($sql);
  $stmt->bind_param('ss',$content,$id);
  $stmt->execute();
  exit();
 ?>
