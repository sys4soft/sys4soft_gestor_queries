<?= $this->extend('layouts/main_layout') ?>
<?= $this->section('content') ?>

<section class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-10">

            <?= form_open('new_query_submit', ['novalidate' => true]) ?>

            <h3 class="mb-3">Nova query</h3>

            <div class="mb-3">
                <label class="form-label">Nome da query</label>
                <input type="text" name="text_query_name" class="form-control form-control-sm bg-black text-white" placeholder="Nome da query" autofocus required>
                <?= check_error('text_query_name', $validation_errors) ?>
            </div>

            <div class="row mb-3">
                <div class="col-7">
                    <label class="form-label">Tags de pesquisa</label>
                    <input type="text" name="text_tags" class="form-control form-control-sm bg-black text-white" placeholder="Tags de pesquisa">
                    <?= check_error('text_tags', $validation_errors) ?>
                </div>
                <div class="col-5">
                    <label class="form-label">Projeto</label>
                    <input list="list_projetos" name="text_projeto" class="form-control form-control-sm bg-black text-white">
                    <?= check_error('text_projeto', $validation_errors) ?>
                    <datalist id="list_projetos">
                        <option value="01">
                        <option value="02">
                        <option value="03">
                    </datalist>
                </div>
                <div class="mb-3">
                <label class="form-label">Query</label>
                    <textarea name="text_query" id="text_query" class="form-control bg-black text-white" rows="10"></textarea>
                    <?= check_error('text_query', $validation_errors) ?>
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