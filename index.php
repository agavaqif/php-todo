<?php
include_once 'header.php';
include_once 'config.php';

$sql="SELECT * FROM todo where todo_author=?";
$stmt=$conn->prepare($sql);
$stmt->bind_param('s',$_SESSION["username"]);
$stmt->execute();
$result=$stmt->get_result();

?>

<div class="container">
  <p>TODO LIST:</p>
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Task Name</th>
        <th>Author</th>
        <th>Email</th>
      </tr>
    </thead>
    <tbody>
      <?php
      while($row = $result->fetch_array(MYSQLI_ASSOC)){
        echo '<tr>
          <td>'.$row["todo_content"].'</td>
          <td>'.$row["todo_author"].'</td>
          <td id='.$row["todo_id"].'>

          <i class="fas fa-edit" onclick=edit(this)></i>
          <form action="/includes/remove.php" method="POST" style="display:inline;">
            <i class="fas fa-trash-alt" name="delete" onclick=remove(this) ></i>
          </form>
            </td>
        </tr>
        ';
      }
        ?>


    </tbody>
  </table>
</div>

<script>
function remove(element){
  element.parentElement.parentElement.parentElement.remove();
  var id=element.parentElement.parentElement.id;
  console.log(id);
  $.ajax({
  type: "POST",
  url: "/blog/includes/remove.php",
  data:"id="+id,
  success:function(msg){
    console.log(msg);
  }
});
}

function edit(element){
  var id=element.parentElement.id;
  var form="<input name='editValue' class='form-control' > </input>";
  var button="<button name='edit' class='btn btn-success' id="+id+" onclick='change(this)'>Submit </button>";
  var parent=element.parentElement.parentElement;
  $(parent).after("<tr><td>"+form+"</td>  <td></td>  <td>"+button+"</td></tr>");
}

function change(element){
  var parent=$(element).parent()
  console.log(parent);
  var data = {
  content:parent.siblings().find("input").val(),
  id:element.id
};
console.log(data.content);
parent.parent().prev().find('td:first').html(data.content);
  $.ajax({
  type: "POST",
  url: "/blog/includes/edit.php",
  dataType: "text",
  data:{ data: JSON.stringify( data ) },
  success:function(msg){
    parent.parent().remove();
  }
});
}

</script>

<?php
include_once 'footer.php'
 ?>
