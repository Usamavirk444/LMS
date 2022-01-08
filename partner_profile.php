<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Partner</title>
    <!-- Tell the browser to be responsive to screen width -->
    <?php include('./includes/conn.php');?>
    <?php 
if (empty($_SESSION['email'])) {
    header('Location:./index.php');
}
?>



    <!-- Google Font -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <?php include('includes/header.php');?>

        <!-- Left side column. contains the logo and sidebar -->
        <?php include('includes/sidebar.php');?>
        <?php 
    if (isset($_POST['submit'])) {
        $P_name=mysqli_real_escape_string($conn,$_POST['pname']);
        $P_email=mysqli_real_escape_string($conn,$_POST['pemail']);
        $P_num=mysqli_real_escape_string($conn,$_POST['pnum']);
        $P_gen=mysqli_real_escape_string($conn,$_POST['pgen']);
        $P_type=mysqli_real_escape_string($conn,$_POST['ptype']);
        $P_per=mysqli_real_escape_string($conn,$_POST['per']);
        $P_fix=mysqli_real_escape_string($conn,$_POST['pfix']);
        $P_image=$_FILES['pimage']['name'];
        $P_add=mysqli_real_escape_string($conn,$_POST['padd']);

        $partner_sql="INSERT INTO `partner`(`partner_name`, `partner_email`, `partner_number`, `partner_gender`, `partner_method`, `partner_per`, `partner_fix`,`partner_image`, `partner_address`) VALUES ('$P_name','$P_email','$P_num','$P_gen','$P_type','$P_per','$P_fix','$P_image','$P_add')";
        move_uploaded_file($_FILES['pimage']['tmp_name'],"./img/".$P_image);
        $partner_run= mysqli_query($conn,$partner_sql);


        
    }

?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    All Course
                    <small>Course</small>
                </h1>
            
            </section>

            <!-- Main content -->
            
            <section class="content">
              <div class="row">

              <div class="col-lg-4 bg-danger">
                  <img src="" alt="">
                  <h1>Name</h1>
                </div>
              <div class="col-lg-8 bg-primary">

              </div>
              </div>
                <!-- /.row -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <b>Version</b> 2.4.0
            </div>
            <strong>Copyright &copy; 2014-2018 <a href="https://templatespoint.net">TemplatesPoint</a>.</strong> All
            rights
            reserved.
        </footer>

        <!-- Control Sidebar -->
        <?php include('includes/sidebar.php');?>

        <!-- /.control-sidebar -->
        <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
        <div class="control-sidebar-bg"></div>
    </div>
    <!-- ./wrapper -->

    <!-- jQuery 3 -->
    <script src="bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- DataTables -->
    <script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>


    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>

    <!-- page script -->
    <script>
    $(function() {
        $('#example1').DataTable()
        $('#example2').DataTable({
            'paging': true,
            'lengthChange': false,
            'searching': false,
            'ordering': true,
            'info': true,
            'autoWidth': false
        })
    })
    </script>



</body>

</html>