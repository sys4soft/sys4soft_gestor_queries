<?= $this->extend('layouts/main_layout') ?>
<?= $this->section('content') ?>

<section class="container mt-5">
    <div class="row justify-content-center">
        <div class="col">

            <h4><strong><?= $query->query_name ?></strong></h4>
            <h5><?= $query->project ?></h5>
            <p class="opacity-50"> <?= $query->query_tags ?></p>
            <textarea id="text_query" rows="20" class="form-control"><?= $query->query ?></textarea>

            <div class="row mt-2">
                <div class="col">
                    <p class="d-none" id="query_copied">Query copiada para o clipbard</p>
                </div>
                <div class="col text-end">
                    <a href="#" class="btn btn btn-primary px-5">Eliminar</a>
                    <a href="#" class="btn btn btn-primary px-5">Editar</a>
                    <span id="copy" class="btn btn btn-secondary px-5">Copiar</span>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    document.querySelector('#copy').addEventListener('click', () => {
        const textarea = document.querySelector('#text_query')
        navigator.clipboard.writeText('').then(() => {
            navigator.clipboard.writeText(textarea.value).then(() => {
                document.querySelector('#query_copied').classList.remove('d-none')
                setTimeout(() => {
                    document.querySelector('#query_copied').classList.add('d-none')
                }, 2000)
            })
        })
    })
</script>

<?= $this->endSection() ?>