<?php

//connect database
$connect = mysqli_connect("localhost","root", "","dbwaterlevel");

//read distance from nodemcu
$tinggi = $_GET['tinggi'];

//Update in Table DB
mysqli_query($connect, "UPDATE tb_tangki SET tinggi='$tinggi'");


?>