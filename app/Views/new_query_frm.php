<?= $this->extend('layouts/main_layout') ?>
<?= $this->section('content') ?>

<section class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-10">

            <?= form_open('new_query_submit') ?>

            <h3 class="mb-3">Nova query</h3>

            <div class="mb-3">
                <label class="form-label">Nome da query</label>
                <input type="text" name="text_query_name" class="form-control form-control-sm" placeholder="Nome da query" autofocus required>
            </div>

            <div class="row mb-3">
                <div class="col-7">
                    <label class="form-label">Tags de pesquisa</label>
                    <input type="text" name="text_tags" class="form-control form-control-sm" placeholder="Tags de pesquisa">
                </div>
                <div class="col-5">
                    <label class="form-label">Projeto</label>
                    <input list="list_projetos" name="text_projeto" class="form-control form-control-sm">
                    <datalist id="list_projetos">
                        <option value="01">
                        <option value="02">
                        <option value="03">
                    </datalist>
                </div>
                <div class="mb-3">
                <label class="form-label">Query</label>
                    <textarea name="text_query" id="text_query" class="form-control" rows="10">SELECT * FROM table</textarea>
                </div>
            </div>

            <div class="mb-3 text-center">
                <a href="<?= site_url('/') ?>" class="btn btn-primary px-5">Cancelar</a>
                <button type="submit" class="btn btn-secondary px-5">Guardar</button>
            </div>

            <?= form_close() ?>

        </div>
    </div>
</section>

<?= $this->endSection() ?>