<?php
session_start();
if(!isset($_SESSION['usn_var_id']) && !isset($_SESSION['usn_username']) && !isset($_SESSION['usn_email']) && !isset($_SESSION['usn_mobile']))
{
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Registration-USN</title>
	<link rel="icon" type="image/gif" href="../../assets/images/ico/animated_favicon1.gif" >

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="../../assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
	<link href="../../assets/css/minified/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="../../assets/css/minified/core.min.css" rel="stylesheet" type="text/css">
	<link href="../../assets/css/minified/components.min.css" rel="stylesheet" type="text/css">
	<link href="../../assets/css/minified/colors.min.css" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script type="text/javascript" src="../../assets/js/plugins/loaders/pace.min.js"></script>
	<script type="text/javascript" src="../../assets/js/core/libraries/jquery.min.js"></script>
	<script type="text/javascript" src="../../assets/js/core/libraries/bootstrap.min.js"></script>
	<script type="text/javascript" src="../../assets/js/plugins/loaders/blockui.min.js"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script type="text/javascript" src="../../assets/js/plugins/forms/styling/uniform.min.js"></script>
    <script type="text/javascript" src="../../assets/js/plugins/forms/selects/bootstrap_select.min.js"></script>
    <script type="text/javascript" src="../../assets/js/plugins/uploaders/fileinput.min.js"></script>

	<script type="text/javascript" src="../../assets/js/core/app.js"></script>
	<script type="text/javascript" src="../../assets/js/pages/login.js"></script>
    <script type="text/javascript" src="../../assets/js/pages/form_bootstrap_select.js"></script>
	<!-- /theme JS files -->

</head>

<body style="padding-top: 40px; padding-bottom: 40px;">

	<!-- Main navbar -->
	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="navbar-header">
			<a class="navbar-brand" href="../../"><img src="../../assets/images/onlinelogomaker-010418-1811-1347.png" alt=""></a>

			<ul class="nav navbar-nav pull-right visible-xs-block">
				<li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
			</ul>
		</div>

		<div class="navbar-collapse collapse" id="navbar-mobile">
			<ul class="nav navbar-nav navbar-right">
				<li>
					<a href="../../../">
						<i class="icon-display4"></i> <span class="visible-xs-inline-block position-right"> Go to website</span>
					</a>
				</li>

				<li>
					<a href="#">
						<i class="icon-user-tie"></i> <span class="visible-xs-inline-block position-right"> Contact admin</span>
					</a>
				</li>
			</ul>
		</div>
	</div>
	<!-- /main navbar -->


	<!-- Page container -->
	<div class="page-container login-container">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main content -->
			<div class="content-wrapper">

				<!-- Content area -->
				<div class="content">

					<!-- Registration form -->
					<form action="verify.php" method="post">
						<div class="row">
							<div class="col-lg-6 col-lg-offset-3">
								<div class="panel registration-form">
									<div class="panel-body">
										<div class="text-center">
                                            <img src="../../assets/images/onlinelogomaker-010418-1811-1347.png" alt="" height="120" width="240">
<!--											<div class="icon-object border-success text-success"><i class="icon-plus3"></i></div>-->
											<h5 class="content-group-lg">Create account (Step - 1) <small class="display-block">All fields are required</small></h5>
										</div>

<!--										<div class="form-group has-feedback">-->
<!--											<input type="text" class="form-control" name="usn_title" placeholder="Choose username" required>-->
<!--											<div class="form-control-feedback">-->
<!--												<i class="icon-user-plus text-muted"></i>-->
<!--											</div>-->
<!--										</div>-->

										<div class="row">
											<div class="col-md-6">
												<div class="form-group has-feedback">
													<input type="text" class="form-control" name="usn_var_id" placeholder="University ID" required>
													<div class="form-control-feedback">
														<i class="icon-user-check text-muted"></i>
													</div>
												</div>
											</div>

											<div class="col-md-6">
												<div class="form-group has-feedback">
													<input type="text" class="form-control" name="usn_username" placeholder="Choose username" required>
													<div class="form-control-feedback">
														<i class="icon-user-plus text-muted"></i>
													</div>
												</div>
											</div>
										</div>

										<div class="row">
											<div class="col-md-6">
												<div class="form-group has-feedback">
													<input type="password" class="form-control" name="usn_password" placeholder="Create password" required>
													<div class="form-control-feedback">
														<i class="icon-user-lock text-muted"></i>
													</div>
												</div>
											</div>

											<div class="col-md-6">
												<div class="form-group has-feedback">
													<input type="password" class="form-control" name="usn_reppassword" placeholder="Repeat password" required>
													<div class="form-control-feedback">
														<i class="icon-user-lock text-muted"></i>
													</div>
												</div>
											</div>
										</div>

										<div class="row">
											<div class="col-md-6">
												<div class="form-group has-feedback">
													<input type="email" class="form-control" name="usn_email" placeholder="Your email" required>
													<div class="form-control-feedback">
														<i class="icon-mention text-muted"></i>
													</div>
												</div>
											</div>

											<div class="col-md-6">
												<div class="form-group has-feedback">
													<input type="text" class="form-control" name="usn_mobile" placeholder="Your mobile" required>
													<div class="form-control-feedback">
														<i class="icon-phone-plus text-muted"></i>
													</div>
												</div>
											</div>
										</div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group has-feedback">
                                                    <select class="bootstrap-select" name="usn_user_status" data-width="100%">
                                                        <option value="" selected>User status</option>
                                                        <option value="Administration">Administration</option>
                                                        <option value="Teacher">Teacher</option>
                                                        <option value="Student">Student</option>
                                                    </select>
                                                    <span class="help-block">*User status</span>
                                                </div>
                                            </div>

<!--                                            <div class="col-md-6">-->
<!--                                                <div class="form-group has-feedback text-right">-->
<!--                                                    -->
<!--                                                </div>-->
<!--                                            </div>-->

                                        </div>

<!--										<div class="form-group">-->
<!--											<div class="checkbox">-->
<!--												<label>-->
<!--													<input type="checkbox" class="styled" checked="checked">-->
<!--													Send me <a href="#">test account settings</a>-->
<!--												</label>-->
<!--											</div>-->
<!---->
<!--											<div class="checkbox">-->
<!--												<label>-->
<!--													<input type="checkbox" class="styled" checked="checked">-->
<!--													Subscribe to monthly newsletter-->
<!--												</label>-->
<!--											</div>-->
<!---->
<!--											<div class="checkbox">-->
<!--												<label>-->
<!--													<input type="checkbox" class="styled">-->
<!--													Accept <a href="#">terms of service</a>-->
<!--												</label>-->
<!--											</div>-->
<!--										</div>-->
                                        <?php
                                        if (isset($_SESSION['message'])) {
                                            ?>
                                            <div class="content-group-sm">
                                                <!-- Basic alert -->
                                                <div class="alert alert-danger alert-styled-left">
                                                    <button type="button" class="close" data-dismiss="alert"><span>&times;</span><span
                                                                class="sr-only">Close</span></button>
                                                    <?php echo $_SESSION['message']; ?>
                                                </div>
                                            </div>
                                            <?php
                                            unset($_SESSION['message']);
                                        }
                                        ?>

										<div class="text-right">
                                            <a href="../../" class="btn btn-default"><!--<button type="submit" class="btn btn-link">--><i class="icon-arrow-left13 position-left"></i> Back to login form</a>
                                            <button type="submit" class="btn bg-teal-400 btn-labeled btn-labeled-right ml-10"><b><i class="icon-plus3"></i></b> Create account</button>
                                            <div class="text"><span>*If you already have validation code go to <a href="validation"><u>Validation page</u></a></span></div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</form>
					<!-- /registration form -->


					<!-- Footer -->
					<div class="footer text-muted">
                        Copyright &copy; 2018. <a href="#">University Social Network</a> by <a href="https://github.com/nazibsazib" target="_blank">Mohammad Nazib -ul- Islam</a>
					</div>
					<!-- /footer -->

				</div>
				<!-- /content area -->

			</div>
			<!-- /main content -->

		</div>
		<!-- /page content -->

	</div>
	<!-- /page container -->

</body>
</html>
<?php
}else{
    header('Location:../../views/user/home');
}
?>