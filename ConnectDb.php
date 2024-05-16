<?php

include 'loadenv.php';
/**
 * Class databaseConnection is used for connect database.
 */
class ConnectDb {
  /**
   * @var string $serverName
   *  Servername store the database host name.
   */
  private $serverName;
  /**
   * @var string $dbName
   *  Database name is stored inside dbName.
   */
  private $dbName;
  /**
   * @var string $userName
   *  It is used to store username.
   */
  private $userName;
  /**
   * @var string $password
   *  It is used to store password.
   */
  private $password;
  /**
   * @var string $conn.
   *  It stores connection.
   */
  public $conn;

  /**
   * This constructor is used to set hostname ,username, password and database name.
   */
  public function __construct() {

    $this->serverName = $_ENV['My_db_host'];
    $this->userName = $_ENV['username'];
    $this->password = $_ENV['password'];
    $this->dbName = $_ENV['My_dbName'];
  }

/**
 * This is function is used for connecting database.
 * @return string
 */
  public function connection() {
    try {
      $this->conn = new PDO("mysql:host=$this->serverName;dbname=$this->dbName", $this->userName, $this->password);
      // set the PDO error mode to exception
      $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch (PDOException $e) {
      echo "Connection failed: " . $e->getMessage();
    }
  }

  public function fetchData() {
    try {
      $query1 = "SELECT * FROM info";
    // Preparing and executing the sql query.
      $stmt = $this->conn->prepare($query1);
      $stmt->execute();
      $results = $stmt->fetchAll();
      return $results;
    }
    catch (PDOException $e) {
      echo "Data Fetching Failed: " . $e->getMessage();
    }
  }
  public function insertData(string $sql) {
    try {
      $statement = $this->conn->prepare($sql);
      $statement->execute();
      return "TRUE";
    }
    catch (PDOException $e) {
      echo "Data insertion failed " . $e->getMessage();
      return "FALSE";
    }
  }

  public function deleteData($sql) {
    try {
      $statement = $this->conn->prepare($sql);
      $statement->execute();
      return "TRUE";
    }
    catch (PDOException $e) {
      echo "Data deletion Unsucessful ". $e->getMessage();
      return "FALSE";
    }
  }
  public function updateData($sql) {
    try {
      $statement = $this->conn->prepare($sql);
      $statement->execute();
      return "TRUE";
    }
    catch (PDOException $e) {
      echo "Data updation Unsucessful ". $e->getMessage();
      return "FALSE";
    }
  }

  public function fetchLimitData($sql) {
    try {
      // $query1 = "SELECT * FROM info";
    // Preparing and executing the sql query.
      $stmt = $this->conn->prepare($sql);
      $stmt->execute();
      $results = $stmt->fetchAll();
      return $results;
    }
    catch (PDOException $e) {
      echo "Data Fetching Failed: " . $e->getMessage();
    }
  }
}
