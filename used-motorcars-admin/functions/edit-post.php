
<?php

require_once "db.php";

$extension = array("jpeg", "jpg", "png", "gif");

if (isset($_POST["submit"])) {
    $id = $_POST["postid"];
    $ref_no = $_POST['ref_no'];
    $title = $_POST['title'];
    $amount = $_POST['amount'];
    $description = mysqli_real_escape_string($connection, $_POST['description']);
    $chassis = $_POST['chassis'];
    $distance = $_POST['distance'];
    $transmissionId = $_POST['transmissionId'];
    $doors = $_POST['doors'];
    $typeId = $_POST['typeId'];
    $brandId = $_POST['brandId'];
    $model = $_POST['model'];
    $engineSize = $_POST['engineSize'];
    $steering = $_POST['steering'];
    $seats = $_POST['seats'];
    $year = $_POST['year'];
    $fuelId = $_POST['fuelId'];
    $color = $_POST['color'];
    $speed = $_POST['speed'];
    $moreDescription = mysqli_real_escape_string($connection, $_POST['moreDescription']);
    $contactInfo = mysqli_real_escape_string($connection, $_POST['contactInfo']);
    $contactMobile = $_POST['contactMobile'];
    $contactEmail = $_POST['contactEmail'];

    $sql_update = "UPDATE posts set
    ref_no = '$ref_no',
    title = '$title',
    description = '$description',
    amount = '$amount',
    chassis = '$chassis',
    distance = '$distance',
    transmissionId = '$transmissionId',
    doors = '$doors',
    typeId = '$typeId',
    brandId = '$brandId',
    model = '$model',
    engineSize = '$engineSize',
    steering = '$steering',
    seats = '$seats',
    vehicleYear = '$year',
    fuelId = '$fuelId',
    color = '$color',
    speed = '$speed',
    moreDescription = '$moreDescription',
    contactInfo = '$contactInfo',
    contactMobile = '$contactMobile',
    contactEmail = '$contactEmail'
    WHERE id=$id";

    if ($connection->query($sql_update) === TRUE) {
        header('Location:../posts.php?updated');
    } else {
        header('Location:../posts.php?updated_error');
    }
}













?>