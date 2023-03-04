<?php

function updateNavigationBlock(int $id, array $fields)
{
    $block = dbFind(Tables::Content, $id);
    $dbContent = json_decode($block['content'], true);
    $links = $fields['links'] ?? [];
    $content = json_encode([
        'logo' => uploadSiteLogo($dbContent['logo'], $id),
        'links' => array_values($links),
    ]);

    $query = "UPDATE " . Tables::Content->value . " SET content = :content WHERE id = :id ";
    $query = DB::connect()->prepare($query);

    $query->bindParam('content', $content);
    $query->bindParam('id', $id, PDO::PARAM_INT);

    runContentQuery($query,$id);

}

function uploadSiteLogo(string $image, int $id): string
{

    if (!empty($_FILES) && $_FILES['logo']['error'] === 0) {
        $newImageName = time() . "_{$_FILES['logo']['name']}";
        $path = IMAGES_DIR . '/uploads/' . $newImageName;

        uploadContentImage($_FILES['logo']['tmp_name'], $path, $id);

        $oldFile = IMAGES_DIR . '/uploads/' . str_replace('/', '', $image);
        if (file_exists($oldFile)) {
            unlink($oldFile);
        }

        $image = $newImageName;

    }

    return $image;
}