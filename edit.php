<?php
include_once 'crud.php'
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <style>
   .table-style, #form {
    margin: auto;
    padding: 20px;
   
    width: 80%;
    max-width: 600px;
}

.table-style table, .table-style th, .table-style td, #form table, #form th, #form td {
    border: 1px solid #ddd;
}

.table-style td, .table-style th, #form td, #form th {
    text-align: left;
    padding: 8px;
}

.table-style tr:nth-child(even), #form tr:nth-child(even) {
    background-color: #f2f2f2;
}

.table-style tr:hover, #form tr:hover {
    background-color: #ddd;
}

.table-style th, #form th {
    background-color: #007bff;
    color: white;
}


    #form input[type='text'] {
        width: calc(100% - 22px); 
        padding: 10px;
        margin: 5px 0;
        border-radius: 5px;
        border: 1px solid #ccc;
        box-sizing: border-box; }

    #form button {
        width: 100%;
        padding: 10px;
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
        transition: background-color 0.3s ease;
    }

    #form button:hover {
        background-color: #0056b3;
    }

    #form td, #form th {
        text-align: left;
        padding: 8px;
    }

    #form tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    #form tr:hover {
        background-color: #ddd;
    }

    #form th {
        padding-top: 12px;
        padding-bottom: 12px;
        background-color: #007bff;
        color: white;
    }
</style>

    <title>Document</title>
</head>
<body>
    <center>
        <div id='form'>
            <form method = 'post'>
               <table width="100%" border ="1" cellpadding="10">
                <tr>
                    <td><input type='text' name='fn' placeholder ='First Name' value = "<?php if(isset($_GET['edit'])) echo $getROW['fn'];?>"/></td></tr>
                    <tr>
                    <td><input type='text' name='ln' placeholder ='Last Name' value = "<?php if(isset($_GET['edit'])) echo $getROW['ln'];?>"/></td></tr>
                    <tr>
                    <td><input type='text' name='photo' placeholder ='Photo(3 digits)' value = "<?php if(isset($_GET['edit'])) echo $getROW['photo'];?>"/></td></tr>
                    <tr>
                    <td><input type='text' name='job' placeholder ='Pokemon' value = "<?php if(isset($_GET['edit'])) echo $getROW['job'];?>"/></td></tr>
                    <tr>
                    <td><input type='text' name='words' placeholder ='Leave some words' value = "<?php if(isset($_GET['edit'])) echo $getROW['words'];?>"/></td></tr>
                    <tr>
                    <td><input type='text' name='inspire' placeholder ='Inspire' value = "<?php if(isset($_GET['edit'])) echo $getROW['inspire'];?>"/></td></tr>
                    <tr>
                    <td><input type='text' name='dislike' placeholder ='Dislike' value = "<?php if(isset($_GET['edit'])) echo $getROW['dislike'];?>"/></td></tr>
       <tr><td>
       
       <?php if(isset($_GET['edit'])){
        ?>
        <button type='submit' name='update'>Update</button>
        <?php
       }else{
        ?>       
        <button type='submit' name='save'>Save</button>
        <?php
       }?>
        </tr></td></table></form>     
        <br/> <br/>  

        <table width="100%" border="1" cellpadding="10" align ="center">
        <?php
            $res = $MySQLiconn->query("SELECT * FROM students");
            while($row = $res->fetch_array()){
        ?>
        <tr id='formedit'>
            <td><?php echo $row ['id'];?></td>   
            <td><?php echo $row ['fn'];?></td>   
            <td><?php echo $row ['ln'];?></td>   
            <td><?php echo '<img src="' . $row['photo'] .'.png"/>';?></td>   
            <td><?php echo $row ['job'];?></td>   
            <td><?php echo $row ['words'];?></td>   
            <td><?php echo $row ['inspire'];?></td>   
            <td><?php echo $row ['dislike'];?></td>  
            <td><a href="?edit=<?php echo $row['id'];?>" onclick="return confirm('Would you like to change the profile?');">edit</a></td> 
            <td><a href="?del=<?php echo $row['id'];?>" onclick="return confirm('Would you like to delete the profile?');">delete</a></td> 
            <td><a href="index.php?=<?php echo $row['id'];?>" onclick="return confirm('Would you like to go to the homepage?');">See profile</a></td> 
            </tr>
            <?php
        }?></table></div>
                    
</center>
</body>
</html>