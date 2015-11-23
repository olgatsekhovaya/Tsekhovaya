<?php ob_start();?>

		<a href="/Tsekhovaya/index.php">На главную страницу</a>
		<p></p><p></p>
<h2>Администрирование странички</h2>
<form action="/Tsekhovaya/index.php/add" method="POST" name="add_data" >
		<table>
			<tr><td>Автор:</td>
				<td><input type="text" name="add_autor"></td>
			</tr>
			<tr><td>Дата:</td>
				<td><input type="text" name="add_date"></td>
			</tr>
			<tr><td>Заголовок:</td>
				<td><input type="text" name="add_title"></td>
			</tr>
			<tr><td>Текст:</td>
				<td><input type="textarea" name="add_content"></textarea></td>
			</tr>
			<tr>
				<td><input type="reset" name="reset" value="Очистить"></td>
				<td><input type="submit" name="add" value="Добавить"></td>
			</tr>
		</table>
</form>
		<h2>Список постов для редактирования</h2>
		<ol>
			

			<?php foreach ($posts as $post): ?>
				<li>

					<a href="/Tsekhovaya/index.php/show?id=<?php echo $post['id']; ?>">
					<?php echo $post['autor']." ".$post['title'] ." ".$post['content'];?> 
					</a> &nbsp;<br>
					<a href="/Tsekhovaya/index.php/edit?id=<?php echo $post['id']; ?>">Редактировать</a><br>
					<a href="/Tsekhovaya/index.php/del?id=<?php echo $post['id']; ?>">Удалить</a><br>
					
				</li>
			<?php endforeach; ?>
		</ol>
		<?php $content = ob_get_clean(); ?>
		<?php include "View/Templates/layout.php";?>
				
		