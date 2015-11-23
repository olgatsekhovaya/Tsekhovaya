<?php ob_start();?>
<br>
<a href="/Tsekhovaya/index.php/admin">страница администратора</a>
<br>
<a href="/Tsekhovaya/index.php/users">список пользователей</a>
<h2>Список постов</h2>
		<ol>
			<?php foreach ($posts as $post): ?>
				<li>

					<a href="/Tsekhovaya/index.php/show?id=<?php echo $post['id']; ?>">
					<?php echo $post['autor']." ".$post['title'] ." ".$post['content'];?> 
					</a>
					
				</li>
			<?php endforeach; ?>
		</ol>
		<?php $content = ob_get_clean(); ?>
		<?php include "View/Templates/layout.php";?>
		