<?php ob_start();?>
<a href="/Tsekhovaya/index.php">На главную страницу</a>
<p></p>
<p></p>
<h2>Редактирование статьи</h2>

<?php //foreach ($posts as $post):?>
<form action="/Tsekhovaya/index.php/update" method="POST" name="edit_data">

<table>
	
	
		<tr>
			<td>Заголовок: </td>
			<td><input type="text" name="title" value="<?php echo $post['title']; ?>"> 
			<input type="hidden" name="id" value="<?php echo $post['id']; ?>"> </td>
		</tr>
	
	
		<tr>
			<td>Дата:</td>
			<td><input type="text" name="date" value="<?php echo $post['date']; ?>"></td>
		</tr>
		<tr>
			<td>Автор:</td>
			<td><input type="text" name="autor" value="<?php echo $post['autor']; ?>"></td>
		</tr>
		<tr>
			<td>Текст:</td>
			<td><textarea name="content"><?php echo $post['content']; ?></textarea></td>
		</tr>
		<tr>
			<td><input type="reset" name="reset" value="Очистить"></td>
			<td><input type="submit" name="edit" value="Сохранить изменения"></td>
		</tr>
	
</table>

</form>	
	<?php //endforeach; ?>	
		<?php $content = ob_get_clean(); ?>
		<?php include "View/Templates/layout.php"; ?>