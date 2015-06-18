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
        return mysql_query($sql, $this->conn);
    }

    public function free_query(){
        if ($this->result) {
            mysql_free_result($this->result);
        }
    }

    public function numRows(){
        if ($this->result) {
            $rows = mysql_num_rows($this->result);
            return $rows;
        }
    }

    public function fetch(){
        if ($this->result) {
            $row = mysql_fetch_array($this->result);
            return $row;
        }
    }
}
