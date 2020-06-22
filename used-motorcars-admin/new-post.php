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


$sql_transmission = "SELECT * FROM transmissiontype";
$transmission_query = mysqli_query($connection, $sql_transmission);

$sql_brand = "SELECT * FROM vehicle_brand";
$brand_query = mysqli_query($connection, $sql_brand);

$sql_type = "SELECT * FROM vehicle_type";
$type_query = mysqli_query($connection, $sql_type);

$sql_fuel = "SELECT * FROM fueltype";
$fuel_query = mysqli_query($connection, $sql_fuel);

$sql_features = "SELECT * FROM features";
$features_query = mysqli_query($connection, $sql_features);

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
                        <li class="active">New</li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="white-box">
                        <h3 class="box-title m-b-0">Create a New Vehicle Post</h3>
                        <div id="exampleValidator" class="wizard">
                            <ul class="wizard-steps" role="tablist">
                                <li class="active" role="tab">
                                    <h4><span><i class="ti-lock"></i></span>General</h4>
                                </li>
                                <li role="tab">
                                    <h4><span><i class="ti-marker-alt"></i></span>Features</h4>
                                </li>
                                <li role="tab">
                                    <h4><span><i class="ti-marker-alt"></i></span>Extra Features</h4>
                                </li>
                                <li role="tab">
                                    <h4><span><i class="ti-image"></i></span>Images</h4>
                                </li>
                                <li role="tab">
                                    <h4><span><i class="ti-bell"></i></span>Contact Information</h4>
                                </li>
                            </ul>
                            <form id="validation" class="form-horizontal" action="functions/new_post.php" method="post" enctype="multipart/form-data">
                                <div class="wizard-content">
                                 <!-- General -->
                                    <div class="wizard-pane active" role="tabpanel">
                                        <div class="form-group">
                                            <label class="col-xs-3 control-label">Reference Number</label>
                                            <div class="col-xs-5">
                                                <input type="text" class="form-control" name="ref_no" required="true" /> </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-xs-3 control-label">Post Title</label>
                                            <div class="col-xs-5">
                                                <input type="text" class="form-control" name="title" required="true" /> </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-xs-3 control-label">Amount</label>
                                            <div class="col-xs-5">
                                                <input type="text" class="form-control" name="amount" required/> </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-xs-3 control-label">Short Description</label>
                                            <div class="col-xs-5">
                                                <textarea type="text" class="form-control" name="description" required></textarea> </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-xs-3 control-label">Description</label>
                                            <div class="col-xs-5">
                                                <textarea type="text" class="form-control" name="moreDescription"></textarea> </div>
                                        </div>
                                    </div>
                                    <!-- General -->
                                    <!-- Features -->
                                    <div class="wizard-pane" role="tabpanel">
                                        <div class="form-group">
                                            <label class="col-xs-3 control-label">Chassis</label>
                                            <div class="col-xs-5">
                                                <input type="text" class="form-control" name="chassis" /> </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-xs-3 control-label">Distance</label>
                                            <div class="col-xs-5">
                                                <input type="text" class="form-control" name="distance" /> </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-xs-3 control-label">Transmission Type</label>
                                            <div class="col-xs-5">
                                                <?php 
                                                    echo "<select name='transmissionId' class='form-control' required>";
                                                    while ($row = mysqli_fetch_array($transmission_query)) {
                                                        echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
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
                                                    while ($row = mysqli_fetch_array($brand_query)) {
                                                        echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
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
                                                    while ($row = mysqli_fetch_array($type_query)) {
                                                        echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
                                                    }
                                                    echo "</select>";
                                                ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-xs-3 control-label">Door Count</label>
                                            <div class="col-xs-5">
                                                <input type="text" class="form-control" name="doors" /> </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-xs-3 control-label">Vehicle Model</label>
                                            <div class="col-xs-5">
                                                <input type="text" class="form-control" name="model" required/> </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-xs-3 control-label">Engine Size</label>
                                            <div class="col-xs-5">
                                                <input type="text" class="form-control" name="engineSize" /> </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-xs-3 control-label">Steering</label>
                                            <div class="col-xs-5">
                                                <input type="text" class="form-control" name="steering" /> </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-xs-3 control-label">Seat Count</label>
                                            <div class="col-xs-5">
                                                <input type="text" class="form-control" name="seats" /> </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-xs-3 control-label">Vehicle Year</label>
                                            <div class="col-xs-5">
                                                <input type="text" class="form-control" name="year" /> </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-xs-3 control-label">Fuel Type</label>
                                            <div class="col-xs-5">
                                                <?php 
                                                    echo "<select name='fuelId' class='form-control' required>";
                                                    while ($row = mysqli_fetch_array($fuel_query)) {
                                                        echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
                                                    }
                                                    echo "</select>";
                                                ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-xs-3 control-label">Vehicle Color</label>
                                            <div class="col-xs-5">
                                                <input type="text" class="form-control" name="color" /> </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-xs-3 control-label">Speed</label>
                                            <div class="col-xs-5">
                                                <input type="text" class="form-control" name="speed" /> </div>
                                        </div>
                                    </div>
                                    <!-- Features -->
                                    <!-- Extra Features -->
                                    <div class="wizard-pane" role="tabpanel">
                                    <div class="form-group">
                                            <label class="col-xs-3 control-label">Extra Features</label>
                                            <div class="col-xs-5">
                                                <?php 
                                                    while ($row_feature = mysqli_fetch_array($features_query)) {
                                                        echo "<input type='checkbox' name='check_list[]' value='". $row_feature['code'] ."'> <span> ". $row_feature['name'] ." </span> <br/>";
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Extra Features -->
                                    <!-- Images -->
                                    <div class="wizard-pane" role="tabpanel">
                                        <div class="form-group">
                                            <label class="col-xs-3 control-label">Select Photo (one or multiple)</label>
                                            <div class="col-xs-5">
                                                <input type="file" name="files[]" multiple required/>
                                            </div>
                                        </div>
                                        <p>Note: Supported image format: .jpeg, .jpg, .png, .gif</p>
                                        <p style="color:red;">Best to insert more than 5 images</p>
                                    </div>
                                    <!-- Images -->
                                    <!-- Contact information -->
                                    <div class="wizard-pane" role="tabpanel">
                                        <div class="form-group">
                                            <label class="col-xs-3 control-label">Telephone Number</label>
                                            <div class="col-xs-5">
                                                <input type="text" class="form-control" name="contactMobile" required /> </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-xs-3 control-label">Email</label>
                                            <div class="col-xs-5">
                                                <input type="email" class="form-control" name="contactEmail" required /> </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-xs-3 control-label">Contact Information</label>
                                            <div class="col-xs-5">
                                                <textarea class="form-control" name="contactInfo" required> </textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Contact information -->
                                </div>
                                <input type="submit" name="submit" value="Submit" class="btn btn-outline">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include 'includes/footer-text.php'; ?>
    </div>
</div>
<?php include 'includes/footer.php'; ?>
<script type="text/javascript">
    (function() {
        $('#exampleBasic').wizard({
            onFinish: function() {
                alert('finish');
            }
        });
        $('#exampleBasic2').wizard({
            onFinish: function() {
                alert('finish');
            }
        });
        $('#exampleValidator').wizard({
            onInit: function() {
                $('#validation').formValidation({
                    framework: 'bootstrap',
                    fields: {
                        username: {
                            validators: {
                                notEmpty: {
                                    message: 'The username is required'
                                },
                                stringLength: {
                                    min: 6,
                                    max: 30,
                                    message: 'The username must be more than 6 and less than 30 characters long'
                                },
                                regexp: {
                                    regexp: /^[a-zA-Z0-9_\.]+$/,
                                    message: 'The username can only consist of alphabetical, number, dot and underscore'
                                }
                            }
                        },
                        email: {
                            validators: {
                                notEmpty: {
                                    message: 'The email address is required'
                                },
                                emailAddress: {
                                    message: 'The input is not a valid email address'
                                }
                            }
                        },
                        password: {
                            validators: {
                                notEmpty: {
                                    message: 'The password is required'
                                },
                                different: {
                                    field: 'username',
                                    message: 'The password cannot be the same as username'
                                }
                            }
                        }
                    }
                });
            },
            validator: function() {
                var fv = $('#validation').data('formValidation');
                var $this = $(this);
                // Validate the container
                fv.validateContainer($this);
                var isValidStep = fv.isValidContainer($this);
                if (isValidStep === false || isValidStep === null) {
                    return false;
                }
                return true;
            },
            onFinish: function() {
                $.post("keep.php", $("#validation").serialize()).done(function() {
                    alert("hiiii");
                });
            }
        });
        $('#accordion').wizard({
            step: '[data-toggle="collapse"]',
            buttonsAppendTo: '.panel-collapse',
            templates: {
                buttons: function() {
                    var options = this.options;
                    return '<div class="panel-footer"><ul class="pager">' + '<li class="previous">' + '<a href="#' + this.id + '" data-wizard="back" role="button">' + options.buttonLabels.back + '</a>' + '</li>' + '<li class="next">' + '<a href="#' + this.id + '" data-wizard="next" role="button">' + options.buttonLabels.next + '</a>' + '<a href="#' + this.id + '" data-wizard="finish" role="button">' + options.buttonLabels.finish + '</a>' + '</li>' + '</ul></div>';
                }
            },
            onBeforeShow: function(step) {
                step.$pane.collapse('show');
            },
            onBeforeHide: function(step) {
                step.$pane.collapse('hide');
            },
            onFinish: function() {
                alert('finish');
            }
        });
    })();
</script>