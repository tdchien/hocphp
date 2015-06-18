<?php
include_once('base_model.php');

class User_model {
    protected $userid;
    protected $fullname;
    protected $username;
    protected $password;
    protected $email;
    protected $db;

    public function __construct() {
        global $db;
        $this->db = $db;
    }

    public function getOne($user_id = false) {
        $result = $this->db->query("SELECT * FROM users WHERE userid = {$user_id}");
        return isset($result[0]) ? $result[0] : false;
    }

    public function getAll() {
        return $this->db->query('SELECT * FROM users');
    }

    public function save($data, $id) {
        $sql = 'UPDATE users SET ';
        foreach ($data as $key => $value) {
            $sql .= "`{$key}` = '{$value}',";
        }
        $sql = trim($sql, ',');
        $sql .= " WHERE userid = $id";
        $this->db->execute($sql);
    }

    public function login($username, $password){
        $data = $this->db->query("SELECT * FROM users WHERE username = '$username' AND password = '$password'");
        return (count($data) > 0) ? true : false;
    }
}
