<?php
include("php/dbconnect.php");
include("php/checklogin.php");
$errormsg = '';
$action = "THÊM";

$id = "";
$emailid = '';
$sname = '';
$joindate = '';
$remark = '';
$contact = '';
$balance = 0;
$fees = '';
$about = '';
$branch = '';
$address = '';
$detail = '';


if (isset($_POST['save'])) {

	$sname = mysqli_real_escape_string($conn, $_POST['sname']);
	$joindate = mysqli_real_escape_string($conn, $_POST['joindate']);

	$contact = mysqli_real_escape_string($conn, $_POST['contact']);
	$about = mysqli_real_escape_string($conn, $_POST['about']);
	$emailid = mysqli_real_escape_string($conn, $_POST['emailid']);
	$branch = mysqli_real_escape_string($conn, $_POST['branch']);


	if ($_POST['action'] == "THÊM") {
		$remark = mysqli_real_escape_string($conn, $_POST['remark']);
		$fees = mysqli_real_escape_string($conn, $_POST['fees']);
		$advancefees = mysqli_real_escape_string($conn, $_POST['advancefees']);
		$balance = $fees - $advancefees;

		$q1 = $conn->query("INSERT INTO student (sname,joindate,contact,about,emailid,branch,balance,fees) VALUES ('$sname','$joindate','$contact','$about','$emailid','$branch','$balance','$fees')");

		$sid = $conn->insert_id;

		$conn->query("INSERT INTO  fees_transaction (stdid,paid,submitdate,transcation_remark) VALUES ('$sid','$advancefees','$joindate','$remark')");

		echo '<script type="text/javascript">window.location="student.php?act=1";</script>';
	} else
  if ($_POST['action'] == "update") {
		$id = mysqli_real_escape_string($conn, $_POST['id']);
		$sql = $conn->query("UPDATE  student  SET   sname='$sname', about  = '$about', emailid  = '$emailid',contact='$contact', branch= '$branch'   WHERE  id  = '$id'");
		echo '<script type="text/javascript">window.location="student.php?act=2";</script>';
	}
}




if (isset($_GET['action']) && $_GET['action'] == "delete") {

	$conn->query("UPDATE  student set delete_status = '1'  WHERE id='" . $_GET['id'] . "'");
	header("location: student.php?act=3");
}


$action = "THÊM";
if (isset($_GET['action']) && $_GET['action'] == "edit") {
	$id = isset($_GET['id']) ? mysqli_real_escape_string($conn, $_GET['id']) : '';

	$sqlEdit = $conn->query("SELECT * FROM student WHERE id='" . $id . "'");
	if ($sqlEdit->num_rows) {
		$rowsEdit = $sqlEdit->fetch_assoc();
		extract($rowsEdit);
		$action = "update";
	} else {
		$_GET['action'] = "";
	}
}


if (isset($_REQUEST['act']) && @$_REQUEST['act'] == "1") {
	$errormsg = "<div class='alert alert-success'> <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Chúc mừng!</strong> THÊM HỌC SINH THÀNH CÔNG</div>";
} else if (isset($_REQUEST['act']) && @$_REQUEST['act'] == "2") {
	$errormsg = "<div class='alert alert-success'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <strong>Chúc mừng!</strong> CHỈNH SỬA HỌC SINH THÀNH CÔNG</div>";
} else if (isset($_REQUEST['act']) && @$_REQUEST['act'] == "3") {
	$errormsg = "<div class='alert alert-success'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Chúc mừng!</strong> XÓA HỌC SINH THÀNH CÔNG</div>";
}

?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>HỆ THỐNG QUẢN LÝ ĐÓNG TIỀN HỌC PHỤ ĐẠO</title>

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

	<link href="css/ui.css" rel="stylesheet" />
	<link href="css/datepicker.css" rel="stylesheet" />

	<script src="js/jquery-1.10.2.js"></script>

	<script type='text/javascript' src='js/jquery/jquery-ui-1.10.1.custom.min.js'></script>


