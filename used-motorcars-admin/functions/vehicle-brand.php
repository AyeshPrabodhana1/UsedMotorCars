<?php
$msg = "";
if (isset($_POST['save'])) {
    // path to store the uploaded image
    $target = "http://localhost/usedmotorcars/uploads/brand/" . basename($_FILES['image']['name']);

    // connect to the database
    $db = mysqli_connect("localhost", "root", "", "company");

    // retrieve form data
    $code = $_POST['code'];
    $name = $_POST['name'];
    $image = $_FILES['image']['name'];

    $sql = "INSERT INTO vehicle_brand(code, name, image) VALUES ('$code', '$name', '$image')";
    mysqli_query($db, $sql);

    // move the saved image to the uploaded folder
    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
        $msg = "Vehicle brand created successfully";
        header('Location:../vehicle-brand.php?inserted');
    } else {
        $msg = "Error occurred while processing";
    }
}

if (isset($_POST["delete"])) {
    $id = $_POST["id"];
    $image = $_POST["image"];
    $filePath = 'http://localhost/usedmotorcars/uploads/brand/'.$image;


    // connect to the database
    $db = mysqli_connect("localhost", "root", "", "company");

    $sql = "DELETE FROM vehicle_brand where id=$id";

    try {
        mysqli_query($db, $sql);
        if (file_exists($filePath)) {
            unlink($filePath);
            header('Location:../vehicle-brand.php?deleted');
        } else {
            header('Location:../vehicle-brand.php?delete_error');
        }
    } catch (Exception $e) {
        $e->getMessage();
        echo "Error";
    }
}
