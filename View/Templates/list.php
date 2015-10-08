<?php ob_start();?>
<h2>Список постов</h2>
		<ol>
			<?php foreach ($posts as $post): ?>
				<li>
					<a href="./index.php/show?id=<?php echo $post['id']; ?>">
					<?php echo $post['title'] /*." ".$post['content']*/;?> 
					</a>
				</li>
			<?php endforeach; ?>
		</ol>
		<?php $content = ob_get_clean(); ?>
		<?php include "View/Templates/layout.php";?>
		