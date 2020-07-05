<?php

ob_start();
require_once "functions/db.php";

// Initialize the session
session_start();
$email = $_SESSION['email'];

$sql = "SELECT * FROM fuelType";
$query = mysqli_query($connection, $sql);
?>

<?php include 'includes/header.php' ?>
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
                        <li class="active">Fuel</li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <?php
                if (isset($_GET['inserted'])) {
                    echo '<div class="alert alert-success" >
                                               <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                               <strong>DONE!! </strong><p> Vehicle Fuel Type has been successfully inserted.</p>
                                               </div>';
                } elseif (isset($_GET["deleted"])) {
                    echo
                        '<div class="alert alert-warning" >
                                              <a href="#" class="close" data-dismiss="alert" aria-label="close"></a>
                                             <strong>DELETED!! </strong><p> Vehicle Fuel Type has been successfully deleted.</p>
                                        </div>';
                }
                ?>
                <div class="col-sm-12">
                    <div class="white-box">
                        <a href="fuel_type_insert.php" class="btn btn-info waves-effect waves-light pull-right">Insert Fuel Type</a>
                        <h3 class="box-title m-b-0">Fuel Types</h3>
                        <p class="text-muted m-b-30">Export data to Copy, CSV, Excel, PDF & Print</p>
                        <div class="table-responsive">
                            <table id="example23" class="display nowrap" cellspacing="0" width="100%">

                                <?php

                                if (mysqli_num_rows($query) == 0) {
                                    echo "<i style='color:brown;'>No Vehicle Fuel Type Yet </i> ";
                                } else {

                                    echo '
                                                    <thead>
                                                    <tr>
                                                        <th>code</th>
                                                        <th>name</th>
                                                        <th>action</th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th>code</th>
                                                        <th>name</th>
                                                        <th>action</th>
                                                    </tr>
                                                </tfoot>
                                                <tbody>
                                                    ';
                                }

                                while ($row = mysqli_fetch_array($query)) {


                                    echo '
                                    

                                        <tr>
                                            <td>' . $row["code"] . '</td>
                                            <td>' . $row["name"] . '</td>
                                            <td> 
                                                    <a href="#" class="btn btn-danger btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light" data-toggle="modal" data-target="#responsive-modal' . $row["id"] . '">Delete</a>
                                            </td>
                                        </tr>

                                        <!-- /.modal -->
                                        <div id="responsive-modal' . $row["id"] . '" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                        <h4 class="modal-title">Are you sure you want to delete this vehicle brand?</h4></div>
                                                    <div class="modal-footer">
                                                    <form action="functions/fuel_type.php" method="post">
                                                    <input type="hidden" name="id" value="' . $row["id"] . '"/>
                                                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                                        <button type="submit" name="delete" class="btn btn-danger waves-effect waves-light">Delete</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> 
                                        <!-- End Modal -->
                                        
                                    ';
                                }

                                ?>
                                </tbody>
                            </table>
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
        $('#myTable').DataTable();
        $(document).ready(function() {
            var table = $('#example').DataTable({
                "columnDefs": [{
                    "visible": false,
                    "targets": 2
                }],
                "order": [
                    [2, 'asc']
                ],
                "displayLength": 25,
                "drawCallback": function(settings) {
                    var api = this.api();
                    var rows = api.rows({
                        page: 'current'
                    }).nodes();
                    var last = null;
                    api.column(2, {
                        page: 'current'
                    }).data().each(function(group, i) {
                        if (last !== group) {
                            $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
                            last = group;
                        }
                    });
                }
            });
            // Order by the grouping
            $('#example tbody').on('click', 'tr.group', function() {
                var currentOrder = table.order()[0];
                if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                    table.order([2, 'desc']).draw();
                } else {
                    table.order([2, 'asc']).draw();
                }
            });
        });
    });
    $('#example23').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
</script>