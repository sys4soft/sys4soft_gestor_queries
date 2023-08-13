<?= $this->extend('layouts/main_layout') ?>
<?= $this->section('content') ?>

<section class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-10">

            <h3>Eliminar query</h3>
            <div class="my-4">
                <p>Nome da query</p>
                <p><?= $query->query_name?></p>

                <p>Nome do projecto</p>
                <p><?= $query->project?></p>

                <p>Query</p>
                <p><?= $query->query ?></p>
            </div>

            <div class="text-center">
                <a href="<?= site_url('/') ?>" class="btn btn-primary px-5">Cancelar</a>
                <a href="<?= site_url('/delete_query_confirm/' . encrypt($query->id)) ?>" class="btn btn-secondary px-5">Eliminar</a>
            </div>

        </div>
    </div>
</section>

<?= $this->endSection() ?>

<!-- /* 
public id -> string (1) "1"
⇄public project -> string (9) "Project 1"
⇄public query -> string (20) "SELECT * FROM table1"
⇄public query_name -> string (7) "Query 1"
⇄public query_tags -> string (16) "tag1, tag2, tag3"
*/ -->