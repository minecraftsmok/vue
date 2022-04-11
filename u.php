<?php
header('Access-Control-Allow-Origin: *');
if(!isset($_GET['id']))
{
    die("NO1");
}
$id = $_GET['id'];
include "connect.php";
if ($sql = $baza->prepare("DELETE FROM `cars` WHERE `cars`.`id` = ?")) {

    $sql->bind_param("i", $id);
    $sql->execute(); //wykonaj SQL
    $sql->close();
}
$baza->close();
