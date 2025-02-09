<?php
include 'config.php';


class Database {
    public $servername = servername;
    public $dbname = dbname;
    public $dbuser = dbuser;
    public $dbpass = dbpass;
    public $port = port;
    public $conn;

    public function __construct() {
        $this->connect();
    }

    public function connect() {
        $this->conn = new mysqli($this->servername, $this->dbuser, $this->dbpass, $this->dbname, $this->port);
        // Kiểm tra kết nối
        if ($this->conn->connect_error) {
            die("Kết nối thất bại: " . $this->conn->connect_error);
        }
        echo "";
    }

    // Thêm phương thức để lấy kết nối hiện tại
    public function getConnection() {
        return $this->conn;
    }
    public function insert($query){
        $result = $this ->conn ->query($query);
        return $result;
    }
    public function selectAll($query){
        $result = $this ->conn ->query($query);
        return $result;
}
public function select($query){
    $result = $this ->conn ->query($query);
    return $result;
}
public function update($query){
    $result = $this ->conn ->query($query);
    return $result;
}
}
?>
