<?php
$con = @mysql_connect("localhost","root","443ab8ced8");
if (!$con)
{
    die('Could not connect: ' . mysql_error());
}
mysql_select_db("dy11", $con);
mysql_query('set names utf-8');
// some code
?>