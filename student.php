<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 2 | General Form Elements</title>
    <?php include('./includes/conn.php');?>
    <?php 
if (empty($_SESSION['email'])) {
    header('Location:./index.php');
}
?>
<?php 
    if (isset($_POST['submit'])) {
       $s_name= mysqli_real_escape_string($conn,$_POST['sname']);
       $s_uni= mysqli_real_escape_string($conn,$_POST['suni']);
       $s_sem= mysqli_real_escape_string($conn,$_POST['ssem']);
       $s_area= mysqli_real_escape_string($conn,$_POST['sarea']);
       $s_station= mysqli_real_escape_string($conn,$_POST['sstation']);
       $s_refrence= mysqli_real_escape_string($conn,$_POST['srefrence']);
       $s_course= mysqli_real_escape_string($conn,$_POST['scourse']);
       $s_fee= mysqli_real_escape_string($conn,$_POST['sfee']);
       $s_discount= mysqli_real_escape_string($conn,$_POST['sdiscount']);
       $s_gen= mysqli_real_escape_string($conn,$_POST['gen']);
       $s_contact= mysqli_real_escape_string($conn,$_POST['scon1']);
       $s_contact2= mysqli_real_escape_string($conn,$_POST['scon2']);

       $student_sql = "INSERT INTO `student`( `student_name`, `student_uni`, `student_sem`, `student_area`, `student_station`, `student_reference`, `student_course`, `student_fee`, `student_discount`, `student_gender`, `student_con1`, `student_con2`) VALUES ('$s_name','$s_uni','$s_sem','$s_area','$s_station','$s_refrence','$s_course','$s_fee','$s_discount','$s_gen','$s_contact','$s_contact2')";
       
       $sql="SELECT `student_name` FROM student WHERE `student_name`='$s_name'";
       $fire= mysqli_query($conn,$sql);
       if (mysqli_num_rows($fire)>0) {
        ?>
        <script>alert('username already use');</script>
        <?php
       }else{
       $student_run = mysqli_query($conn,$student_sql);
       if ($student_run) {
           echo "insterted";
       }else {
           echo $conn->error;
       }
    }
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

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    General Form Elements
                    <small>Preview</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a href="#">Forms</a></li>
                    <li class="active">General Elements</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title">Quick Example</h3>
                            </div>
                            <!-- /.box-header -->
                            <!-- form start -->
                            <form method="post">
                                <div class="form-row">
                                    <div class="form-group col-md-6 col-lg-4">
                                        <label for="inputEmail4">Name</label>
                                        <input type="text" name="sname" class="form-control" id="inputEmail4">
                                    </div>
                                    <div class="form-group col-md-6 col-lg-4">
                                        <label for="inputPassword4">University</label>
                                        <input type="text" name="suni" class="form-control" id="inputPassword4">
                                    </div>
                                    <div class="form-group col-md-6 col-lg-4">
                                        <label for="inputPassword4">Semester</label>
                                        <input type="text" name="ssem" class="form-control" id="inputPassword4">
                                    </div>
                                    <div class="form-group col-md-6 col-lg-4">
                                        <label for="inputEmail4">Area</label>
                                        <input type="text" name="sarea" class="form-control" id="inputEmail4">
                                    </div>
                                    <div class="form-group col-md-6 col-lg-4">
                                        <label for="inputPassword4">Station</label>
                                        <input type="text" name="sstation" class="form-control" id="inputPassword4">
                                    </div>
                                    <div class="form-group col-md-6 col-lg-4">
                                        <label for="inputPassword4">Refrence</label>
                                        <input type="text" name="srefrence" class="form-control" id="inputPassword4">
                                    </div>
                                    <div class="form-group col-md-6 col-lg-4">
                                        <label for="inputEmail4">Course Applied</label>
                                        <input type="text" name="scourse" class="form-control" id="inputEmail4">
                                    </div>
                                    <div class="form-group col-md-6 col-lg-4">
                                        <label for="inputPassword4">Fee</label>
                                        <input type="text" name="sfee" class="form-control" id="inputPassword4">
                                    </div>
                                    <div class="form-group col-md-6 col-lg-4">
                                        <label for="inputPassword4">Discount</label>
                                        <input type="text" name="sdiscount" class="form-control" id="inputPassword4">
                                    </div>
                                    <div class="form-group col-md-6 col-lg-4">
                                        <label for="inputPassword4">Gender</label>
                                        <select class="form-control" name="gen" id="">
                                            <option value="">Select Gender</option>
                                            <option value="male">male</option>
                                            <option value="female">female</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6 col-lg-4">
                                        <label for="inputEmail4">Contact1</label>
                                        <input type="number" name="scon1" class="form-control" id="inputEmail4">
                                    </div>
                                    <div class="form-group col-md-6 col-lg-4">
                                        <label for="inputPassword4">Contact2</label>
                                        <input type="number" name="scon2" class="form-control" id="inputPassword4">
                                    </div>

                                </div>
                                <div class="box-footer">
                                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.box -->


                    </div>
                    <!--/.col (left) -->
                    <!-- right column -->

                    <!--/.col (right) -->
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

    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>

</body>

</html>