<?php 
  $resultadoDeListagem = '';
  foreach($vagas as $vaga){
    $resultadoDeListagem .= '<tr >
                              <td>'.$vaga->id.'</td>
                              <td>'.$vaga->titulo.'</td>
                              <td>'.$vaga->descricao.'</td>
                              <td>'.($vaga->ativo == 's' ? 'Ativo' : 'Não ativo').'</td>
                              <td>'.date('d/m/Y á\s H:i:s', strtotime($vaga->data)).'</td>
                              <td>
                                <a href="editar.php?id='.$vaga->id.'"><button class="btn btn-primary">editar</button></a>
                                <a href="excluir.php?id='.$vaga->id.'"><button class="btn btn-danger">excluir</button></a>
                              </td>
                              </tr>';

  }
?>
<main class="mt-2">
  <section >
    <a href="cadastrar.php">
      <button class="btn btn-success">Adicionar vaga</button>
    </a>
  </section>
  <section>
    <table class="table table-stripe mt-4">
      <thead>
        <tr>
          <th>ID</th>
          <th>Titulo</th>
          <th>Descrição</th>
          <th>ativo</th>
          <th>Data</th>
          <th>Ações</th>
        </tr>
      </thead>
      <tbody>
        <?php echo $resultadoDeListagem ?>
      </tbody>
    </table>
  </section>
</main>