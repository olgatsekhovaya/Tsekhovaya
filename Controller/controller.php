<?php
/**
*Контроллер содержит функции - экшены,
*которые заставляют модель вывести нужную информацию
*/
function list_action()
{
	/**
	*Массив $posts содержит выборку всех полей из таблицы post
	*Подгружает файл list.php, содержащий вид вывода информации из $posts в браузере
	*/
	$posts = get_all_posts();/*выбрать все записи*/
	require "View/Templates/list.php";/*внедрить файл*/
}

function admin_action()
{
	require "View/Templates/admin.php";/*внедрить файл*/
}
function show_action()
{
	$post = get_post();
	require "View/Templates/showpost.php";/*внедрить файл*/
}
?>