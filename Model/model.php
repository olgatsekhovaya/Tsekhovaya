<?php
function open_database_connection(){
	/** соединение с базой mysql
	* под именем и паролем*/
	$link = mysql_connect('localhost', 'Tsekhovaya', '123');	
	/** выбор БД*/
	mysql_select_db('Tsekhovaya_base', $link);
	/** запрос устанавливает кодировку
	 * символов (чтобы выводила кириллицу)
	 */
	mysql_query('SET NAMES utf8');
	
	return $link;

}
function close_database_connection($link){/*закрыть БД*/
	mysql_close($link);
}
/**
* функция - взять все записи
*/	
function get_all_posts(){ 
	$link = open_database_connection();
	$sql = "SELECT * FROM post";/*переменная с запросом*/
	$result = mysql_query($sql,$link); /*выбираем все записи из таблицы*/
	$posts = array(); /*создаем пустой массив*/
	while ($row = mysql_fetch_assoc($result)){/*перебираем массив*/
		$posts[] = $row;
	}
	close_database_connection($link);	
	return $posts;	
}
function get_post($id){ 
	$link = open_database_connection();
	$sql = "SELECT * FROM post WHERE id= '$id'";/*переменная с запросом*/
	$result = mysql_query($sql,$link); /*выбираем одну запись из таблицы*/
	$row = mysql_fetch_assoc($result);
	$post = $row;

	close_database_connection($link);	
	return $posts;	
}
function add_post()
{
	$autor = $_POST['add_autor'];
	$date = $_POST['add_date'];
	$title = $_POST['add_title'];
	$new_content = $_POST['add_content'];
	$link = open_database_connection();
	$sql = "INSERT INTO `post` (`id`, `autor`, `date`, `title`, `content`) VALUES (NULL, '$autor', '$date', '$title', '$new_content');";
	$add = mysql_query($sql,$link);
	close_database_connection($link);
	header('Location:admin');
		
}
function edit_data($id)
{
	$autor = $_POST['autor'];
	$date = $_POST['date'];
	$title = $_POST['title'];
	$edit_content = $_POST['content'];
	$link = open_database_connection();
	$sql = "UPDATE `post` SET `autor` = '$autor', `date` = '$date', `title` = '$title', `content` = '$edit_content' WHERE `id` = '$id';";
	$edit = mysql_query($sql,$link);
	close_database_connection($link);
	header('Location:admin');
}