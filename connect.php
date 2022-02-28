<?php
$baza = new mysqli("localhost", "root", "","test2");
if(mysqli_connect_error()) die("Bład ".mysqli_connect_error());
$baza->set_charset("utf8");
?>