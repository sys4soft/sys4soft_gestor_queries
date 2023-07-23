<?= $this->extend('layouts/main_layout') ?>
<?= $this->section('content') ?>

<section class="container mt-5">
    <div class="row justify-content-center">
        <div class="mt-5 col-md-4 col-sm-6 col-8 p-5 text-center bg-secondary rounded shadow">
            
            <?= form_open('login_submit', ['novalidate' => true]) ?>

                <h3 class="text-center mb-3 text-black"><?= APP_NAME ?></h3>
                <div class="mb-3 text-start">
                    <label for="username" class="form-label text-black">Username</label>
                    <input type="text" name="username" id="username" class="form-control form-control-sm" placeholder="Username" value="<?= old('username', '') ?>" autofocus required>
                    <?= check_error('username', $validation_errors) ?>
                </div>

                <div class="mb-3 text-start">
                    <label for="password" class="form-label text-black">Password</label>
                    <input type="password" name="password" id="password" class="form-control form-control-sm" placeholder="Password" value="<?= old('password', '') ?>" required>
                    <?= check_error('password', $validation_errors) ?>
                </div>

                <div class="mb-3">
                    <button type="submit" class="btn btn-primary w-100">Login</button>
                </div>

            <?= form_close() ?>

            <?php if(!empty($login_error)): ?>
                <div class="alert alert-danger p-2 text-center">
                    <?= $login_error ?>
                </div>
            <?php endif; ?>

        </div>
    </div>
</section>

<?= $this->endSection() ?>