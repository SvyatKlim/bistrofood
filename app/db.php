<?php
// SELECT [columns] FROM [table] [conditions]

function dbSelect(Tables $table, string $columns = '*', string $condition = null, string $order = null, array $offset = null, bool $isSingle = false)
{
    $query = "SELECT {$columns} FROM {$table->value}";
    $query .= $condition ? " WHERE {$condition}" : "";
    $query .= $order ? " ORDER BY {$order}" : "";
    $query .= $offset ? " LIMIT {$offset[0]}, {$offset[1]}" : "";

    $query = DB::connect()->prepare($query);
    $query->execute();

    return $isSingle ? $query->fetch() : $query->fetchAll();
}

function dbFind(Tables $table, int $id)
{
    $query = DB::connect()->prepare("SELECT * FROM {$table->value} WHERE id = :id");
    $query->bindParam('id', $id, PDO::PARAM_INT);
    $query->execute();

    return $query->fetch();
}

function getUserByEmail(string $email): array|bool
{
    $user = dbSelect(Tables::Users, condition: "email = '{$email}'", isSingle: true);

    if (!$user) {
        return false;
    }

    return $user;
}
function getUserById(int $id): array|bool
{
    $user = dbSelect(Tables::Users, condition: "id = '{$id}'", isSingle: true);

    if (!$user) {
        return false;
    }

    return $user;
}

function getProductById(int $id): array|bool
{
    $user = dbSelect(Tables::Products, condition: "id = '{$id}'", isSingle: true);

    if (!$user) {
        return false;
    }

    return $user;
}

function dbCount(Tables $table, string $condition = null)
{
    return dbSelect($table, 'Count(id) as count', condition: $condition, isSingle: true);
}