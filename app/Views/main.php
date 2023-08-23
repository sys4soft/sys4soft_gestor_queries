<?= $this->extend('layouts/main_layout') ?>
<?= $this->section('content') ?>

<nav class="container-fluid p-4">
    <?= form_open('main/search_submit') ?>

    <div class="row">
        <div class="col-md-9 col-12">
            <div class="d-flex align-items-center">
                <label for="search" class="me-3"><strong>Pesquisa:</strong></label>
                <input type="text" name="search" id="search" class="form-control form-control-sm w-50 me-3" placeholder="Pesquisa">
                <button type="submit" class="btn btn-primary d-flex align-items-center"><i class="fa-solid fa-magnifying-glass me-3"></i>Pesquisar</button>

                <span class="mx-3"></span>

                <label for="select_project" class="me-3"><strong>Projeto:</strong></label>
                <select name="select_project" id="select_project" class="form-select form-select-sm">
                    <option value="<?= encrypt('[all_queries]') ?>">Todas as queries</option>
                    <?php foreach($projects as $project): ?>
                        <option value="<?= encrypt($project->project) ?>" <?= !empty($project_filter) ? set_project_filter($project_filter, $project->project) : '' ?> > <?= $project->project ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="col-md-3 col-12 text-end">
            <a href="<?= site_url('new_query') ?>" class="btn btn-primary"><i class="fa-solid fa-plus me-3"></i>Nova query</a>
        </div>
    </div>

    <?= form_close() ?>
</nav>

<!-- tabela dos resultados -->
<div class="container-fluid">

    <div class="row justify-content-center mt-5">
        <div class="col-10">
            <table class="table" id="table-results">
                <thead class="table-black">
                    <tr>
                        <th width="25%">Projeto</th>
                        <th width="65%">Query</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>

                    <?php foreach($queries as $query): ?>
                        <tr>
                            <td><?= $query->project ?></td>
                            <td><?= $query->query_name ?></td>
                            <td class="text-end">
                                <a href="<?= site_url("edit_query/" . encrypt($query->id)) ?>" class="btn btn-sm btn-primary"><i class="fa-solid fa-edit"></i></a>
                                <a href="<?= site_url("delete_query/" . encrypt($query->id)) ?>" class="btn btn-sm btn-danger"><i class="fa-solid fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>

                </tbody>
            </table>
        </div>
    </div>

    <p class="mt-5 text-center">Não foram encontrados resultados.</p>
</div>

<script>
    document.querySelector("#select_project").addEventListener("change", function() {
        window.location.href = "<?= site_url('/set_filter/') ?>" + this.value;
    });
</script>

<?= $this->endSection() ?>