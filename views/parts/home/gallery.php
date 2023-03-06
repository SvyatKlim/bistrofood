<section id="gallery" class="gallery  pt-80">
    <div class="bg-absolute z-index-1">
        <picture>
            <source media="(min-width:1441px)" srcset="<?= IMAGES_URI; ?>white-bg-1920.png" type="image/png">
            <source media="(min-width:840px)" srcset="<?= IMAGES_URI; ?>white-bg-1440.png" type="image/png">
            <source media="(min-width:480px)" srcset="<?= IMAGES_URI; ?>white-bg-tablet.png" type="image/png">
            <source media="(min-width:300px)" srcset="<?= IMAGES_URI; ?>white-bg-mobile.png" type="image/png">
            <img src="<?= IMAGES_URI; ?>white-bg-mobile.png" alt="White background">
        </picture>
    </div>

    <?php if (!empty($booking)): ?>
        <div id="contact-us" class="container z-index-2 pt-60 d-flex-column-center pb-100">
            <div class="col-xxl-10">
                <h2 class="title fst-italic text-center"><?= $booking['title'] ?? ''; ?></h2>
                <p class=" text-center mt-4">
                    <?= $booking['description'] ?? ''; ?>
                </p>
                <picture class="d-flex title-decor justify-content-center align-items-center">
                    <img src="<?= IMAGES_URI; ?>title-decor-black.png" alt="Decor">
                </picture>
            </div>
            <div class="row products__items mt-5 ">
                <div class="booking-form">
                    <div class="d-flex-column">
                        <!-- Start Form -->
                        <form id="bookingForm" action="#" method="" class="needs-validation d-flex flex-wrap "
                              novalidate
                              autocomplete="off">
                            <!-- Start Input Name -->
                            <div class="form-group col-md-4 d-flex-column">
                                <label for="inputName">Name</label>
                                <input type="text" class="form-control" id="inputName" name="name"
                                       placeholder="Your name"
                                       required/>
                                <small class="form-text text-muted">Please fill your name</small>
                            </div>
                            <!-- End Input Name -->

                            <!-- Start Input Email -->
                            <div class="form-group col-md-4 d-flex-column">
                                <label for="inputEmail">Email</label>
                                <input type="email" class="form-control" id="inputEmail" name="email"
                                       placeholder="Enter email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"
                                       required/>
                                <small class="form-text text-muted">We'll never share your email with anyone
                                    else.</small>
                            </div>
                            <!-- End Input Email -->

                            <!-- Start Input Telephone -->
                            <div class="form-group col-md-4 d-flex-column">
                                <label for="inputPhone">Phone</label>
                                <input type="tel" class="form-control" id="inputPhone" name="phone"
                                       placeholder="099xxxxxxx"
                                       pattern="\d{3}\d{3}\d{4}" required/>
                                <small class="form-text text-muted">We'll never share your phone number with anyone
                                    else.</small>
                            </div>
                            <!-- End Input Telephone -->

                            <!-- Start Input Date , Start Time and End Time -->
                            <div class="form-row col-lg-12 d-flex flex-column flex-lg-row w-100">
                                <!-- Start Input Date -->
                                <div class="form-group col-lg-4 d-flex-column">
                                    <label for="inputDate"><?= $booking['fields']['date'] ?? ''; ?></label>
                                    <input type="date" class="form-control" id="inputDate" name="date" required/>
                                    <small class="form-text text-muted">Please choose date and time for meeting.</small>
                                </div>
                                <!-- End Input Date -->

                                <!-- Start Input Start Time -->
                                <div class="form-group col-lg-4 d-flex-column">
                                    <label><?= $booking['fields']['time'] ?? ''; ?></label>
                                    <div class="d-flex flex-row justify-content-between align-items-center">
                                        <select class="form-control mr-1" id="inputStartTimeHour" name="startHour"
                                                required>
                                            <option value="" disabled selected>Hour</option>
                                            <option value="08">08</option>
                                            <option value="09">09</option>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="12">12</option>
                                            <option value="13">13</option>
                                            <option value="14">14</option>
                                            <option value="15">15</option>
                                        </select>
                                        <div class="pl-1 pr-2 ms-2 me-2">:</div>
                                        <select class="form-control" id="inputStartTimeMinute" name="startMinute"
                                                required>
                                            <option value="" disabled selected>Min</option>
                                            <option value="00">00</option>
                                            <option value="00">30</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- End Input Start Time -->
                                <div class="form-group col-lg-4 d-flex-column">
                                    <label for="inputDate"><?= $booking['fields']['people'] ?? ''; ?></label>
                                    <input type="number" class="form-control" id="inputPeople" name="number" required/>
                                    <small class="form-text text-muted">Please choose how much people will be .</small>
                                </div>
                            </div>
                            <!-- End Input Date , Start Time and End Time -->

                            <!-- End Check Room Type -->

                            <hr/>

                            <!-- Start Submit Button -->
                            <button class="btn btn-primary btn-block col-lg-2 m-auto mt-4"
                                    type="submit"><?= $booking['button'] ?? ''; ?></button>
                            <!-- End Submit Button -->
                        </form>
                        <!-- End Form -->
                    </div>
                </div>
            </div>
        </div>
    <?php endif;
    if (!empty($gallery)):
        ?>
        <div id="gallery" class="container z-index-2">
            <div class="row">
                <?php
                $keys = array_keys($gallery);
                for ($i = 0; $i < count($keys); $i++) :
                    $row = $gallery[$keys[$i]];
                    if ($i <= 2): ?>
                        <div class="col-md-4 mt-3 col-lg-4">
                            <picture>
                                <?php showImageSrc($row['image_type'], $row['source']) ?>
                                <img src="<?= IMAGES_URI . $row['source']['mobile']; ?>" class="img-fluid"
                                     alt="<?= $row['alt'] ?? ''; ?>>">
                            </picture>
                        </div>
                    <?php endif;
                    if ($i <= 4 && $i > 2): ?>
                        <div class="col-md-4 mt-3 col-lg-6">
                            <picture>
                                <?php showImageSrc($row['image_type'], $row['source']) ?>
                                <img src="<?= IMAGES_URI . $row['source']['mobile']; ?>" class="img-fluid"
                                     alt="<?= $row['alt'] ?? ''; ?>>">
                            </picture>
                        </div>
                    <?php endif;
                    if ($i > 4): ?>
                        <div class="col-md-4 mt-3 col-lg-3">
                            <picture>
                                <?php showImageSrc($row['image_type'], $row['source']) ?>
                                <img src="<?= IMAGES_URI . $row['source']['mobile']; ?>" class="img-fluid"
                                     alt="<?= $row['alt'] ?? ''; ?>>">
                            </picture>
                        </div>
                    <?php endif;
                endfor; ?>
            </div>
        </div>
<!---->
<!--        <div class="col d-flex-column-center mt-5">-->
<!--            <a href="#" class="btn">View Complete Menu</a>-->
<!--        </div>-->
    <?php endif; ?>
</section>