
<?php
include("php/dbconnect.php");
include("php/checklogin.php");


?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Hệ thống quản lý đóng tiền học</title>

    <!-- BOOTSTRAP STYLES-->
    <link href="css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="css/font-awesome.css" rel="stylesheet" />
       <!--CUSTOM BASIC STYLES-->
    <link href="css/basic.css" rel="stylesheet" />
    <!--CUSTOM MAIN STYLES-->
    <link href="css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />


</head>
<?php
include("php/header.php");
?>
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">TRANG CHỦ</h1>
                        <h2 style="text-align:center;"> <strong>HỆ THỐNG QUẢN LÝ ĐÓNG TIỀN HỌC PHỤ ĐẠO</strong> </h2>

                    </div>
                </div>
                <!-- /. ROW  -->
                <div class="row">
				
				  <div class="col-md-4">
                        <div class="main-box mb-pink">
                            <a href="student.php">
                                <i class="fa fa-solid fa-user fa-5x"></i>
                                <h5>Học sinh</h5>
                            </a>
                        </div>
                    </div>
				
				
                   
					
                    <div class="col-md-4">
                        <div class="main-box mb-dull">
                            <a href="fees.php">
                                <i class="fa fa-solid fa-usd fa-5x"></i>
                                <h5>Cập nhật tiền học</h5>
                            </a>
                        </div>
                    </div>
					
					
					 <div class="col-md-4">
                        <div class="main-box mb-red">
                            <a href="report.php">
                                <i class="fa fa-solid fa-book fa-5x"></i>
                                <h5>Thống kê</h5>
                            </a>
                        </div>
                    </div>
                  

                </div>
                <!-- /. ROW  -->

            
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->

    <div id="footer-sec">
     ---------- HỆ THỐNG QUẢN LÝ ĐÓNG TIỀN HỌC PHỤ ĐẠO ----------<br>
       ĐỒ ÁN CUỐI KỲ MÔN PHÁT TRIỂN ỨNG DỤNG WEB <br>
       Lê Anh Kha - Nguyễn Chí Khang - Trần Ngọc Phương Linh - Nguyễn Huỳnh Trọng Phúc 
    </div>
   
   <script src="js/jquery-1.10.2.js"></script>	
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="js/bootstrap.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="js/jquery.metisMenu.js"></script>
       <!-- CUSTOM SCRIPTS -->
    <script src="js/custom1.js"></script>
    


</body>
</html>