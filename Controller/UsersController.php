<?php
class UsersController {

function users_action()
{
	$usersModel=new UsersModel();
	$users = $usersModel->get_all_users();/*выбрать все записи*/
	$html=render_template("View/Templates/users.php", array('users'=>$users));
	return $html;	
}













	
}


?>