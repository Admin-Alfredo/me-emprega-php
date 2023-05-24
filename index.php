<?php
include __DIR__.'/vendor/autoload.php';
use \APP\Entity\Vaga;

$vagas = Vaga::getVagas();
//  echo "<pre>";print_r($vagas);"</pre>"; exit;


include __DIR__.'/includes/header.php';
include __DIR__.'/includes/listagem.php';
include __DIR__.'/includes/footer.php';

