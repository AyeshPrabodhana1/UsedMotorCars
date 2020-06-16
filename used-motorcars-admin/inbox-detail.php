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
    $inboxid = $_GET['id'];
    $sql = "SELECT * FROM contacts WHERE id='$inboxid'";
} else {
    header('Location:inbox.php');
}

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
                    <a href="inbox.php" class="waves-effect active"><i data-icon="&#xe020;" class="linea-icon linea-basic fa-fw"></i> <span class="hide-menu">Go Back</span></a>
                    <h4 class="page-title"><?php echo $email; ?></h4>
                </div>
                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    <ol class="breadcrumb">
                        <li><a href="#">Dashboard</a></li>
                        <li class="active">Inbox Detail</li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="white-box">
                        <div class="row">

                            <?php
                            $query = mysqli_query($connection, $sql);
                            while ($row = mysqli_fetch_assoc($query)) {

                                echo
                                    '<div class="col-lg-12 col-md-9 col-sm-8 col-xs-12 mail_listing">
                                    <div class="media m-b-30 p-t-20">
                                        <a class="pull-left" href="#"></a>
                                        <div class="media-body"> <span class="media-meta pull-right">' . $row["date"] . '</span>
                                            <h4 class="text-danger m-0">' . $row["names"] . '</h4> <small class="text-muted">Email: ' . $row["email"] . '</small> </div>
                                    </div>
                                    <p>
                                        ' . $row["message"] . '
                                    </p>
                                    <hr>
                                    <div class="b-all p-20">
                                       <a href="#" class="btn btn-danger btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light" data-toggle="modal" data-target="#responsive-modal' . $row["id"] . '">Delete Message</a>
                                    </div>
                                </div>

                                 <!-- /.modal -->
                                            <div id="responsive-modal' . $row["id"] . '" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                            <h4 class="modal-title">Are you sure you want to delete this message?</h4></div>
                                                        <div class="modal-footer">
                                                        <form action="functions/del_message.php" method="post">
                                                        <input type="hidden" name="id" value="' . $row["id"] . '"/>
                                                            <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-danger waves-effect waves-light">Delete</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> 
                                            <!-- End Modal -->

                                ';
                            }
                            ?>


                        </div>
                    </div>
                </div>
            </div>

        </div>
        <?php include 'includes/footer-text.php'; ?>
    </div>
</div>
<?php include 'includes/footer.php'; ?>