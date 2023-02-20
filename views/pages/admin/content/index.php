<?php
require_once ADMIN_PARTS_DIR . '/header.php';

$content = dbSelect(Tables::Content);
extract($content);
?>
    <section class="d-flex-column " style="padding: 10rem 0">
        <div class="container">
            <div class="row ">
                <div class="offset-md-2 col-md-8">
                    <h3>Content blocks</h3>
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Actions</th>
                        </tr>
                        <tbody>
                        <?php foreach ($content as $number => $item): ?>
                        <tr>
                            <td><?= $number + 1; ?></td>
                            <td><?= $item['name'] ?></td>
                            <td>
                                <div class="btn-group">
                                    <a class="btn admin-product-btn btn-info" href="/admin/content/edit/<?= $item['id'] ?>">
                                        <?= file_get_contents(SVG_URI . '/edit.svg') ?>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                        </tbody>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </section>
<?php require_once ADMIN_PARTS_DIR . '/footer.php';
