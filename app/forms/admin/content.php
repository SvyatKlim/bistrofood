<?php

function editContent()
{
    $fields = $_POST;
    $name = filter_input(INPUT_POST, 'content_name');
    $id = filter_input(INPUT_POST, 'content_id', FILTER_VALIDATE_INT);

    conditionRedirect(!$id, '/admin/content');

    unset($fields['content_name'], $fields['content_id']);

    match ($name) {
        'navigation' => updateNavigationBlock($id, $fields),
        default => redirect("/admin/content/edit/{$id}")
    };
}

function uploadContentImage(string $tmp_name, string $path, int $id)
{
    if (!move_uploaded_file($tmp_name, $path)) {
        notify("We can not Upload this file", "danger");
        redirect("/admin/content/edit/{$id}");
    }
}


function runContentQuery(PDOStatement $query, int $id)
{
    if ($query->execute()) {
        notify('Block was successfully updated');
    } else {
        notify('Something went wrong!', 'danger');
    }

    redirect("/admin/content/edit/{$id}");
}