<?php
class Database{
    protected $dbHost = 'localhost';
    protected $dbName = 'users_manager';
    protected $dbUser = 'root';
    protected $dbPass = '';
    protected $conn = NULL;
    protected $result = NULL;

    public function connect(){
        $this->conn = mysql_connect($this->dbHost, $this->dbUser, $this->dbPass);
        if ($this->conn) {
            $dbSelect = mysql_select_db($this->dbName, $this->conn);
                if ($dbSelect) {
                    mysql_query("SET NAMES 'utf8'");
                }
                else{
                    echo 'Không tìm thấy cơ sở dữ liệu';
                }
        }
        else{
            echo 'Không kết nối được tới CSDL';
        }
    }

    public function query($sql){
        $this->free_query();
        $this->result = mysql_query($sql);
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

// $abc = new Database();
// echo $abc->connect();
?>