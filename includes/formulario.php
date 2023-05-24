<main class="mt-2">
  <section >
    <a href="index.php">
      <button class="btn btn-success">Voltar</button>
    </a>
  </section>
  <h2 class="mt-2"> <?= TITLE ?></h2>
  <form id="form_id" method="POST">
    <div class="form-group">
      <label>Titulo</label>
      <input type="text" class="form-control" name="titulo" value="<?= $vaga->titulo?>">
    </div>
    <div class="form-group">
      <label>Descrição</label>
      <textarea class="form-control " rows="5" name="descricao"><?= $vaga->descricao?></textarea>
    </div>
    <div class="form-group">
      <label>status</label>
      <div>
        <div class="form-check form-check-inline">
          <label class="form-control">
            <input type="radio" name="ativo" value="n" checked/> inatvo
          </label>
        </div>
        <div class="form-check form-check-inline">
          <label class="form-control">
            <input type="radio" name="ativo" value="s" <?= $vaga->ativo == 's' ? 'ativo' : '' ?>/> ativo
          </label>
        </div>
      </div>
    </div>
    <div class="form-group mt-5">
      <button type="submit" class="btn btn-success">enviar vaga</button>
    </div>
  </form>
</main>
<script>
  window.addEventListener('load', function LoadDOM(){
    const form = document.getElementById('form_id');
    form.setAttribute('action', location.pathname.slice(1));
  })
</script>
