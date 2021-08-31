<?php
    $con=mysqli_connect("localhost","root","","mycart");
    if(!$con){
        die("Database connection failure..".mysqli_connect_error());
    }
    
?>