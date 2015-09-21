<?php
echo 'Привет';
include 'Model/model.php';
echo 'Привет2';
$posts = get_all_posts();

?>

	
	<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Tsekhovaya_site</title>
	</head>
	<body>
		<h2>Список постов</h2>
		<ul>
		<?php foreach ($posts as $post): ?>
			<li>
				<a href="#">
				<?php echo $post['id'].'. '.$post['title'];?>
				</a>
			</li>
		</ul>	
		<?php endforeach; ?>
	</body>
	</html>