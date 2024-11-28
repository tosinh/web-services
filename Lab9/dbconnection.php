<?php
$con = mysqli_connect("localhost", "root", "")
    or die("Connection Failed");

$db = mysqli_select_db($con, "test");
