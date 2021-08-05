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