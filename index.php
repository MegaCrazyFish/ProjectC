<?php include_once 'crud.php'?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File</title>
    <style>
        body{
            display:flex;
            justify-content:center;
            align-items:center;
        }
        .card {
            margin-right:20px;
            width:15%;
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
            transition: 0.3s;
            display:flex;
            justify-content:center;
            align-items:center;
            flex-direction:column;
            padding-bottom: 20px;

        }   

        .card:hover {
        box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
        }

        .container {
        padding: 2px 10px;
        
        }
    </style>
</head>
<body>  
    <?php
    $res = $MySQLiconn->query("SELECT * FROM students");
    while($row = $res->fetch_array()){
        ?>
   <div class="card">
   <?php echo '<img src="' . $row['photo'] . '.png">';?>

    <div class="container">
    <h2><b>Name: <?php echo $row['fn'].$row['ln'];?></b></h2>
        <p>Role: <?php echo $row['job'];?></p>
        <p>Dream: <?php echo $row['words'];?></p>
        <p>Inspire: <?php echo $row['inspire'];?></p>
        <p>Dislike: <?php echo $row['dislike'];?></p>
        <button><a href= "edit.php">Edit</a></button>

    </div>
    </div>
    <?php
    }?>
</body>
</html>