<?php

ob_start();
require_once "functions/db.php";
// Initialize the session
session_start();

$email = $_SESSION['email'];

if (isset($_GET['id'])) {
    $postid = $_GET['id'];
} else {
    header('Location:posts.php');
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
                    <a href="posts.php" class="waves-effect "><i data-icon="&#xe020;" class="linea-icon linea-basic fa-fw"></i> <span class="hide-menu">Go Back</span></a>
                    <h4 class="page-title"><?php echo $email; ?></h4>
                </div>
                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    <ol class="breadcrumb">
                        <li><a href="#">Dashboard</a></li>
                        <li class="active">Blog Post Detail</li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="white-box">
                        <div class="row">
                            <?php

                            $sql = "SELECT 
                            p.id, p.ref_no, p.title, p.description, p.amount, p.chassis, p.distance, tt.name as transmissionName, p.doors,
                            vt.name as vehicleType, vb.name as vehicleBrand, p.model, p.engineSize, p.steering, p.seats, p.vehicleYear,
                            ft.name as fuelType, p.color, p.speed, p.moreDescription, p.contactInfo, p.contactMobile, p.contactEmail,
                            p.date
                            FROM `posts` p 
                            LEFT OUTER JOIN `transmissiontype` tt
                            on p.transmissionId = tt.id
                            LEFT OUTER JOIN `vehicle_type` vt
                            on p.typeId = vt.id
                            LEFT OUTER JOIN `vehicle_brand` vb
                            on p.brandId = vb.id
                            LEFT OUTER JOIN `fueltype` ft
                            on p.fuelId = ft.id
                            where p.id='$postid'";

                            $query = mysqli_query($connection, $sql);
                            while ($row = mysqli_fetch_assoc($query)) {
                                echo

                                    '<div class="col-lg-12 col-md-9 col-sm-8 col-xs-12 mail_listing">
                                    <div class="media m-b-30 p-t-20">
                                    	<h4 class="font-bold m-t-0">' . $row["title"] . '
                                        </h4>
                                        <hr>
                                        <a class="pull-left" href="#"></a>
                                        <div class="media-body"> <span class="media-meta pull-right">' . $row["date"] . '</span>
                                            <h4 class="text-danger m-0">' . $row["amount"] . '</h4></div>
                                            <div class="row" style="margin-top: 15px;">
                                                <div class="col-md-4">
                                                    Reference Number
                                                </div>
                                                <div class="col-md-8">
                                                    <p> : ' . $row["ref_no"] . '</p>
                                                </div>
                                                <div class="col-md-4">
                                                    Description
                                                </div>
                                                <div class="col-md-8">
                                                    <p> : ' . $row["description"] . '</p>
                                                </div>
                                                <div class="col-md-4">
                                                    Chassis
                                                </div>
                                                <div class="col-md-8">
                                                    <p> : ' . $row["chassis"] . '</p>
                                                </div>
                                                <div class="col-md-4">
                                                    Distance
                                                </div>
                                                <div class="col-md-8">
                                                    <p> : ' . $row["distance"] . '</p>
                                                </div>
                                                <div class="col-md-4">
                                                    Transmission Type
                                                </div>
                                                <div class="col-md-8">
                                                    <p> : ' . $row["transmissionName"] . '</p>
                                                </div>
                                                <div class="col-md-4">
                                                    Door Count
                                                </div>
                                                <div class="col-md-8">
                                                    <p> : ' . $row["doors"] . '</p>
                                                </div>
                                                <div class="col-md-4">
                                                    Vehicle Type
                                                </div>
                                                <div class="col-md-8">
                                                    <p> : ' . $row["vehicleType"] . '</p>
                                                </div>
                                                <div class="col-md-4">
                                                    Vehicle Brand
                                                </div>
                                                <div class="col-md-8">
                                                    <p> : ' . $row["vehicleBrand"] . '</p>
                                                </div>
                                                <div class="col-md-4">
                                                    Model
                                                </div>
                                                <div class="col-md-8">
                                                    <p> : ' . $row["model"] . '</p>
                                                </div>
                                                <div class="col-md-4">
                                                    Engine Size
                                                </div>
                                                <div class="col-md-8">
                                                    <p> : ' . $row["engineSize"] . '</p>
                                                </div>
                                                <div class="col-md-4">
                                                    Steering
                                                </div>
                                                <div class="col-md-8">
                                                    <p> : ' . $row["steering"] . '</p>
                                                </div>
                                                <div class="col-md-4">
                                                    Seats
                                                </div>
                                                <div class="col-md-8">
                                                    <p> : ' . $row["seats"] . '</p>
                                                </div>
                                                <div class="col-md-4">
                                                    Vehicle Type
                                                </div>
                                                <div class="col-md-8">
                                                    <p> : ' . $row["vehicleType"] . '</p>
                                                </div>
                                                <div class="col-md-4">
                                                    Fuel Type
                                                </div>
                                                <div class="col-md-8">
                                                    <p> : ' . $row["fuelType"] . '</p>
                                                </div>
                                                <div class="col-md-4">
                                                    Color
                                                </div>
                                                <div class="col-md-8">
                                                    <p> : ' . $row["color"] . '</p>
                                                </div>
                                                <div class="col-md-4">
                                                    Speed
                                                </div>
                                                <div class="col-md-8">
                                                    <p> : ' . $row["speed"] . '</p>
                                                </div>
                                                <div class="col-md-4">
                                                    More Description
                                                </div>
                                                <div class="col-md-8">
                                                    <p> : ' . $row["moreDescription"] . '</p>
                                                </div>
                                                <div class="col-md-4">
                                                    Contact Information
                                                </div>
                                                <div class="col-md-8">
                                                    <p> : ' . $row["contactInfo"] . '</p>
                                                </div>
                                                <div class="col-md-4">
                                                    Contact Mobile
                                                </div>
                                                <div class="col-md-8">
                                                    <p> : ' . $row["contactMobile"] . '</p>
                                                </div>
                                                <div class="col-md-4">
                                                    Contact Email
                                                </div>
                                                <div class="col-md-8">
                                                    <p> : ' . $row["contactEmail"] . '</p>
                                                </div>
                                                
                                            </div>    
                                        </div>
                                    <hr>
                                    <div class="b-all p-20">
                                       <a href="#" class="btn btn-danger btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light" data-toggle="modal" data-target="#responsive-modal' . $row["id"] . '">Delete This Post</a>
                                    </div>
                                    <div class="b-all p-20">
                                        <a href="post-edit.php?id=' . $postid . '" class="btn btn-info btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light">Update This Post</a>
                                    </div>
                                </div>

                                <!-- /.modal -->
                                            <div id="responsive-modal' . $row["id"] . '" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                            <h4 class="modal-title">Are you sure you want to delete this post?</h4></div>
                                                        <div class="modal-footer">
                                                        <form action="functions/del_post.php" method="post">
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
                                echo '<div class="col-lg-12">';
                                echo '<h3>Extra Features </h3> <hr/>' ;
                                $sql_features = "SELECT f.id ,f.name FROM postfeatures pf, features f where pf.feature_id = f.id and post_id = '$postid'";
                                $query_features = mysqli_query($connection, $sql_features);
                                while ($row_fea = mysqli_fetch_assoc($query_features)) {
                                    echo '
                                        <p> '. $row_fea['name'] .'</p> 
                                    ';
                                }
                                echo '</div> <hr/>';
                                $sql_images = "SELECT * from images where post_id ='$postid'";
                                $query_img = mysqli_query($connection, $sql_images);
                                while ($row_img = mysqli_fetch_assoc($query_img)) {
                                    echo '
                                        <div class="col-lg-4 col-md-9 col-sm-8 col-xs-12 ">
                                            <div class="media m-b-30">
                                                <div class="media-body">
                                                <p> <img src="http://localhost/usedmotorcars/uploads/post/' . $row_img["name"] . '"/></p>
                                                </div>
                                            </div>
                                        </div>
                                    ';
                                }
                            }

                            ?>

                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
        <?php include 'includes/footer-text.php'; ?>
    </div>
    <!-- /#page-wrapper -->
</div>
<?php include 'includes/footer.php'; ?>