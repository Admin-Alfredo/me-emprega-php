<?php
namespace APP\Entity;
use \APP\db\Database;
use \PDO;
class Vaga{
  /** */
  public $id;

  public $titulo;

  public $descricao;

  public $ativo;

  public $data;

  public function cadastrar (){
    // definir a data 
    $this->data = date('Y-m-d H:i:s');
    $database = new Database('vagas');
    // echo "<pre>";print_r($database);"</pre>"; exit;

    $this->id = $database->insert([
      'titulo' => $this->titulo,
      'descricao' => $this->descricao,
      'ativo' => $this->ativo,
      'data' => $this->data
    ]);
    // Inserir a vaga no banco

    // retornar sucesso
    return true;
  }
public static function getVagas($where = null,$order=null,$limit=null){
  return (new Database('vagas'))->select($where ,$order,$limit)
    ->fetchAll(PDO::FETCH_CLASS, self::class);
}
public static function getVaga($id){
  return (new Database('vagas'))->select('id = '.$id)
        ->fetchObject(self::class);
}
}