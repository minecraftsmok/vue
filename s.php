<?php
header('Access-Control-Allow-Origin: *');
if(!isset($_GET['name']) || !isset($_GET['lastName']) || !isset($_GET['age']))
{
    die("NO");
}
$name = $_GET['name'];
$lastName = $_GET['lastName'];
$age = $_GET['age'];
include "connect.php";
if ($sql = $baza->prepare("INSERT INTO `cars` (`id`, `isActive`, `age`, `first_name`, `last_name`) VALUES (NULL, ?, ?, ?, ?)")) {
    $active = "false";
    if(isset($_GET['active']))
    {
        $active = "true";
    }
    $sql->bind_param("siss", $active, $age, $name, $lastName);
    $sql->execute(); //wykonaj SQL
    $sql->close();
}
$baza->close();
