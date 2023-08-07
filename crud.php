<?php
require_once 'db_connection.php';

// CREATE
if (isset($_POST['add_product'])) {
    $name = $_POST['name'];
    $size = $_POST['size'];
    $price = $_POST['price'];
    $image_url = $_POST['image_url'];
    $description = $_POST['description'];

    $sql = "INSERT INTO products (name, size, price, image_url, description) VALUES ('$name', '$size', $price, '$image_url', '$description')";
    if ($conn->query($sql) === TRUE) {
        echo "Product added successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// UPDATE
if (isset($_POST['update_product'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $size = $_POST['size'];
    $price = $_POST['price'];
    $image_url = $_POST['image_url'];
    $description = $_POST['description'];

    $sql = "UPDATE products SET name='$name', size='$size', price=$price, image_url='$image_url', description='$description' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "Product updated successfully.";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

// DELETE
if (isset($_GET['delete_product'])) {
    $id = $_GET['delete_product'];

    $sql = "DELETE FROM products WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "Product deleted successfully.";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

$conn->close();
?>
