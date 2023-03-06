<?php require PARTS_DIR . '/header.php';
extract(formSessionData('registration'));
var_dump($errors);
?>
    <section class="registration">
        <div class="wrapper wrapper--w680 pt-after-header container">
            <div class="card col-md-11 flex-column flex-sm-row">
                <div class="login__img d-flex col-md-5">
                    <img src="<?= IMAGES_URI; ?>login-decor.jpg" alt="Image">
                </div>
                <div class="card-body registration__card col-md-6">
                    <h2 class="title  ps-3">Registration Form</h2>
                    <form class="form" action="/" method="POST">
                        <input class="input" type="hidden" name="type" value="registration">
                        <div class="row row-space">
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="label" for="name">Name</label>
                                    <input class="form-control" type="text" name="name" id="name"
                                           value="<?= $fields['name'] ?? ''; ?>">
                                </div>
                                <?= formError($errors['name'] ?? null) ?>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="label" for="surname">Last Name</label>
                                    <input class="form-control" type="text" name="surname" id="surname"
                                           value="<?= $fields['surname'] ?? ''; ?>">
                                </div>
                                <?= formError($errors['surname'] ?? null) ?>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="label" for="email">Email</label>
                                    <input class="form-control" type="email" name="email" id="email"
                                           value="<?= $fields['email'] ?? ''; ?>">
                                </div>
                                <?= formError($errors['email'] ?? null) ?>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="label" for="password">Password</label>
                                    <input class="form-control" name="password" type="password" id="password">
                                </div>
                                <?= formError($errors['password'] ?? null) ?>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="label" for="password_confirmation">Password Confirmation</label>
                                    <input class="form-control" name="password_confirmation" type="password"
                                           id="password_confirmation">
                                </div>
                            </div>
                            <?= formError($errors['password_confirmation'] ?? null) ?>
                        </div>
                        <div class="form-group ">
                            <button class="btn" type="submit">Create account</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
<?php require PARTS_DIR . '/footer.php'; ?>