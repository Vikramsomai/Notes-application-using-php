<?php
$conn=mysqli_connect("localhost","root","","notes");

if(isset($_POST["notes"]) && $_POST["status"]=="update")
{
    echo $_POST["status"];
$id=$_POST["id"];
$notes=$_POST["notes"];
echo $query="update notes set description='$notes' where id=$id";
$data=mysqli_query($conn,$query);
}
else if($_POST["status"]=="insert")
{
  
    $id=$_POST["id"];
    $notes=$_POST["notes"];
    echo $query="insert into notes(description)values('$notes')";
    $data=mysqli_query($conn,$query);
}
else if($_POST["status"]=="delete")
{
  
    $id=$_POST["id"];
   
    echo $query="delete from notes where id=$id";
    $data=mysqli_query($conn,$query);
}
else
{
    echo "data not";
}

?>