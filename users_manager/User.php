<?php
include_once('Database.php');
class User extends Database{
    protected $userid;
    protected $fullname;
    protected $username;
    protected $password;
    protected $email;

    public function set_userid($userid){
        $this->userid = $userid;
    }
    public function get_userid(){
        return $this->userid();
    }
    public function set_fullname($fullname){
        $this->fullname = $fullname;
    }
    public function get_fullname(){
        return $this->fullname();
    }
    public function set_username($username){
        $this->username = $username;
    }
    public function get_username(){
        return $this->username();
    }
    public function set_password($password){
        $this->password = $password;
    }
    public function get_password(){
        return $this->password();
    }
    public function set_email($email){
        $this->email = $email;
    }
    public function get_email(){
        return $this->email();
    }

    public function checkNull(){
        if ($this->username = '' || $this->password = '') {
            return 'required';
        }
    }

    public function __construct(){
        $this->connect();
    }

    public function login(){
        $sql = "SELECT * FROM users WHERE username = '$this->username' AND password = '$this->password'";
        $this->query($sql);
        if ($this->numRows() > 0) {
            $_SESSION['username'] = $this->username;
            $_SESSION['password'] = $this->password;
        }
        else{
            return 'acc not vaid';
        }
    }

    public function add(){
        $sql = "SELECT * FROM users WHERE username = '$this->username'";
        $this->query($sql);
        if ($this->numRows() > 0) {
            return 'user exist';
        }
        else{
            $sql = "INSERT INTO users (fullname, username, password, email)
                    VALUES ('$this->fullname', '$this->username', '$this->password', '$this->email')";
            $this->query($sql);
            //return 'Thành Công';
        }
    }

    public function edit(){
        $sql = "SELECT * FROM users WHERE username = '$this->username' AND userid != '$this->userid'";
        $this->query($sql);
        if ($this->numRows() > 0) {
            return 'user exist';
        }
        else{
            $sql = "UPDATE users SET fullname = '$this->fullname', username = '$this->username', password = '$this->password', email = '$this->email' WHERE userid = '$this->userid'";
            $this->query($sql);
        }
    }

    public function del(){
        $sql = "DELETE FROM users WHERE userid = '$this->userid'";
        $this->query($sql);
    }
}

?>