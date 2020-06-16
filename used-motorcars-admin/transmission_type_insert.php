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
                        <li><a href="#">Vehicle</a></li>
                        <li class="active">Transmission</li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="white-box">
                        <h3 class="box-title m-b-0">Insert New Transmission Type</h3>
                        <div class="row">
                            <div class="col-sm-12 col-xs-12">
                                <form action="functions/transmission_type.php" method="post">
                                    <div class="form-group">
                                        <label for="exampleInputpwd1">Code</label>
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="ti-lock"></i></div>
                                            <input type="text" name="code" id="code" class="form-control" placeholder="Enter Code" required="true">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputpwd1">Name</label>
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="ti-lock"></i></div>
                                            <input type="text" name="name" id="name" class="form-control" placeholder="Enter Name" required="true">
                                        </div>
                                    </div>
                                    <button type="submit" name="save" class="btn btn-success waves-effect waves-light m-r-10">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include 'includes/footer-text.php'; ?>
    </div>
</div>
<?php include 'includes/footer.php'; ?>