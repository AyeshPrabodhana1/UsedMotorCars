<?php

ob_start();
require_once "functions/db.php";
// Initialize the session
session_start();

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
                        <li><a href="#">Account</a></li>
                        <li class="active">Settings</li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="white-box">
                        <h3 class="box-title m-b-0">Change Your Account Settings</h3>
                        <p class="text-muted m-b-30 font-13"> (Password Update) </p>
                        <div class="row">
                            <div class="col-sm-12 col-xs-12">
                                <form action="functions/settings.php" method="post">
                                    <!-- EMAIL HIDDEN -->
                                    <input type="hidden" name="email" value="<?php echo $_SESSION['email']; ?>" />
                                    <!-- EMAIL HIDDEN -->
                                    <div class="form-group">
                                        <label for="exampleInputpwd1">New Password</label>
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="ti-lock"></i></div>
                                            <input type="password" name="password" id="Password" class="form-control" id="exampleInputpwd1" placeholder="Enter Password" required="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputpwd2">Confirm Password</label>
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="ti-lock"></i></div>
                                            <input type="password" name="password2" id="ConfirmPassword" class="form-control" id="exampleInputpwd2" placeholder="Confirm Password" required="">
                                        </div>
                                        <div id="msg" style="padding-left: 10px;"></div>
                                    </div>
                                    <button type="submit" name="submit" class="btn btn-success waves-effect waves-light m-r-10">Submit</button>
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
<script>
    $(document).ready(function() {
        $("#ConfirmPassword").keyup(function() {
            if ($("#Password").val() != $("#ConfirmPassword").val()) {
                $("#msg").html("Password do not match").css("color", "red");
            } else {
                $("#msg").html("Password matched").css("color", "green");
            }
        });
    });
</script>