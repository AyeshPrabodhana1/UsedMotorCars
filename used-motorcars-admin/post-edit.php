<?php

ob_start();
require_once "functions/db.php";
// Initialize the session
session_start();
// If session variable is not set it will redirect to login page
if (!isset($_SESSION['email']) || empty($_SESSION['email'])) {

    header("location: login.php");

    exit;
}

$email = $_SESSION['email'];

if (isset($_GET['id'])) {
    $postid = $_GET['id'];
} else {
    header('Location:posts.php');
}

$sql_post_update = "SELECT * FROM posts where id ='$postid'";
$post_list = mysqli_query($connection, $sql_post_update);

$post_row= mysqli_fetch_array($post_list);

$sql_transmission = "SELECT * FROM transmissiontype";
$transmission_query = mysqli_query($connection, $sql_transmission);

$sql_brand = "SELECT * FROM vehicle_brand";
$brand_query = mysqli_query($connection, $sql_brand);

$sql_type = "SELECT * FROM vehicle_type";
$type_query = mysqli_query($connection, $sql_type);

$sql_fuel = "SELECT * FROM fueltype";
$fuel_query = mysqli_query($connection, $sql_fuel);

?>
<?php include 'includes/header.php'; ?>
<div id="wrapper">
    <?php include 'includes/navigation.php'; ?>
    <?php include 'includes/sidebar.php'; ?>
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row bg-title">
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    <h4 class="page-title"><?php echo $email; ?></h4>
                </div>
                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    <ol class="breadcrumb">
                        <li><a href="#">Dashboard</a></li>
                        <li><a href="#">Posts</a></li>
                        <li class="active">Update</li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="white-box">
                        <h3 class="box-title m-b-0">Update Vehicle Post</h3>
                        <form id="validation" action="functions/edit-post.php" class="form-horizontal" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="postid"  value="<?php echo $post_row['id']; ?>"/>
                        <div class="form-group">
                                <label class="col-xs-3 control-label">Reference Number</label>
                                <div class="col-xs-5">
                                    <input type="text" value="<?php echo $post_row['ref_no']; ?>" class="form-control" name="ref_no" required="true" /> </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-3 control-label">Post Title</label>
                                <div class="col-xs-5">
                                    <input type="text" value="<?php echo $post_row['title']; ?>" class="form-control" name="title" required="true" /> </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-3 control-label">Amount</label>
                                <div class="col-xs-5">
                                    <input type="text" value="<?php echo $post_row['amount']; ?>" class="form-control" name="amount" required /> </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-3 control-label">Short Description</label>
                                <div class="col-xs-5">
                                    <textarea type="text" class="form-control" name="description"><?php echo htmlspecialchars($post_row['description']); ?></textarea> </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-3 control-label">Description</label>
                                <div class="col-xs-5">
                                    <textarea type="text" class="form-control" name="moreDescription"><?php echo htmlspecialchars($post_row['moreDescription']); ?></textarea> </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-3 control-label">Chassis</label>
                                <div class="col-xs-5">
                                    <input type="text" value="<?php echo $post_row['chassis']; ?>" class="form-control" name="chassis" /> </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-3 control-label">Distance</label>
                                <div class="col-xs-5">
                                    <input type="text" value="<?php echo $post_row['distance']; ?>" class="form-control" name="distance" /> </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-3 control-label">Transmission Type</label>
                                <div class="col-xs-5">
                                    <?php
                                    echo "<select name='transmissionId' class='form-control' required>";
                                    while ($row_tran = mysqli_fetch_array($transmission_query)) {
                                        $selected=($row_tran['id'] == $post_row['transmissionId'])? "selected" : "";
                                        echo "<option value='" . $row_tran['id'] . "' ".$selected.">". $row_tran['name'] . "</option>";
                                    }
                                    echo "</select>";
                                    ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-3 control-label">Vehicle Brand</label>
                                <div class="col-xs-5">
                                    <?php
                                    echo "<select name='brandId' class='form-control' required>";
                                    while ($row_brand = mysqli_fetch_array($brand_query)) {
                                        $selected=($row_brand['id'] == $post_row['brandId'])? "selected" : "";
                                        echo "<option value='" . $row_brand['id'] . "' ".$selected.">" . $row_brand['name'] . "</option>";
                                    }
                                    echo "</select>";
                                    ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-3 control-label">Vehicle Type</label>
                                <div class="col-xs-5">
                                    <?php
                                    echo "<select name='typeId' class='form-control' required>";
                                    while ($row_type = mysqli_fetch_array($type_query)) {
                                        $selected=($row_type['id'] == $post_row['typeId'])? "selected" : "";
                                        echo "<option value='" . $row_type['id'] . "' ".$selected.">" . $row_type['name'] . "</option>";
                                    }
                                    echo "</select>";
                                    ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-3 control-label">Door Count</label>
                                <div class="col-xs-5">
                                    <input type="text" value="<?php echo $post_row['doors']; ?>" class="form-control" name="doors" /> </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-3 control-label">Vehicle Model</label>
                                <div class="col-xs-5">
                                    <input type="text" value="<?php echo $post_row['model']; ?>" class="form-control" name="model" required /> </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-3 control-label">Engine Size</label>
                                <div class="col-xs-5">
                                    <input type="text" value="<?php echo $post_row['engineSize']; ?>" class="form-control" name="engineSize" /> </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-3 control-label">Steering</label>
                                <div class="col-xs-5">
                                    <input type="text" value="<?php echo $post_row['steering']; ?>" class="form-control" name="steering" /> </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-3 control-label">Seat Count</label>
                                <div class="col-xs-5">
                                    <input type="text" value="<?php echo $post_row['seats']; ?>" class="form-control" name="seats" /> </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-3 control-label">Vehicle Year</label>
                                <div class="col-xs-5">
                                    <input type="text" value="<?php echo $post_row['vehicleYear']; ?>" class="form-control" name="year" /> </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-3 control-label">Fuel Type</label>
                                <div class="col-xs-5">
                                    <?php
                                    echo "<select name='fuelId' class='form-control' required>";
                                    while ($row_fuel = mysqli_fetch_array($fuel_query)) {
                                        $selected=($row_fuel['id'] == $post_row['fuelId'])? "selected" : "";
                                        echo "<option value='" . $row_fuel['id'] . "' ".$selected.">" . $row_fuel['name'] . "</option>";
                                    }
                                    echo "</select>";
                                    ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-3 control-label">Vehicle Color</label>
                                <div class="col-xs-5">
                                    <input type="text" value="<?php echo $post_row['color']; ?>" class="form-control" name="color" /> </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-3 control-label">Speed</label>
                                <div class="col-xs-5">
                                    <input type="text" value="<?php echo $post_row['speed']; ?>" class="form-control" name="speed" /> </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-3 control-label">Telephone Number</label>
                                <div class="col-xs-5">
                                    <input type="text" value="<?php echo $post_row['contactMobile']; ?>" class="form-control" name="contactMobile" required /> </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-3 control-label">Email</label>
                                <div class="col-xs-5">
                                    <input type="email" value="<?php echo $post_row['contactEmail']; ?>" class="form-control" name="contactEmail" required /> </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-3 control-label">Contact Information</label>
                                <div class="col-xs-5">
                                    <textarea class="form-control" name="contactInfo" ><?php echo htmlspecialchars($post_row['contactInfo']); ?> </textarea>
                                </div>
                            </div>
                            <input type="submit" name="submit" value="Update" class="btn btn-outline btn-success">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php include 'includes/footer-text.php'; ?>
    </div>
</div>
<?php include 'includes/footer.php'; ?>