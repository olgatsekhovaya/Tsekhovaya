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
