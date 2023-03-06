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

function productsByOrder(int $orderId): array|bool
{

    $query = "SELECT p.id, p.name, p.description, op.quantity, op.single_price, op.additions FROM order_products op LEFT JOIN products p on op.product_id = p.id WHERE op.order_id = :order_id";
    $query = DB::connect()->prepare($query);
    $query->bindParam('order_id', $orderId, PDO::PARAM_INT);
    $query->execute();
    return $query->fetchAll();
}

function updateUserBalance(int $userId, float $total): void
{
    $user = dbFind(Tables::Users, $userId);

    if ($user['balance'] < $total) {
        throw new Exception('Not enough money on you balance');
    }

    $query = "UPDATE " . Tables::Users->value . " SET balance = balance - :total WHERE id = :id";
    $query = DB::connect()->prepare($query);

    $query->bindParam('total', $total);
    $query->bindParam('id', $userId);

    $query->execute();


}

function findUserByToken(string $token)
{
    $query = DB::connect()->prepare("SELECT * FROM users WHERE token = :token");
    $query->bindParam('token', $token);
    if (!$query->execute()) {
        throw new Exception('oops', 422);
    }
    return $query->fetch();
}