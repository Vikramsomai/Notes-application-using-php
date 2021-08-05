<?php
$conn=mysqli_connect("localhost","root","","notes");


?>
<!DOCTYPE html>
<html lang="en">
<head>
<link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"
    />
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style/style.css">
</head>
<body>
    <div class="container">
        <div class="head">
            <div class="logo">notes app</div>
        </div>
   <div class="notes-menu">
       <button class="btn">add notes</button>
   </div>
    
        <div class="notes-area">
        <?php
$conn=mysqli_connect("localhost","root","","notes");


           $query="select * from notes order by id desc";
           $data=mysqli_query($conn,$query);
           while($res=mysqli_fetch_assoc($data))
           {
            echo'<div class="notes "  contenteditable=true data-id='.$res["id"].' data-status=update >
            <div class="trash" contenteditable=false><i class="fa fa-trash delete" data-delete=delete data-id='.$res["id"].'></i></div>
            '.$res['description'].'
           
            </div> ';
 }
 ?>
            </div>
    </div>
   
</body>
<script>
$(document).ready(function()
{
   // $('.notes-area').load("select.php"); 

    $(".delete").click( function()
      {
          
          var del=$(this).data("delete");
          var id=$(this).data("id");
    
          $.ajax({
        url:'update.php',
        type:'POST',
        data:{id:id,status:del},
        success: function(res)
        {
        $('.notes-area').load("select.php");
        }
      });
    })
    $('.btn').click(function(){
      $(".notes-area").prepend("<div class='notes notes-insert' contenteditable=true data-status=insert ></div>");

     
    $(".notes").on("mouseleave", function()
    {
       
        var notes=$(this).text();
        
        var status=$(this).data("status");
        $.ajax({
        url:'update.php',
        type:'POST',
        data:{notes:notes,status:status},
        success: function(res)
        {
            $('.notes-area').load("select.php");
       
        }

    })
    });
    })




    $(".notes").on("keyup", function()
    {
        var notesid=$(this).data("id");
        var notes=$(this).text();
        var status=$(this).data("status");
       
        $.ajax({
        url:'update.php',
        type:'POST',
        data:{id:notesid,notes:notes,status:status},
        success: function(res)
        {
            $('.notes-area').load("select.php");
        }

    })
    })
   
})
</script>
</html>