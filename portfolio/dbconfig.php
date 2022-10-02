<?php
    $conn = mysqli_connect("localhost","root","","site");


    if($conn->connect_error){
        echo $conn->connect_error;
    }