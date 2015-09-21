<?php
echo 'Привет';
function open_database_connection(){
echo 'Привет';
	$link = mysql_connect('localhost', 'Tsekhovaya', '123');
	mysql_select_db('Tsekhovaya_base', $link);
	mysql_query('SET NAMES utf8');
	return $link;

}
function close_database_connection($link){
	mysql_close($link);
}
function get_all_posts(){ /*функция - взять все записи*/
	echo 'Привет3';
	$link = open_database_connection();
	$sql = "SELECT * FROM post";
	$result = mysql_query($sql,$link); /*выбираем все записи из таблицы*/
	$posts = array(); /*создаем пустой массив*/
	while ($row = mysql_fetch_assoc($result)){
		$posts[] = $row;
	}
	close_database_connection($link);
	rеturn $posts;
}