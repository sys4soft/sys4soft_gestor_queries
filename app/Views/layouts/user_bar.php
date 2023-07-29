<div class="container-fluid bg-black p-3">
    <div class="row">
        <div class="col">
            <h3>Gestor de Queries</h3>
        </div>
        <div class="col d-flex justify-content-end align-items-center">
            <i class="fa-regular fa-user me-3"></i><?= session()->username ?>
            <span class="mx-3">|</span>
            <a href="<?= site_url('logout') ?>" class="btn btn-sm btn-secondary"><i class="fa-solid fa-arrow-right-from-bracket me-2"></i>Sair</a>
        </div>
    </div>
</div>