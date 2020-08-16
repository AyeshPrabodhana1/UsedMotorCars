<?php
ob_start();
require_once "../util/connection.php";

$port = $_POST["port"];
$port = mysqli_query($connection, "select fob, freight FROM port where id='$port'");
while ($res = mysqli_fetch_array($port)) {
    echo json_encode(array('fob' => $res[0], 'freight'=> $res[1]));
}
?>