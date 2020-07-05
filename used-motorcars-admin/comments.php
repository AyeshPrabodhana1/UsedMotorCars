<?php
ob_start();
require_once "functions/db.php";
// Initialize the session
session_start();
$email = $_SESSION['email'];
$sql = 'SELECT * FROM comments';
$query = mysqli_query($connection, $sql);

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
                        <li><a href="index.php">Dashboard</a></li>
                        <li class="active">Comments</li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="white-box">
                        <div class="row">

                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mail_listing">
                                <div class="inbox-center">


                                    <?php
                                    if (isset($_GET["deleted"])) {
                                        echo
                                            '<div class="alert alert-warning" >
                                              <a href="#" class="close" data-dismiss="alert" aria-label="close"></a>
                                             <strong>DELETED!! </strong><p> The comment has been successfully deleted.</p>
                                        </div>';
                                    } elseif (isset($_GET["del_error"])) {
                                        echo
                                            '<div class="alert alert-danger" >
                                              <a href="#" class="close" data-dismiss="alert" aria-label="close"></a>
                                             <strong>ERROR!! </strong><p> There was an error during deleting this record. Please try again.</p>
                                        </div>';
                                    }
                                    ?>




                                    <h4>Recent Posts Comments (<b style="color: orange;"><?php echo mysqli_num_rows($query); ?></b>)</h4>
                                    <?php
                                    if (mysqli_num_rows($query) == 0) {
                                        echo "<i style='color:brown;'>No Comments Yet :( </i> ";
                                    }
                                    ?>

                                    <div class="comment-center">

                                        <?php
                                        while ($row = mysqli_fetch_array($query)) {
                                            $blogid = $row["blogid"];
                                            $sql2 = "SELECT * FROM posts WHERE id='$blogid'";
                                            $query2 = mysqli_query($connection, $sql2);

                                            while ($row2 = mysqli_fetch_assoc($query2)) {

                                                echo
                                                    '<div class="comment-body">
                                                            <div class="mail-contnet">
                                                                <b>' . $row["name"] . '</b>
                                                                <h5>Blog Title : ' . $row2["title"] . '</h5>
                                                                <span class="mail-desc">
                                                                ' . $row["comment"] . '
                                                                </span><a href="javacript:void(0)" class="action" data-toggle="modal" data-target="#responsive-modal' . $row["id"] . '"><i class="ti-close text-danger"></i></a> <span class="time pull-right">' . $row["date"] . '</span></div>
                                                        </div>

                                                         <!-- /.modal -->
                                            <div id="responsive-modal' . $row["id"] . '" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                            <h4 class="modal-title">Are you sure you want to delete this comment?</h4></div>
                                                        <div class="modal-footer">
                                                        <form action="functions/del_comment.php" method="post">
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
                                        }

                                        ?>

                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-xs-7 m-t-20"> Showing 1 - <?php echo mysqli_num_rows($query); ?> </div>
                                    <div class="col-xs-5 m-t-20">
                                        <div class="btn-group pull-right">
                                            <button type="button" class="btn btn-default waves-effect"><i class="fa fa-chevron-left"></i></button>
                                            <button type="button" class="btn btn-default waves-effect"><i class="fa fa-chevron-right"></i></button>
                                        </div>
                                    </div>
                                </div>
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