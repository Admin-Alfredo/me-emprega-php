<?php
include __DIR__.'/vendor/autoload.php';
define('TITLE', 'Editar Vaga');
use \APP\Entity\Vaga;


// validar os dados 
if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
  header('location: index.php?status=error');
  exit;
}

$vaga = Vaga::getVaga($_GET['id']);


if(!$vaga instanceof Vaga){
  header('location: editar.php?status=error');
  exit;
}
if(isset($_POST['titulo'], $_POST['descricao'], $_POST['ativo'])){
  // die("CADATRADO");
  
  $vaga->titulo = $_POST['titulo'];
  $vaga->descricao = $_POST['descricao'];
  $vaga->ativo = $_POST['ativo'];
  // $vaga->data = $_POST['data'];
  // echo "<pre>";print_r($vaga);"</pre>"; exit;

  header('location: index.php?status=success');exit;
}
include __DIR__.'/includes/header.php';
include __DIR__.'/includes/formulario.php';
include __DIR__.'/includes/footer.php';
 

