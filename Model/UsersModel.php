<?php
class UsersModel {
	private $dbh;//ключ к базе данных, "private" доступен только в этом классе
	private $user="Tsekhovaya";
	private $pass="123";
	private $db="Tsekhovaya_base";
	private $charset="UTF8";
	private $host="localhost";

	function UsersModel(){
		$dsn="mysql:host=$this->host;dbname=$this->db;charset=$this->charset;";
		$opt = array(
    		PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    		PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
		);
		
    	$this->dbh = new PDO($dsn, $this->user, $this->pass, $opt);
		
	}//function

	public function get_all_users(){ //раньше это была ф-ция, 
		//а теперь метод, потому что он находиться в классе
		
		$sql = "SELECT * FROM users";/*переменная с запросом*/
		$stmt = $this->dbh->query($sql);//отдаем запрос БД получаем объект $stmt		
		$users = array(); /*создаем пустой массив*/
		while ($row = $stmt->fetch()){/*перебираем массив*/
			$users[] = $row;
		}	
		return $users;	
	}
















	
}




?>