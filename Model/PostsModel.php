<?php
class PostsModel{//класс создается для того, чтобы исключить несанкционированный доступ к БД
	private $dbh;//ключ к базе данных, "private" доступен только в этом классе
	private $user="Tsekhovaya";
	private $pass="123";
	private $db="Tsekhovaya_base";
	private $charset="UTF8";
	private $host="localhost";
//===============================================================
	/**
	Конструктор - метод, который выполняется при создании класса
	http://phpfaq.ru/pdo
	*/

	function PostsModel(){
		$dsn="mysql:host=$this->host;dbname=$this->db;charset=$this->charset;";
		$opt = array(
    		PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    		PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
		);
		
    	$this->dbh = new PDO($dsn, $this->user, $this->pass, $opt);
		
	}//function

	public function get_all_posts(){ //раньше это была ф-ция, 
		//а теперь метод, потому что он находиться в классе
		//$link = open_database_connection();
		$sql = "SELECT * FROM post";/*переменная с запросом*/
		$stmt = $this->dbh->query($sql);//отдаем запрос БД получаем объект $stmt
		//$result = mysql_query($sql,$link); /*выбираем все записи из таблицы*/
		$posts = array(); /*создаем пустой массив*/
		while ($row = $stmt->fetch()){/*перебираем массив*/
			$posts[] = $row;
		}
	//close_database_connection($link);	
	return $posts;	
	}

	public function get_post_by_id($id){ 	
		$sql = "SELECT * FROM post WHERE id=?";/*переменная с запросом*/
		$stmt = $this->dbh->prepare($sql);//prepare($sql)-готовит запрос к выполнению		
		$stmt->execute([$id]);
		$post = $stmt->fetch(); 
		return $post;	
	}


	public function add_post($autor,$date,$title,$new_content)
	{
		$sql = "INSERT INTO `post` ( `autor`, `date`, `title`, `content`) VALUES ( ?,?,?,?)";
		$stmt = $this->dbh->prepare($sql);//prepare($sql)-готовит запрос к выполнению		
		$stmt->execute([$autor,$date,$title,$new_content]);			
	}
	public function update_posts($args)
	{
				
		$sql = "UPDATE `post` SET `autor`=?, `date`=?, `title`=?, `content`=? WHERE `id`=?";		
		$stmt = $this->dbh->prepare($sql);//prepare($sql)-готовит запрос к выполнению		
		$stmt->execute([$args[1],$args[2],$args[3],$args[4],$args[0]]);
	
	}
	public function delete_post($id)
	{
		$sql="DELETE FROM `post` WHERE `id`=?";
		$stmt = $this->dbh->prepare($sql);//prepare($sql)-готовит запрос к выполнению
		$stmt->execute([$id]);
	}

}//class



?>