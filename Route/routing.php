<?php
echo $_SERVER['REQUEST_URI'];

$uri = $_SERVER['REQUEST_URI'];

$u = explode('?',$uri);/*разбиваем строку на части - до ? и после*/
$uri = $u[0];
$uri=rtrim($uri,'/');

if ($uri == "/Tsekhovaya" OR $uri == "/Tsekhovaya/index.php")
{
	$response=list_action();/**/
}
elseif ($uri == "/Tsekhovaya/index.php/admin") 
{
	$response=admin_action();
	
}
elseif ($uri== "/Tsekhovaya/index.php/show") 
{
	$id=$_REQUEST['id'];	
	$response=show_action($id);
}

elseif ($uri== "/Tsekhovaya/index.php/autor") 
{
	$response=autor_action();
}
elseif ($uri== "/Tsekhovaya/index.php/edit")
{
	$id=$_REQUEST['id'];
	$response=edit_action($id);
	
}
elseif ($uri== "/Tsekhovaya/index.php/add")
{
	$response=add_action();
	
}
elseif ($uri== "/Tsekhovaya/index.php/update")
{
	$response=update_action();
	
}
elseif ($uri== "/Tsekhovaya/index.php/del")
{
	$id=$_REQUEST['id'];
	$response=delete_action($id);
	
}
elseif ($uri == "/Tsekhovaya/index.php/users") 
{
	$response=users_action();	
}

?>