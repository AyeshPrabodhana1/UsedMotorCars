
<?php

require_once "db.php";

$extension = array("jpeg", "jpg", "png", "gif");

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "company";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

if (isset($_POST["submit"])) {
  $ref_no = $_POST['ref_no'];
  $title = $_POST['title'];
  $amount = $_POST['amount'];
  $description = mysqli_real_escape_string($conn, $_POST['description']);
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
  $moreDescription = mysqli_real_escape_string($conn, $_POST['moreDescription']);
  $contactInfo = mysqli_real_escape_string($conn, $_POST['contactInfo']);
  $contactMobile = $_POST['contactMobile'];
  $contactEmail = $_POST['contactEmail'];

  $sql = "INSERT INTO posts 
  (ref_no, title, description, amount, chassis, distance, transmissionId, doors, typeId, brandId, 
  model, engineSize, steering, seats, vehicleYear, fuelId, color, speed, moreDescription, 
  contactInfo, contactMobile, contactEmail)
VALUES ('$ref_no', '$title', '$description', '$amount', '$chassis', '$distance', '$transmissionId',
'$doors', '$typeId', '$brandId', '$model', '$engineSize', '$steering', '$seats', '$year', 
'$fuelId', '$color' ,'$speed', '$moreDescription', '$contactInfo', '$contactMobile', '$contactEmail')";

  if ($conn->query($sql) === TRUE) {
    $last_id = $conn->insert_id;

    if (!empty($_POST['check_list'])) {
      foreach($_POST['check_list'] as $selected) {
        $query_features = "INSERT INTO postfeatures (post_id,feature_id) VALUES ('$last_id', '$selected')";
        mysqli_query($conn, $query_features);
      }
    }
    
    foreach ($_FILES["files"]["tmp_name"] as $key => $tmp_name) {
      $file_name = $_FILES["files"]["name"][$key];
      $file_tmp = $_FILES["files"]["tmp_name"][$key];
      $ext = pathinfo($file_name, PATHINFO_EXTENSION);

      $query = "INSERT INTO images (name,extension,post_id) VALUES ('$file_name', '$ext', '$last_id')";

      mysqli_query($conn, $query);

      if (in_array($ext, $extension)) {
        if (!file_exists("C:/xampp/htdocs/UsedMotorCars/uploads/post/" . $txtGalleryName . "/" . $file_name)) {
          move_uploaded_file($file_tmp = $_FILES["files"]["tmp_name"][$key], "C:/xampp/htdocs/UsedMotorCars/uploads/post/" . $txtGalleryName . "/" . $file_name);
        }
      }
    }

    header('Location:../posts.php?posted');
  } else {
    echo "query failure";
    echo "Error: " . $sql . "<br>" . $conn->error;
    header('Location:../posts.php?post_error');
  }
}













?>