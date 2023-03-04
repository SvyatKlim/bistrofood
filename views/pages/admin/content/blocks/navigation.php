<?php
$fields = json_decode($block['content'], true);
require_once ADMIN_PARTS_DIR . '/header.php'; ?>
    <div class="container admin-form" style="padding: 10rem 0">
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8">
                <div class="card">
                    <div class="card-header text-center"><h3>Create Content</h3>
                    </div>
                    <div class="card-body">
                        <form action="/" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="type" value="edit_content">
                            <input type="hidden" name="content_id" value="<?= $block['id']; ?>">
                            <input type="hidden" name="content_name" value="<?= $block['name']; ?>">

                            <?php if (!empty($fields['logo'])) : ?>
                                <div class="mb-3">
                                    <h4>Logo Preview</h4>
                                    <picture>
                                        <img src="<?= IMAGES_URI . $fields['logo']; ?>" alt="Logo"
                                             style="width: 150px; background-color: black">
                                    </picture>
                                </div>
                            <?php endif; ?>
                            <div class="mb-3">
                                <label for="name" class="form-label">Logo</label>
                                <input type="file" name="logo" class="form-control"
                                       id="logo"/>
                            </div>
                            <hr>
                            <?php $lastKey = array_key_last($fields['links']) ?? 0; ?>
                            <h4>Navigation Links: </h4>
                            <div class="mb-3 links-wrapper js-links-wrapper" data-last-key="<?= $lastKey?>">
                                <?php if (!empty($fields['links'])):
                                    foreach ($fields['links'] as $order => $link) :
                                        ?>
                                    <div class="row mb-3 links-item js-links-item ">
                                        <div class="pb-3 p-2 border-bottom mb-3 col-9">
                                            <h4>Link</h4>
                                            <div class="mb-2">
                                                <label for="link_title_<?= $order; ?>" class="form-label">Title</label>
                                                <input type="text"
                                                       name="links[<?= $order; ?>][title]"
                                                       class="form-control"
                                                       id="link_title_<?= $order; ?>"
                                                       value="<?= $link['title']?>"
                                                />
                                            </div>
                                            <div>
                                                <label for="link_<?= $order; ?>" class="form-label">URL</label>
                                                <input type="text"
                                                       name="links[<?= $order; ?>][hash]"
                                                       class="form-control"
                                                       id="link_<?= $order; ?>"
                                                       value="<?= $link['hash'] ?? '/'?>"
                                                />
                                            </div>
                                            <div class="btn-group d-flex justify-content-start col-2 mt-4 js-btn-delete-wrapper ">
                                                <a type="submit"
                                                   class="btn admin-product-btn btn-danger remove-link js-remove-link">Delete <?= file_get_contents(SVG_URI . '/delete.svg') ?></a>
                                            </div>
                                        </div>
                                    </div>

                                    <?php endforeach;
                                endif; ?>
                            </div>
                            <div class="row">
                                <a href="" class="add-new-link btn btn-primary js-add-link">Add Link</a>
                                <button type="submit"
                                        class="btn btn-primary ms-4">Update block</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
require_once ADMIN_PARTS_DIR . '/footer.php';
