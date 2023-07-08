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
                    <option value="">Todas as tabelas</option>
                    <option value="">Tabela 1</option>
                    <option value="">Tabela 2</option>
                    <option value="">Tabela 3</option>
                </select>
            </div>
        </div>
        <div class="col-md-3 col-12 text-end">
            <a href="#" class="btn btn-primary"><i class="fa-solid fa-plus me-3"></i>Nova query</a>
        </div>
    </div>

    <!-- tabela dos resultados -->
    <div class="row mt-5">
        <div class="col">
            <table class="table" id="table-results">
                <thead>
                    <tr>
                        <th>Projeto</th>
                        <th>Query</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <!-- ciclo para apresentar as queries -->
                    <tr>
                        <td>Projeto 1</td>
                        <td>Query 1</td>
                        <td>
                            <a href="#" class="btn btn-primary"><i class="fa-solid fa-edit"></i></a>
                            <a href="#" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>Projeto 1</td>
                        <td>Query 1</td>
                        <td>
                            <a href="#" class="btn btn-primary"><i class="fa-solid fa-edit"></i></a>
                            <a href="#" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>Projeto 1</td>
                        <td>Query 1</td>
                        <td>
                            <a href="#" class="btn btn-primary"><i class="fa-solid fa-edit"></i></a>
                            <a href="#" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <p class="mt-5 text-center">Não foram encontrados resultados.</p>



    <?= form_close() ?>
</nav>

<?= $this->endSection() ?>