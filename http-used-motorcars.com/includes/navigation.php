<?php
ob_start();
require_once "util/connection.php";

$sql_brand = "SELECT * FROM vehicle_brand";
$query_brand_list = mysqli_query($connection, $sql_brand);

$sql_type = "SELECT * FROM vehicle_type";
$query_type_list = mysqli_query($connection, $sql_type);

?>

<header class="site-header wow fadeIn" data-wow-duration="1s">
<!-- style="background-color: #f9f9f9;" -->
    <div id="main-header" class="main-header">
        <div class="container clearfix">
            <div class="logo">
                <a href="index.php"><img src="assets/images/logo.png" /></a>
            </div>
            <div id='cssmenu'>
                <ul>
					<li><a>MOVEK INTERNATION PVT LTD</a></li>
                    <li><a href='index.php'>Home</a></li>
                    <li class='active'><a href='#'>Find Cars</a>
                        <ul>
                            <li><a href="list.php">All Cars</a></li>
                            <li><a href='#'>Make</a>
                                <ul>
                                
                                <?php
                               while($data = mysqli_fetch_array($query_brand_list))
                               {
                                echo "<li><a href='list.php?brand=". $data['id'] ."'>" .$data['name'] ."</a></li>"; 
                                }
                               ?>
                                </ul>
                            </li>
                            <li><a href='#'>Type</a>
                                <ul>
                                <?php
                               while($data = mysqli_fetch_array($query_type_list))
                               {
                                echo "<li><a href='list.php?type=". $data['id'] ."'>" .$data['name'] ."</a></li>"; 
                                }
                               ?>
                                </ul>
                            </li>
                            <li><a href="mailto:Sidney@used-motorcars.com" target="_blank">Diplomats/Expats</a></li>
                        </ul>
                    </li>
                    <li><a href='process.php'>How to Buy</a></li>
                    <li><a href='faq.php'>FAQ</a></li>
                    <li><a href='about_us.php'>About Us</a></li>
                    <li><a href='contact_us.php'>Contact Us</a></li>
                </ul>
            </div>
        </div>
    </div>
</header>