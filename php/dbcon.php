<?php
$host="localhost";
$user="root";
$pass="root";
//$db='project';
$ho=mysql_connect("$host","$user","$pass");
$con=mysql_select_db('project',"$ho");
?>