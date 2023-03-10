<?php

$server="localhost";
$username="saurabh";
$password="Saurabh@8442";
$database = "ipl_fixture";

/* Create database  connection with correct username and password*/

$connect=new mysqli($servername,$username,$password,$database);

/* Check the connection is created properly or not */
if($connect->connect_error)
    echo "Connection error:" .$connect->connect_error;
else
    echo "Connection is created successfully";     ?>