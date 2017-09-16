<?php
include('inc.php');
$count= json_decode($_POST['wid'],true);
$sid=$_POST['sid'];
$sql="select *from dy_price where sid='$sid' and pclass='1'";
$result=mysql_query($sql);
if($rows=mysql_fetch_array($result))
{
    $dprice=$rows['price'];
}
else {
    $dprice=0.1;
}
$sql="select *from dy_price where sid='$sid' and pclass='2'";
$result=mysql_query($sql);
if($rows=mysql_fetch_array($result))
{
    $sprice=$rows['price'];
}
else {
    $sprice=0.15;
}

$dtotal=0;
$stotal=0;
$dsl=0;
$ssl=0;
$rel=array();
for($i=0;$i<count($count);$i++)
{
    $wid=$count[$i];
    $sql="select *from dy_wj where wid='$wid'";
    $result=mysql_query($sql);

    if($rows=mysql_fetch_array($result))
    {
		$zys=$rows['mys']-$rows['sys']+1;
		if($rows['jb']==2)
		{
			if($zys%2==0)
			{
				$zys=$zys/2;
			}
			else{
				$zys=($zys+1)/2;
			}
		}
        if($rows['dsm']==1)
        {
            $dsl+=$zys*$rows['fs'];
             
        }
        else {
            if($zys%2==0)
            {
            $ssl+=(($zys/2)*$rows['fs']);
            }
            else {
                $ssl+=(($zys-1)/2)*$rows['fs'];
                $dsl+=1*$rows['fs'];
            }
            }

        }
        

    }
     $rel['dprice']=$dprice;
     $rel['sprice']=$sprice;
     $rel['dsl']=$dsl;
     $rel['ssl']=$ssl;
     $rel['dtotal']=$dprice*$dsl;
     $rel['stotal']=$sprice*$ssl;
     $rel['total']=($dprice*$dsl)+($sprice*$ssl);
     echo json_encode($rel);
     