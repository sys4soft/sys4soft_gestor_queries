<?= $this->extend('layouts/main_layout') ?>
<?= $this->section('content') ?>

<section class="container mt-5">
    <div class="row justify-content-center">
        <div class="mt-5 col-md-4 col-sm-6 col-8 p-5 text-center bg-secondary rounded shadow">
            
            <?= form_open('login_submit', ['novalidate' => true]) ?>

                <h3 class="text-center mb-3 text-black"><?= APP_NAME ?></h3>
                <div class="mb-3 text-start">
                    <label for="username" class="form-label text-black">Username</label>
                    <input type="text" name="username" id="username" class="form-control form-control-sm" placeholder="Username" autofocus required>
                </div>

                <div class="mb-3 text-start">
                    <label for="password" class="form-label text-black">Password</label>
                    <input type="password" name="password" id="password" class="form-control form-control-sm" placeholder="Password" required>
                </div>

                <div class="mb-3">
                    <button type="submit" class="btn btn-primary w-100">Login</button>
                </div>

            <?= form_close() ?>

            <?php if(!empty($validation_errors)): ?>
                <div class="alert alert-danger p-2 text-start">
                    <ul>
                        <?php foreach($validation_errors as $error):?>
                            <li><?= $error ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

        </div>
    </div>
</section>

<?= $this->endSection() ?>