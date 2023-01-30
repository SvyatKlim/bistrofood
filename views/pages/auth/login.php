<?php require PARTS_DIR . '/header.php';
extract(formSessionData('login'));
?>
    <section>
        <div class="wrapper wrapper--w680 pt-after-header container">
            <div class="card card-4">
                <div class="card-body">
                    <h2 class="title">Sign in</h2>
                    <form action="/" method="POST">
                        <input class="input" type="hidden" name="type" value="login">
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label" for="email">Email</label>
                                    <input class="input--style-4" type="email" name="email" id="email"
                                           value="<?= $fields['email'] ?? ''; ?>">
                                </div>
                                <?= formError($errors['email'] ?? null) ?>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label" for="password">Password</label>
                                    <input class="input--style-4" name="password" type="password" id="password">
                                </div>
                                <?= formError($errors['password'] ?? null) ?>
                            </div>
                        </div>
                        <div class="p-t-15">
                            <button class="btn btn--radius-2 btn--blue" type="submit">Sign In</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
<?php require PARTS_DIR . '/footer.php'; ?>