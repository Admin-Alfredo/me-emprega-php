<?php

namespace APP\Db;
use \PDO;

class Database{
  const HOST = 'localhost';
  const PORT = 3306;
  const NAME = 'jorvagas';
  const USER = 'root';
  const PASSWORD = '';

  private string $table;
 
  private $connection;

  public function __construct($table = null){
    
    $this->table = $table;
    
    
    $this->setConnection();
  }
  private function setConnection(){
    try {
      $this->connection = new PDO('mysql:host='.self::HOST.';dbname='.self::NAME,self::USER,self::PASSWORD);
      $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    } catch (PDOException $e) {
      die("Error: ".$e->getMessage());
    }
  }
  public function execute($query, $params=null){
    try {
      $statement = $this->connection->prepare($query);
      $statement->execute($params);

      return $statement;

    } catch (PDOException $e) {
      die("Error: ".$e->getMessage());
    }
  }
  public function insert($values){
    // echo $this->table; exit;
      $fields = array_keys($values);
      $binds = array_pad([], count($fields), '?');
      $query = 'INSERT INTO '.$this->table.' ('.implode(',', $fields).') values ('.implode(',', $binds).')';
      $this->execute($query, array_values($values));

      return $this->connection->lastInsertId();
  }
   public function select($where = null,$order=null,$limit=null){
    // echo $this->table; exit;
 
    $where = strlen($where) ? 'WHERE '.$where: '';
    $order = strlen($order) ? 'ORDER BY '.$order: '';
    $limit = strlen($limit) ? 'LIMIT '.$limit : '';

    $query = 'SELECT * FROM '.$this->table.' '.$where.' '.$order.' '.$limit;
      // echo $query; exit;

    $this->execute($query);

    return $this->execute($query);;
  }
}