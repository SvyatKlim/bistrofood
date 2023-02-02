<?php require PARTS_DIR . '/header.php';
extract(formSessionData('login'));
?>
    <section class="login">
        <div class="wrapper wrapper--w680 pt-after-header container">
            <div class="card col-md-10 flex-row">
                <div class="login__img d-flex col-md-4">
                    <img src="<?= IMAGES_URI; ?>login-decor.jpg" alt="Image">
                </div>
                <div class="card-body login__card col-md-6">
                    <h2 class="title ps-3">Sign in</h2>
                    <form class="form" action="/" method="POST">
                        <input class="input" type="hidden" name="type" value="login">
                        <div class="row row-space">
                            <div class="col-12 p-0">
                                <div class="form-group">
                                    <label class="label" for="email">Email</label>
                                    <input class="form-control" type="email" name="email" id="email"
                                           value="<?= $fields['email'] ?? ''; ?>">
                                </div>
                                <?= formError($errors['email'] ?? null) ?>
                            </div>
                            <div class="col-12  p-0">
                                <div class="form-group">
                                    <label class="label" for="password">Password</label>
                                    <input class="form-control" name="password" type="password" id="password">
                                </div>
                                <?= formError($errors['password'] ?? null) ?>
                            </div>
                        </div>
                        <div>
                            <button class="btn" type="submit">Sign In</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
<?php require PARTS_DIR . '/footer.php'; ?>