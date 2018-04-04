<html>
<head><title>show port status</title></head>
<body background="blue2.jpg">
<?php
//require_once "PHPTelnet.php";
require_once("PHPTelnet.php");
$telnet = new PHPTelnet();
$instruction = $_GET['instruction'];
$host_ip=$_GET['host_ip'];
$user_name=$_GET['user_name'];
$user_pass=$_GET['user_pass'];
if($user_pass==null)
{
	$user_pass="      ";
}
//$user_pass="      ";
/*$instruction="show interface shub port 2";
$host_ip="135.251.202.41";
$user_name="isadmin";
$user_pass="      ";*/
$result = $telnet->Connect($host_ip,$user_name,$user_pass);
function waitparseChar($iniChar)
{
	$head=strpos($iniChar,"port");
	$head=strpos($iniChar,"port",$head+1);
	$head=strpos($iniChar,"port",$head+1);
	$tail=strpos($iniChar,"full");
	$tail=$tail+3;//beginning from the end character
	$tailstr=substr($iniChar,$tail+1);//these tail characters will be thrown 
	$notail_str=str_replace($tailstr,"",$iniChar);
	$needstr=substr($notail_str,$head);
	//echo "<br>";
	return $needstr;
}
if ($result == 0) 
{ 
    // NOTE: $result may contain newlines
    // $telnet->DoCommand('show interface shub port 1', $result);
	$telnet->DoCommand($instruction, $result);
	$telnet->DoCommand($instruction, $result1);
	$needstr=waitparseChar($result);
    $divstr=explode("|",$needstr);
	$uparr=$divstr;
    $uparr[5]=substr($divstr[5],0,6);
	//print_r ($uparr);//++++++++++++++++++=====uparray[Good]
    $temp=str_replace($uparr[5],"",$divstr[5]);
	$temp=trim($temp);
    $temp=trim($temp,"+- ");
    $temp= explode(" ",$temp);
	//print_r($temp);
	$t=0;
	for($k=0;$k<count($temp);$k++)
    {
		if(preg_match("/[a-z]|[0-9]/",$temp[$k]))
			 $hao[$t++]=$temp[$k];
		//if(preg_match("/[0-9]/",$temp[$k]))
			//echo $hao[$t++]=$temp[$k];
	}
	$temp=$hao;
	$downarr=$temp;
    $telnet->Disconnect(); 
}
?>
<!--<center> -->
<p>
<center><font color="mediumblue" size="13"><h3>show network port status</h3></font></center>
<table BORDER=1 width=80% >
<tr valign="top">
<?php
for($i=0;$i<count($uparr);$i++)
{
?>
 <td><font color="purple"><?php print trim($uparr[$i]); ?></font></td>
<?php 
}
?>
</tr>
<tr valign="top" >
<?php
for($i=0;$i<count($downarr);$i++)
{
?>
 <td><font color="orangered"><?php echo trim($downarr[$i]); ?></font></td>
<?php 
}
?>
</tr>
</table> 
</p>
<!--</center>-->
</body>
</html>
