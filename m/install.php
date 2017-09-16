<?php
include('inc.php');
//
/* $sql = "CREATE TABLE dy_wj
(
id int NOT NULL auto_increment,
wid varchar(30),
ddh varchar(30),
wjm varchar(255),
url varchar(255),
size varchar(30),
color int(2),
dsm int(2),
jb int(2),
sys int(5),
mys int(5),
ys  int(5),
fs int(5),
zt int(2),
 PRIMARY KEY  (`id`)
)";
if(mysql_query($sql,$con))
{
    echo "dy_wj sucessful</br>";
}
else{echo "dy_wj bad!</br>";} 
//
$sql = "CREATE TABLE dy_dd
(
id int NOT NULL auto_increment,
ddh varchar(30),
sid varchar(30),
price double,
zf int(2),
zfddh varchar(30),
sh  int(2),
adr varchar(255),
phone int(11),
zs int(2),
zt int(2),
time datetime,
 PRIMARY KEY  (`id`)
)";
if(mysql_query($sql,$con))
{
    echo "dy_dd sucessful</br>";
}
else{echo "dy_dd bad!</br>";} 

//
$sql = "CREATE TABLE dy_sj
(
id int NOT NULL auto_increment,
sid varchar(30),
user varchar(30),
pwd varchar(20),
name varchar(30),
adr   text,
phone varchar(20),
qq varchar(20),
zx int(5),
time varchar(50),
 PRIMARY KEY  (`id`)
)";
if(mysql_query($sql,$con))
{
    echo "dy_sj sucessful</br>";   
}
else{echo "dy_sj bad!</br>";}
//

$sql = "CREATE TABLE dy_price
(
id int NOT NULL auto_increment,
sid varchar(20),
pclass varchar(20),
price double,
 PRIMARY KEY  (`id`)
)";
if(mysql_query($sql,$con))
{
    echo "dy_price sucessful</br>";
}
else{echo "dy_price bad!</br>";}*/
//
$sql = "CREATE TABLE dy_psadr
(
id int NOT NULL auto_increment,
adr varchar(50),
 PRIMARY KEY  (`id`)
)";
if(mysql_query($sql,$con))
{
    echo "dy_psadr sucessful</br>";
}
else{echo "dy_psadr bad!</br>";}

?>