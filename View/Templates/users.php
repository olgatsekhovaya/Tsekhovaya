<?php ob_start();?>
<a href="/Tsekhovaya/index.php">На главную страницу</a>
		<p></p><p></p>
<h2>Список пользователей</h2>
		<ol>
			<?php foreach ($users as $user): ?>
				<li>

					<a href="/Tsekhovaya/index.php/showusers?uid=<?php echo $user['uid']; ?>">
					<?php echo $user['firstname']." ".$user['lastname'] ." ".$user['email'];?> 
					</a>
					
				</li>
			<?php endforeach; ?>
		</ol>
		<?php $content = ob_get_clean(); ?>
		<?php include "View/Templates/layout.php";?>