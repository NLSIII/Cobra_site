<?php
include_once 'cobra-config.php';
$mysqli = new mysqli(HOST, USER, PASSWORD, DATABASE);
if ($mysqli->connect_error) 
{
    header("Location: ../cobra_error.php?message=SQL_broke_;(_.lol");
    exit();
}