<?php
ob_start();
require_once "../util/connection.php";

$country = $_POST["country"];
$port = mysqli_query($connection, "select * FROM port where country_id='$country'");
echo "<option>--- Select Port --</option> ";
while ($city = mysqli_fetch_array($port)) {
    echo "<option value=$city[id]>$city[name]</option>";
}
?>