<?php require PARTS_DIR . '/header.php'; ?>
<section>
    <div class="wrapper wrapper--w680 pt-after-header container">
        <div class="card card-4">
            <div class="card-body">
                <h2 class="title">Registration Form</h2>
                <form action="/" method="POST">
                    <input class="input" type="hidden" name="type" value="registration" >
                    <div class="row row-space">
                        <div class="col-2">
                            <div class="input-group">
                                <label class="label" for="name">Name</label>
                                <input class="input--style-4" type="text" name="name" id="name">
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="input-group">
                                <label class="label" for="last_name">Last Name</label>
                                <input class="input--style-4" type="text" name="last_name" id="last_name">
                            </div>
                        </div>
                    </div>
                    <div class="row row-space">
                        <div class="col-2">
                            <div class="input-group">
                                <label class="label" for="email">Email</label>
                                <input class="input--style-4" type="email" name="email" id="email">
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="input-group">
                                <label class="label" for="password">Password</label>
                                <input class="input--style-4" name="password" type="password" id="password">
                            </div>
                        </div>
                    </div>
                    <div class="p-t-15">
                        <button class="btn btn--radius-2 btn--blue" type="submit" >Create account</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?php require PARTS_DIR . '/footer.php'; ?>