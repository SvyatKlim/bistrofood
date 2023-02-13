<?php
function createProduct(array $fields)
{
    $fields['image_url'] = prepareImage();
    createProductValidation($fields, 'create_product');
    createImage();
    $fields['is_main'] = (int)$fields['is_main'];
    $query = "INSERT INTO " . Tables::Products->value . "(name,description,quantity,price,is_main,image_url) VALUE (:name,:description,:quantity,:price,:is_main,:image_url)";
    $query = DB::connect()->prepare($query);
    $query->execute($fields);

    unset($_SESSION['create_product']);

    notify("Product '{$fields['name']}' was created.");
    redirect('/admin/products');
}

function includeProductForEdit(int $id)
{
    return $getProduct = dbSelect(Tables::Products, "*", "id = {$id}");
}

function editProduct(array $fields)
{
    $postId = $fields['id'];
    unset($fields['id']);
    $fields['image_url'] = prepareImage();
    createProductValidation($fields, 'edit_product');
    createImage();
    $fields['is_main'] = (int)$fields['is_main'];
    $query = "UPDATE " . Tables::Products->value . " SET name = :name , description = :description, quantity = :quantity,price = :price,is_main = :is_main,image_url = :image_url WHERE id = {$postId};";
    $query = DB::connect()->prepare($query);
//    $query->bindParam(':id', $postId);
    $query->execute($fields);

    unset($_SESSION['edit_product']);

    notify("Product '{$fields['name']}' was updated.");
    redirect('/admin/products');
}


function createProductValidation(array $fields, string $key): void
{
    updateSessionFields($key, $fields);

    unset($fields['description']);
    unset($fields['is_main']);

    $isEmptyFields = emptyFields($fields, $key);
    $isNegativeValues = validateOnNegativeValues($fields['price'], $fields['quantity'], $key);
    conditionRedirect(($isEmptyFields || $isNegativeValues), '/admin/products/create');
}

function validateOnNegativeValues(float $price, int $quantity, string $sessionKey): bool
{
    $result = false;

    foreach (compact('price', 'quantity') as $key => $value) {
        if ($value <= 0) {
            $_SESSION[$sessionKey]['errors'][$key] = "Value should be more than 0";
            $result = true;
        }
    }

    return $result;
}

function showMainProductsTable()
{
    $products = getProducts(page: $_GET['page'] ?? null);
    $count = getProducts(isCount: true)['count'];
    includeTable($products, $count);
}

function showAdditionalProductsTable()
{
    includeTable(getProducts(false));
}

function includeTable(array $products = [], int $count = 0)
{
    if (empty($products)) {
        echo "<h5>There are not products in this category</h5>";
    } else {
        include ADMIN_PAGE_DIR . '/products/parts/table.php';
    }
}

function getProducts(bool $isMain = true, int $page = null, bool $isCount = false)
{
    $offset = null;
    $condition = "is_main = " . ((int)$isMain);

    if ($page) {
        $start = $page === 1 ? 0 : ($page * ADMIN_PRODUCTS_PER_PAGE - 1);
        $end = $start + ADMIN_PRODUCTS_PER_PAGE;
        $offset = [$start, $end];
    }

    return $isCount
        ? dbCount(Tables::Products, condition: $condition)
        : dbSelect(Tables::Products, condition: $condition, offset: $offset);
}

function removeProduct(int $id)
{
    $query = "DELETE FROM " . Tables::Products->value . " WHERE id = :id";
    $query = DB::connect()->prepare($query);
    $query->bindParam('id', $id, PDO::PARAM_INT);
    $query->execute();
    notify("Product was removed!");
    redirect('/admin/products');
}

function prepareImage()
{

    $file = $_FILES['image'];
    $fileExtension = pathinfo($file['name'], PATHINFO_EXTENSION);;
    $upload_location = IMAGES_URI . "uploads/";
    $uploadFile = $upload_location . basename($file['name']);

    $allowed_image_extension = array(
        "png",
        "jpg",
        "jpeg"
    );

    if (!in_array($fileExtension, $allowed_image_extension)) {
        $_SESSION['create_product']['errors']['image'] = "Image extension is not correct. Please upload another image.";
        return false;
    } else {
        return $uploadFile;
    }
}

function createImage()
{
    $upload_location = IMAGES_DIR . "uploads/";
    $uploadFile = $upload_location . basename($_FILES['image']['name']);
    move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile);
}

