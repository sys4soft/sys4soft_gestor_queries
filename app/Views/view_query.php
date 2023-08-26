<?= $this->extend('layouts/main_layout') ?>
<?= $this->section('content') ?>

<section class="container mt-5">
    <div class="row justify-content-center">
        <div class="col">

            <h4><strong><?= $query->query_name ?></strong></h4>
            <h5><?= $query->project ?></h5>
            <p class="opacity-50"> <?= $query->query_tags ?></p>
            <textarea id="" rows="20" class="form-control">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam necessitatibus beatae cupiditate dicta autem numquam voluptas quae incidunt tempora iure.</textarea>

            <div class="row mt-2">
                <div class="col">
                    <p class="d-none" id="query_copied">Query copiada para o clipbard</p>
                </div>
                <div class="col text-end">
                    <a href="#" class="btn btn btn-primary px-5">Eliminar</a>
                    <a href="#" class="btn btn btn-primary px-5">Editar</a>
                    <a href="#" class="btn btn btn-secondary px-5">Copiar</a>
                </div>
            </div>
        </div>
    </div>
</section>



<?= $this->endSection() ?>