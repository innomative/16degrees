<?php

class DB {
	
	protected static $connection;
	
	public static function connect() {
		
		if(!self::$connection) {
			//globally make DB-Connection
			@self::$connection = mysql_connect(DB_HOST, DB_USER, DB_PWD);		
			if(!self::$connection) {			
				$data['success'] = false;
				$data['error_code'] = 000;
				$data['message'] = "数据库联接出错";
				echo json_encode($data);
				exit;		
			}		
			
			mysql_select_db(DB_NAME, self::$connection);	
			mysql_query ('SET NAMES utf8');
		}
	}
	
	public static function query($statement) {
		$query = mysql_query(($statement));
		//pr($statement);
		if($query) {
			return $query;	
		}
		else {
			if(DEBUG_MODE) {
				echo $statement;
				die("SQL ERROR:".mysql_error());	
			}
			else {
				die('DB ERROR');	
			}
		}
	}
	
	public static function execute($statement) {
		$query = DB::query($statement);
		return mysql_fetch_assoc($query);	
	}
	
	public static function fetchAll($statement) {
		$array = "";
		$query = DB::query($statement);
		while($result = mysql_fetch_assoc($query)) {
			$array[] = $result;	
		}
		return $array;
	}
	
	public static function getTotal() {
		$result =  DB::execute('SELECT FOUND_ROWS() AS `total`');
		if(!$result) return 0;
		return $result['total'];
	}
	
	public static function lastInsertID() {
		return mysql_insert_id();	
	}
	
	public static function close() {
		mysql_close(self::$connection);
		self::$connection = null;
	}
	
}

?>