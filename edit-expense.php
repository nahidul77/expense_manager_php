<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if (isset($_GET['edit_id'])) {
    $rowid = intval($_GET['edit_id']);
    $result = mysqli_query($con, "select * from tblexpense where ID='$rowid'");
    $data = mysqli_fetch_array($result, MYSQLI_ASSOC);
    // print_r($rowid);
} else {
    die("EDIT ID MISSING");
}

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $dateexpense = $_POST['dateexpense'];
    $item = $_POST['item'];
    $costitem = $_POST['costitem'];

    $query = mysqli_query($con, "UPDATE tblexpense SET ExpenseDate = '$dateexpense', ExpenseItem = '$item', ExpenseCost = '$costitem' where ID='$id'");
    
    if ($query) {
        echo "<script>alert('Expense Update Successfully');</script>";
        echo "<script>window.location.href='manage-expense.php'</script>";
    } else {
        echo "<script>alert('Something went wrong. Please try again');</script>";
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Update Expense</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/datepicker3.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">

    <!--Custom Font-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

</head>

<body>
    <?php include_once('includes/sidebar.php'); ?>

    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="#">
                        <em class="fa fa-home"></em>
                    </a></li>
                <li class="active">Expense</li>
            </ol>
        </div>
        <!--/.row-->




        <div class="row">
            <div class="col-lg-12">



                <div class="panel panel-default">
                    <div class="panel-heading">Update Expense</div>
                    <div class="panel-body">
                        <div class="col-md-12">

                            <form role="form" method="post" action="">
                                <input type="hidden" name="id" value="<?= $_GET['edit_id'] ?>">
                                <div class="form-group">
                                    <label>Date of Expense</label>
                                    <input class="form-control" type="date" value="<?= $data['ExpenseDate'] ?>" name="dateexpense" required="true">
                                </div>
                                <div class="form-group">
                                    <label>Item</label>
                                    <input type="text" class="form-control" name="item" value="<?= $data['ExpenseItem'] ?>" required="true">
                                </div>

                                <div class="form-group">
                                    <label>Cost</label>
                                    <input class="form-control" type="text" value="<?= $data['ExpenseCost'] ?>" required="true" name="costitem">
                                </div>

                                <div class="form-group has-success">
                                    <button type="submit" class="btn btn-primary" name="submit">Update</button>
                                </div>


                        </div>

                        </form>
                    </div>
                </div>
            </div><!-- /.panel-->
        </div><!-- /.col-->
        <?php include_once('includes/footer.php'); ?>
    </div><!-- /.row -->
    </div>
    <!--/.main-->

    <script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/chart.min.js"></script>
    <script src="js/chart-data.js"></script>
    <script src="js/easypiechart.js"></script>
    <script src="js/easypiechart-data.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>
    <script src="js/custom.js"></script>

</body>

</html>