</head>
<?php
include("php/header.php");
?>
<div id="page-wrapper">
	<div id="page-inner">
		<div class="row">
			<div class="col-md-12">
				<h1 class="page-head-line">Học sinh
					<?php
					echo (isset($_GET['action']) && @$_GET['action'] == "THÊM" || @$_GET['action'] == "edit") ?
						' <a href="student.php" class="btn btn-primary btn-sm pull-right">Trở về <i class="glyphicon glyphicon-arrow-right"></i></a>' : '<a href="student.php?action=THÊM" class="btn btn-primary btn-sm pull-right"><i class="glyphicon glyphicon-plus"></i> THÊM </a>';
					?>
				</h1>

				<?php

				echo $errormsg;
				?>
			</div>
		</div>



		<?php
		if (isset($_GET['action']) && @$_GET['action'] == "THÊM" || @$_GET['action'] == "edit") {
		?>

			<script type="text/javascript" src="js/validation/jquery.validate.min.js"></script>
			<div class="row">

				<div class="col-sm-10 col-sm-offset-1">
					<div class="panel panel-primary">
						<div class="panel-heading">
							<?php echo ($action == "THÊM") ? "Thêm học sinh" : "Chỉnh sửa thông tin học sinh"; ?>
						</div>
						<form action="student.php" method="post" id="signupForm1" class="form-horizontal">
							<div class="panel-body">
								<fieldset class="scheduler-border">
									<legend class="scheduler-border">Thông tin cá nhân:</legend>
									<div class="form-group">
										<label class="col-sm-2 control-label" for="Old">Tên* </label>
										<div class="col-sm-10">
											<input type="text" class="form-control" id="sname" name="sname" value="<?php echo $sname; ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-2 control-label" for="Old">Liên lạc* </label>
										<div class="col-sm-10">
											<input type="text" class="form-control" id="contact" name="contact" value="<?php echo $contact; ?>" maxlength="10" />
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-2 control-label" for="Old">Khối* </label>
										<div class="col-sm-10">
											<select class="form-control" id="branch" name="branch">
												<option value="">Chọn khối</option>
												<?php
												$sql = "select * from branch where delete_status='0' order by branch.branch asc";
												$q = $conn->query($sql);

												while ($r = $q->fetch_assoc()) {
													echo '<option value="' . $r['id'] . '"  ' . (($branch == $r['id']) ? 'selected="selected"' : '') . '>' . $r['branch'] . '</option>';
												}
												?>

											</select>
										</div>
									</div>


									<div class="form-group">
										<label class="col-sm-2 control-label" for="Old">Ngày* </label>
										<div class="col-sm-10">
											<input type="text" class="form-control" id="joindate" name="joindate" value="<?php echo ($joindate != '') ? date("d-m-y", strtotime($joindate)) : ''; ?>" style="background-color: #fff;" readonly />
										</div>
									</div>
								</fieldset>


								<fieldset class="scheduler-border">
									<legend class="scheduler-border">Thông tin tiền học:</legend>
									<div class="form-group">
										<label class="col-sm-2 control-label" for="Old">Tổng tiền* </label>
										<div class="col-sm-10">
											<input type="text" class="form-control" id="fees" name="fees" value="<?php echo $fees; ?>" <?php echo ($action == "update") ? "disabled" : ""; ?> />
										</div>
									</div>

									<?php
									if ($action == "THÊM") {
									?>
										<div class="form-group">
											<label class="col-sm-2 control-label" for="Old">Số tiền đóng* </label>
											<div class="col-sm-10">
												<input type="text" class="form-control" id="advancefees" name="advancefees" readonly />
											</div>
										</div>
									<?php
									}
									?>

									<div class="form-group">
										<label class="col-sm-2 control-label" for="Old">Số tiền nợ </label>
										<div class="col-sm-10">
											<input type="text" class="form-control" id="balance" name="balance" value="<?php echo $balance; ?>" disabled />
										</div>
									</div>




									<?php
									if ($action == "THÊM") {
									?>
										<div class="form-group">
											<label class="col-sm-2 control-label" for="Password">Ghi chú </label>
											<div class="col-sm-10">
												<textarea class="form-control" id="remark" name="remark"><?php echo $remark; ?></textarea>
											</div>
										</div>
									<?php
									}
									?>

								</fieldset>

								<fieldset class="scheduler-border">
									<legend class="scheduler-border">Thông tin thêm:</legend>
									<div class="form-group">
										<label class="col-sm-2 control-label" for="Password">Về học sinh </label>
										<div class="col-sm-10">
											<textarea class="form-control" id="about" name="about"><?php echo $about; ?></textarea>
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-2 control-label" for="Old">Email </label>
										<div class="col-sm-10">

											<input type="text" class="form-control" id="emailid" name="emailid" value="<?php echo $emailid; ?>" />
										</div>
									</div>
								</fieldset>

								<div class="form-group">
									<div class="col-sm-8 col-sm-offset-2">
										<input type="hidden" name="id" value="<?php echo $id; ?>">
										<input type="hidden" name="action" value="<?php echo $action; ?>">

										<button type="submit" name="save" class="btn btn-primary">Lưu </button>



									</div>
								</div>





							</div>
						</form>

					</div>
				</div>


			</div>




			<script type="text/javascript">
				$(document).ready(function() {
					$("#joindate").datepicker({
						dateFormat: "yy-mm-dd",
						changeMonth: true,
						changeYear: true,
						yearRange: "1970:<?php echo date('Y'); ?>"
					});

					if ($("#signupForm1").length > 0) {
						<?php if ($action == 'THÊM') { ?>
							$("#signupForm1").validate({
								rules: {
									sname: "required",
									joindate: "required",
									emailid: "email",
									branch: "required",
									contact: {
										required: true,
										digits: true
									},
									fees: {
										required: true,
										digits: true
									},
									advancefees: {
										required: true,
										digits: true
									}
								},
								errorElement: "em",
								errorPlacement: function(error, element) {
									error.addClass("help-block");
									element.parents(".col-sm-10").addClass("has-feedback");
									if (element.prop("type") === "checkbox") {
										error.insertAfter(element.parent("label"));
									} else {
										error.insertAfter(element);
									}
									if (!element.next("span")[0]) {
										$("<span class='glyphicon glyphicon-remove form-control-feedback'></span>").insertAfter(element);
									}
								},
								success: function(label, element) {
									if (!$(element).next("span")[0]) {
										$("<span class='glyphicon glyphicon-ok form-control-feedback'></span>").insertAfter($(element));
									}
								},
								highlight: function(element, errorClass, validClass) {
									$(element).parents(".col-sm-10").addClass("has-error").removeClass("has-success");
									$(element).next("span").addClass("glyphicon-remove").removeClass("glyphicon-ok");
								},
								unhighlight: function(element, errorClass, validClass) {
									$(element).parents(".col-sm-10").addClass("has-success").removeClass("has-error");
									$(element).next("span").addClass("glyphicon-ok").removeClass("glyphicon-remove");
								}
							});
						<?php } else { ?>
							$("#signupForm1").validate({
								rules: {
									sname: "required",
									joindate: "required",
									emailid: "email",
									branch: "required",
									contact: {
										required: true,
										digits: true
									}
								},
								// other validation rules for the second case
							});
						<?php } ?>
					}

					$("#fees").keyup(function() {
						$("#advancefees").val("");
						$("#balance").val(0);
						var fee = $.trim($(this).val());
						if (fee != '' && !isNaN(fee)) {
							$("#advancefees").removeAttr("readonly");
							$("#balance").val(fee);
							$('#advancefees').rules("add", {
								max: parseInt(fee)
							});
						} else {
							$("#advancefees").attr("readonly", "readonly");
						}
					});

					$("#advancefees").keyup(function() {
						var advancefees = parseInt($.trim($(this).val()));
						var totalfee = parseInt($("#fees").val());
						if (advancefees != '' && !isNaN(advancefees) && advancefees <= totalfee) {
							var balance = totalfee - advancefees;
							$("#balance").val(balance);
						} else {
							$("#balance").val(totalfee);
						}
					});
				});
			</script>




		<?php
		} else {
		?>

			<link href="css/datatable/datatable.css" rel="stylesheet" />




			<div class="panel panel-default">
				<div class="panel-heading">
					Quản lý học sinh
				</div>
				<div class="panel-body">
					<div class="table-sorting table-responsive">
						<table class="table table-striped table-bordered table-hover" id="tSortable22">
							<thead>
								<tr>
									<th>#</th>
									<th>Tên/Liên hệ</th>
									<th>Ngày</th>
									<th>Tiền</th>
									<th>Số tiền nợ</th>
									<th>Chỉnh sửa</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$sql = "select * from student where delete_status='0'";
								$q = $conn->query($sql);
								$i = 1;
								while ($r = $q->fetch_assoc()) {

									echo '<tr ' . (($r['balance'] > 0) ? 'class="danger"' : '') . '>
                                            <td>' . $i . '</td>
                                            <td>' . $r['sname'] . '<br/>' . $r['contact'] . '</td>
                                            <td>' . date("d M y", strtotime($r['joindate'])) . '</td>
                                            <td>' . $r['fees'] . '</td>
											<td>' . $r['balance'] . '</td>
											<td>
											
											

											<a href="student.php?action=edit&id=' . $r['id'] . '" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-edit"></span></a>
											
											<a onclick="return confirm(\'Are you sure you want to delete this record\');" href="student.php?action=delete&id=' . $r['id'] . '" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span></a> </td>
											
                                        </tr>';
									$i++;
								}
								?>



							</tbody>
						</table>
					</div>
				</div>
			</div>

			<script src="js/dataTable/jquery.dataTables.min.js"></script>

			<script>
				$(document).ready(function() {
					$('#tSortable22').dataTable({
						"bPaginate": true,
						"bLengthChange": true,
						"bFilter": true,
						"bInfo": false,
						"bAutoWidth": true
					});

				});
			</script>

		<?php
		}
		?>



	</div>
	<!-- /. PAGE INNER  -->
</div>
<!-- /. PAGE WRAPPER  -->
</div>
<!-- /. WRAPPER  -->

<div id="footer-sec">
	HỆ THỐNG QUẢN LÝ ĐÓNG TIỀN HỌC PHỤ ĐẠO
</div>


<!-- BOOTSTRAP SCRIPTS -->
<script src="js/bootstrap.js"></script>
<!-- METISMENU SCRIPTS -->
<script src="js/jquery.metisMenu.js"></script>
<!-- CUSTOM SCRIPTS -->
<script src="js/custom1.js"></script>


</body>

</html>