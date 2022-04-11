<?php
header('Access-Control-Allow-Origin: *');
if(!isset($_GET['id']))
{
    die("NO1");
}
if(!isset($_GET['name']) || !isset($_GET['lastName']) || !isset($_GET['age']))
{
    die("NO");
}
$name = $_GET['name'];
$lastName = $_GET['lastName'];
$age = $_GET['age'];
$id = $_GET['id'];
include "connect.php";
if ($sql = $baza->prepare("UPDATE `cars` SET `isActive` = ?, age = ?, first_name = ?, last_name = ? WHERE `cars`.`id` = ?")) {

    $active = "false";
    if(isset($_GET['active']))
    {
        $active = "true";
    }
    $sql->bind_param("sissi", $active, $age, $name, $lastName, $id);
    $sql->execute(); //wykonaj SQL
    $sql->close();
}
$baza->close();
