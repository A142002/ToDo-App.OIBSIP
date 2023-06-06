<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
   .image
   {
    margin-right:50px;
    float: right;
   }
   .edit
   {
    margin-left:50px;
    margin-top:80px;
    width:600px;
    height:200px;
    background-color:white;
    border:2px solid black;
    padding:10px
   }
   .btn{
    margin-left:200px;
    height:50px;
    width:150px;
    box-shadow: inset 5px 5px 8px #e60073,
        inset -5px -5px 8px #e60073; 
    border:2px solid black;
    font-size:18px;
    font-family:serif;

}
.btn:hover{
    background:#CA226B;
}
.text
{   padding-left:8px;
    border:1px solid black;
     height:35px;
     width:580px;
     
}
.text:hover
{
    background-color:#48D1CC;
    
}
   
  </style>
  <title>ToDo'S List App!</title>
</head>

<body style="background-color: #ececec;">
  <h1 >Update Yout ToDo'S List</h1>
  <img src="./cartoon.avif" width=600px height=500px; class="image"/>
  <?php
                include 'database.php';
                $id=$_GET['id'];
                $sql="SELECT * FROM todos WHERE id=".$id;

                $result = mysqli_query($conn, $sql);

                if($result){   
                    $row=mysqli_fetch_assoc($result);
                    $title=$row['Title'];


                }


            ?>
  <div class="edit">
    <form action="editaction.php" method="post" autocomplete="off">
      <div class="form">
       <b> <label for="title"style="font-size:25px">Title</label></b>
        <input class="text" type="text" name="title" id="title" value="<?php global $title; echo $title ?>" placeholder="Edit Here Your ToDo'S"
          Required>
          <input type="hidden" name="id" id="id" value="<?php echo $id ?>">
      </div><br>
      <button class="btn">Update ToDo'S</button>
    </form>
  </div>
  
</body>

</html>