<?php
$msg = "";

// connect to the database
$db = mysqli_connect("localhost", "root", "", "company");

if (isset($_POST['save'])) {
    // path to store the uploaded image
    $target = "http://localhost/usedmotorcars/uploads/type/" . basename($_FILES['image']['name']);

    // retrieve form data
    $code = $_POST['code'];
    $name = $_POST['name'];
    $image = $_FILES['image']['name'];

    $sql = "INSERT INTO vehicle_type(code, name, image) VALUES ('$code', '$name', '$image')";
    mysqli_query($db, $sql);

    // move the saved image to the uploaded folder
    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
        $msg = "Vehicle type created successfully";
        header('Location:../vehicle-type.php?inserted');
    } else {
        $msg = "Error occurred while processing";
    }
}


if (isset($_POST["delete"])) {
    $id = $_POST["id"];
    $image = $_POST["image"];
    $filePath = 'http://localhost/usedmotorcars/uploads/type/' . $image;

    $sql = "DELETE FROM vehicle_type where id=$id";

    try {
        mysqli_query($db, $sql);
        if (file_exists($filePath)) {
            unlink($filePath);
            header('Location:../vehicle-brand.php?deleted');
        } else {
            header('Location:../vehicle-type.php?delete_error');
        }
    } catch (Exception $e) {
        $e->getMessage();
        echo "Error";
    }
}
