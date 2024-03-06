<?php
include_once 'db.php';
if(isset($_POST['save'])){
    $fn = $MySQLiconn -> real_escape_string($_POST['fn']);
    $ln = $MySQLiconn -> real_escape_string($_POST['ln']);
    $photo = $MySQLiconn -> real_escape_string($_POST['photo']);
    $job = $MySQLiconn -> real_escape_string($_POST['job']);
    $words = $MySQLiconn -> real_escape_string($_POST['words']);
    $inspire = $MySQLiconn -> real_escape_string($_POST['inspire']);
    $dislike = $MySQLiconn -> real_escape_string($_POST['dislike']);
    $SQL = $MySQLiconn -> query("INSERT INTO students(fn,ln,photo,job,words,inspire,dislike) VALUES('$fn','$ln','$photo','$job','$words','$inspire','$dislike')");
    echo $SQL;
    if(!$SQL){
        echo $MySQLiconn -> error;
    }

}

if(isset($_GET['del'])){
    $SQL = $MySQLiconn -> query("DELETE FROM students WHERE id=".$_GET['del']);

    header('Location:edit.php');
}

if(isset($_GET['edit'])){
    $SQL = $MySQLiconn -> query("SELECT * FROM students where id=".$_GET['edit']);
    $getROW = $SQL->fetch_array();
}

if(isset($_POST['update'])){
    $SQL = $MySQLiconn -> query("UPDATE students SET fn='".$_POST['fn']."', ln='".$_POST['ln']."',photo='".$_POST['photo']."',job='".$_POST['job']."',words='".$_POST['words']."',inspire='".$_POST['inspire']."',dislike='".$_POST['dislike']."' WHERE id=".$_GET['edit']);
    header('Location:edit.php');
}
?>