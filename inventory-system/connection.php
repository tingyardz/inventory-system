<?php
$serverName = "localhost";
$userName = "root";
$password = "";

try{
    
    //set connection
    $connect = mysqli_connect($serverName,  $userName,  $password);

    //create database
    $sql = "CREATE DATABASE IF NOT EXISTS `inventory_database`";
    $query = $connect->query($sql) or die ($connect->error);

    //set connection with database
    $database = "inventory_database";
    $connect = mysqli_connect($serverName,  $userName,  $password,  $database);

}
catch(Exception $except){

    echo $except->getMessage();

}
?>