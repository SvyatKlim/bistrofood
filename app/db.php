<?php
// SELECT [columns] FROM [table] [conditions]

function dbSelect(Tables $table, string $columns = '*', string $condition = null, string $order = null, bool $isSingle = false)
{
    $query = "SELECT {$columns} FROM {$table->value}";
    $query .= $condition ? " WHERE {$condition}" : "";
    $query .= $order ? " ORDER BY {$order}" : "";

    $query = DB::connect()->prepare($query);
    $query->execute();

    return $isSingle ? $query->fetch() : $query->fetchAll();
}

function dbFind(Tables $table, int $id){
    $query = DB::connect()->prepare("SELECT * FROM {$table} WHERE id = {$id} ");
    $query->bindParam('id',$id,PDO::PARAM_INT);
    $query->execute();

    return $query->fetch();
}