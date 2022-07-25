<?php

	/*
	Revised code by Dominick Lee
	Original code derived from "Run your own PDO PHP class" by Philip Brown
	Last Modified 2/27/2017
	*/

	class PDO_MySQLConnect{
		private string $host;
		private string $user;
		private string $pass;
		private string $dbname;
		private int $errortype = 0;		//0:redirect error page, 1:json error, 2:text error, 3:no error(log file error only)
		private $error;
		private $stmt;
		private string $last_query;
		private $dbh;
		public $link;
		
		public function __construct($dbuser, $dbpassword, $dbname, $dbhost, $errortype = 0){
			$this->host     = $dbhost;
			$this->user     = $dbuser;
			$this->pass   	= $dbpassword;
			$this->dbname   = $dbname;
			$this->errortype   = $errortype;
			// Set DSN
			$dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;
			// Set options
			$options = array(
				PDO::ATTR_PERSISTENT    => true,
				PDO::ATTR_ERRMODE       => PDO::ERRMODE_EXCEPTION,
				PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES UTF8"
			);
			// Create a new PDO instanace
			try{
				$this->link = true;
				return $this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
			}
			// Catch any errors
			catch(PDOException $e){
				$this->error = $e;
				$this->errorlog($e);
				$this->link = false;
				if($this->errortype == 3){
					return false;
				}else{
					die();
				}
			}
		}
		
		public function query($query){
			if($this->link !== false){
				$this->last_query = $query;
				return $this->dbh->prepare($query);
			}else{
				die();
			}
		}
		public function quote($str){
			if($this->link !== false){
				return $this->dbh->quote($str);
			}else{
				die();
			}
		}
		public function bind($stmt, $param, $value, $type = null){
			if (is_null($type)) {
				switch (true) {
					case is_int($value):
						$type = PDO::PARAM_INT;
						break;
					case is_bool($value):
						$type = PDO::PARAM_BOOL;
						break;
					case is_null($value):
						$type = PDO::PARAM_NULL;
						break;
					default:
						$type = PDO::PARAM_STR;
				}
			}
			$stmt->bindValue($param, $value, $type);
		}
		public function execute($stmt){
			try{
				return $stmt->execute();
			}
			catch(PDOException $e){
				$this->error = $e;
				$this->errorlog($e);
				if($this->errortype == 3){
					return false;
				}else{
					die();
				}
			}
		}
		
		public function fetchAll($stmt){
			return $stmt->fetchAll(PDO::FETCH_ASSOC);
		}
		
		public function fetch($stmt){
			return $stmt->fetch(PDO::FETCH_ASSOC);
		}
		
		public function rowCount($stmt){
			return $stmt->rowCount();
		}
		
		public function lastInsertId(){
			return $this->dbh->lastInsertId();
		}
		
		public function beginTransaction(){
			return $this->dbh->beginTransaction();
		}
		
		public function endTransaction(){
			return $this->dbh->commit();
		}
		
		public function cancelTransaction(){
			return $this->dbh->rollBack();
		}
		
		public function debugDumpParams($stmt){
			return $stmt->debugDumpParams();
		}
		
		public function close(){
		  $this->dbh = null;
		}
		
		public function errorlog($e){
			if($e->getCode( ) !== 2002 && $e->getCode( ) !== 2006){
				$m ="[".date('Y-m-d H:i:s')."] ".$e->getMessage();
				if(!empty($this->last_query)){
					$m .= "\r\n[".date('Y-m-d H:i:s')."] ".$this->last_query;
				}
				$new = @fopen("errorlog.txt","a");
				@fputs($new,"$m\r\n");
				@fclose($new);
			}
			if($this->errortype == 0){
				echo "<script type='text/javascript'>window.location = '/ServerCheckTime.php';</script>";
			}else if($this->errortype == 1){
				echo json_encode(array("status" => "2", "msg" => "Database failure, please contact administrator."));
			}else if($this->errortype == 2){
				echo "Database failure, please contact administrator.";
			}
		}
	}
?>