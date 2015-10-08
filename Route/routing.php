<?php
echo $_SERVER['REQUEST_URI'];
$uri = $_SERVER['REQUEST_URI'];
$u = explode('?',$uri);/*разбиваем строку на части - до ? и после*/
$uri = $u[0];
if ($uri == "/Tsekhovaya/" OR $uri == "/Tsekhovaya/index.php")
{
	list_action();/**/
}
elseif ($uri== "/Tsekhovaya/index.php/admin") 
{
	admin_action();# code...
}
elseif ($uri== "/Tsekhovaya/index.php/show") 
{
	show_action($_REQUEST['id']);
}
?>