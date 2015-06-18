<?php
class Database {
	protected $dbHost = 'localhost';
	protected $dbName = 'hocphp';
	protected $dbUser = 'hocphp';
	protected $dbPass = 'hocphp';
	public $conn = NULL;
	protected $result = NULL;

	public function __construct(){
		$this->conn = mysql_connect($this->dbHost, $this->dbUser, $this->dbPass);
		if ($this->conn) {
			$dbSelect = mysql_select_db($this->dbName, $this->conn);
				if ($dbSelect) {
					mysql_query("SET NAMES 'utf8'");
				} else{
					die('Không tìm thấy cơ sở dữ liệu');
				}
		} else{
			die('Không kết nối được tới CSDL');
		}
	}

	public function query($sql){
		$result = mysql_query($sql, $this->conn);
		$data = array();
		while ($item = mysql_fetch_array($result)) {
			$data[] = $item;
		}
		return $data;
	}

	public function execute($sql){
		$result = mysql_query($sql, $this->conn);
		return $result;
	}
}
