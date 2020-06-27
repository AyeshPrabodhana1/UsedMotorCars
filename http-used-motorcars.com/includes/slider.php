<?php
ob_start();
require_once "util/connection.php";

$sql_post = "SELECT * FROM posts";
$query_list = mysqli_query($connection, $sql_post);

?>

<section class="top-slider-features wow fadeIn" data-wow-duration="1.5s">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="slider-top-features">
                    <div id="owl-top-features" class="owl-carousel owl-theme">

                        <?php
                        while ($row = mysqli_fetch_array($query_list)) {
                            echo '
                            <div class="item car-item">
                            <div class="thumb-content">
                            ';
                            $sql_post_image = "SELECT * FROM images where post_id = " . $row['id'] . "";
                            $query_image = mysqli_query($connection, $sql_post_image);
                            $firstrow = mysqli_fetch_assoc($query_image);
                            mysqli_data_seek($query_image, 0);
                            echo '
                            <a href="detail.php"><img src="../used-motorcars-admin/uploads/post/' . $firstrow["name"] . '" alt=""></a>
                            ';
                            echo '
                                </div>
                            <div class="down-content">
                                <a href="detail.php">
                                    <h4>' . $row['title'] . '</h4>
                                </a>
                                <span>' . $row['amount'] . '</span>
                            </div>
                        </div>
                            ';
                        }
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>