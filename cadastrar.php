<?php
include __DIR__.'/vendor/autoload.php';
define('TITLE', 'Cadastrar Vaga');
use \APP\Entity\Vaga;

// validar os dados 
$vaga = new vaga;
if(isset($_POST['titulo'], $_POST['descricao'], $_POST['ativo'])){
  // die("CADATRADO");

  $vaga->titulo = $_POST['titulo'];
  $vaga->descricao = $_POST['descricao'];
  $vaga->ativo = $_POST['ativo'];
  // $vaga->data = $_POST['data'];
  $vaga->cadastrar();
  // echo "<pre>";print_r($vaga);"</pre>"; exit;

  header('location: index.php?status=success');
  exit;
}
include __DIR__.'/includes/header.php';
include __DIR__.'/includes/formulario.php';
include __DIR__.'/includes/footer.php';


