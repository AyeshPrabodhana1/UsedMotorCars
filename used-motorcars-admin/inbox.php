<?php
ob_start();
require_once "functions/db.php";
// Initialize the session
session_start();
$email = $_SESSION['email'];
$sql = 'SELECT * FROM contacts';
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
                        <li class="active">Inbox</li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="white-box">
                        <div class="row">
                            <div class="col-lg-12 col-md-9 col-sm-12 col-xs-12 mail_listing">
                                <div class="inbox-center">
                                    <?php
                                    if (isset($_GET["deleted"])) {
                                        echo
                                            '<div class="alert alert-warning" >
                                              <a href="#" class="close" data-dismiss="alert" aria-label="close"></a>
                                             <strong>DELETED!! </strong><p> The message has been successfully deleted.</p>
                                        </div>';
                                    } elseif (isset($_GET["del_error"])) {
                                        echo
                                            '<div class="alert alert-danger" >
                                              <a href="#" class="close" data-dismiss="alert" aria-label="close"></a>
                                             <strong>ERROR!! </strong><p> There was an error during deleting this record. Please try again.</p>
                                        </div>';
                                    }
                                    ?>
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <h4>Recent Messages(<b style="color: orange;"><?php echo mysqli_num_rows($query); ?></b>)</h4>
                                                    <?php
                                                    if (mysqli_num_rows($query) == 0) {
                                                        echo "<i style='color:brown;'>No messages Yet :( </i> ";
                                                    }
                                                    ?>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            while ($row = mysqli_fetch_array($query)) {
                                                echo
                                                    '
                                                <tr>
                                                   <td class="hidden-xs"><a href="inbox-detail.php?id=' . $row["id"] . '" />' . $row["names"] . '</td>
                                                    <td class="max-texts"><a href="inbox-detail.php?id=' . $row["id"] . '" />' . $row["message"] . '</td>
                                                    <td class="text-right">' . $row["date"] . '</td>
                                                </tr>';
                                            }
                                            ?>
                                        </tbody>
                                    </table>
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