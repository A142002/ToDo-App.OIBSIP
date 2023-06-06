<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    
        <link rel="stylesheet" href="style.css">
    <title>ToDo'S List App!</title>
  </head>
  <body style="background-image: url('./back.avif'); background-repeat: no-repeat; background-size: cover;">
    
    <h1 >ToDo'S List App</h1>
  
    <div class="todo" style="width:600px;height:180px;background-color:white;color:black;padding:10px;border:2px solid black;margin-left:50px;">
    <form action="data.php" method="post" autocomplete="off">
        <div class="form">
            <b><label for="title"style="font-size:25px">Title</label><b>
            <br><br>
            <input class="text" type="text" name="title" id="title" placeholder="Type Here To Add On ToDo'S" Required >

        </div><br>
        <button class="btn">Add To ToDo'S</button>

    </form>

    </div><br>
    <hr class="line">
    <div class="list">
        <h1>Your Lists</h1>
        <div id="lists">
        <table class="table">
  <thead>
    <tr class="border-bottom">
     
      <th scope="col" name="id"style="width:10%;border-bottom: 1px solid white;">Status</th>
      <th scope="col"style="width:10%;">S.no</th>
      <th scope="col"style="width:60%;">ToDo List</th>
    <th style="width:30%;">Action</th>
    </tr>
  </thead>
  <tbody>
  <?php
        include 'database.php';
        $sql="SELECT * FROM todos";
        $result=mysqli_query($conn, $sql);

        if($result){
            while($row=mysqli_fetch_assoc($result)){
                $id=$row['id'];
                $title=$row['Title'];
               


                ?>
                <tr style="height:40px;">
                     <td><input type="checkbox"style="width:20px;height:20px;"></td>
                    <td><?php echo $id ?></td>
                    <td><?php echo $title  ?></td>
                    <td>
                    <a class="b" href="edit.php?id=<?php echo $id ?>" role="button"><img src="./edit.png" width=27px height=27px/></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a class="b" href="delete.php?id=<?php echo $id ?>" role="button"><img src="./delete.png" width=27px height=27px/></a>
 
                    </td>
                      
                </tr>

                <?php

                
            }
        }
    ?>
    
   
  </tbody>
</table>
        </div>
    </div>
    <script>
  document.addEventListener('DOMContentLoaded', function() {
    const checkboxes = document.querySelectorAll('input[type="checkbox"]');
    checkboxes.forEach(function(checkbox) {
      checkbox.addEventListener('change', function() {
        const listItem = this.closest('tr').querySelector('td:nth-child(3)');
        listItem.classList.toggle('completed');
      });
    });
  });
</script>

   
  </body>
</html>