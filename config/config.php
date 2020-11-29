<?php
class MysqlPdo {
    private $host = 'mysql:host=localhost;dbname=mywebsite';
    private $username = 'root';
    private $password = '';
    private $conn;
    private $options = array(
      PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
    );

    public function connect() {
      $this->conn = null;
      try { 
        $this->conn = new PDO($this->host,$this->username, $this->password, $this->options);
      } catch(PDOException $e) {
        echo 'Connection Error: ' . $e->getMessage();
      }
      return $this->conn;
    }
  }
?>
