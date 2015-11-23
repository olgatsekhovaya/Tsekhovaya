<?php
/**
*Контроллер содержит функции - экшены,
*которые заставляют модель вывести нужную информацию
*/
function render_template($path, array $args)
{
	extract($args);
	ob_start();
	require $path;
	$html=ob_get_clean();
	return $html;
}
function list_action()
{
	$postsModel=new PostsModel();
	$posts = $postsModel->get_all_posts();/*выбрать все записи*/
	$html=render_template("View/Templates/list.php", array('posts'=>$posts));
	return $html;
	//require "View/Templates/list.php";/*внедрить файл*/
}

function admin_action()
{
	$postsModel=new PostsModel();
	$posts = $postsModel->get_all_posts();/*выбрать все записи*/
	//$posts = get_all_posts();/*выбрать все записи*/
	$html=render_template("View/Templates/admin.php", array('posts'=>$posts));
	return $html;
	//require "View/Templates/admin.php";/*внедрить файл*/

}
function show_action($id)
{
	$postsModel=new PostsModel();		
	$post = $postsModel->get_post_by_id($id);
	$html=render_template("View/Templates/showpost.php", array('post'=>$post));
	return $html;
	//require "View/Templates/showpost.php";/*внедрить файл*/
}
function add_action()
{	
	$autor = $_POST['add_autor'];
	$date = $_POST['add_date'];
	$title = $_POST['add_title'];
	$new_content = $_POST['add_content'];
	$postsModel=new PostsModel();
	$postsModel->add_post($autor,$date,$title,$new_content);
	$posts = $postsModel->get_all_posts();	
	$html=render_template("View/Templates/admin.php", array('posts'=>$posts));
	return $html;
	//require "View/Templates/admin.php";	
}
function autor_action()
{
	$html=render_template("View/Templates/autor.php", array());
	return $html;
}
function edit_action($id)
{

	$postsModel=new PostsModel();		
	$post = $postsModel->get_post_by_id($id);
	$html=render_template("View/Templates/edit.php", array('post'=>$post));
	return $html;
}
function update_action()
{
	$id = $_REQUEST['id'];
	$autor = $_REQUEST['autor'];
	$date = $_REQUEST['date'];
	$title = $_REQUEST['title'];
	$edit_content = $_REQUEST['content'];
	$args=[$id,$autor,$date,$title,$edit_content];
	$postsModel=new PostsModel();		
	$postsModel->update_posts($args);
	$posts = $postsModel->get_all_posts();
	$html=render_template("View/Templates/admin.php", array('posts'=>$posts));
	return $html;
}
function delete_action($id)
{
	$postsModel=new PostsModel();
	$postsModel->delete_post($id);
	$posts = $postsModel->get_all_posts();	
	$html=render_template("View/Templates/admin.php", array('posts'=>$posts));
	return $html;
}

?>