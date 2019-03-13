<?php
session_start();
if(!isset($_SESSION['usn_var_id']) && !isset($_SESSION['usn_username']) && !isset($_SESSION['usn_email']) && !isset($_SESSION['usn_mobile']))
{
if (!empty($_SESSION['var_id']) && !empty($_SESSION['username'])){

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Final Registration-USN</title>
	<link rel="icon" type="image/gif" href="../../../assets/images/ico/animated_favicon1.gif" >

    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link href="../../../assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
    <link href="../../../assets/css/minified/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="../../../assets/css/minified/core.min.css" rel="stylesheet" type="text/css">
    <link href="../../../assets/css/minified/components.min.css" rel="stylesheet" type="text/css">
    <link href="../../../assets/css/minified/colors.min.css" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->

    <!-- Core JS files -->
    <script type="text/javascript" src="../../../assets/js/plugins/loaders/pace.min.js"></script>
    <script type="text/javascript" src="../../../assets/js/core/libraries/jquery.min.js"></script>
    <script type="text/javascript" src="../../../assets/js/core/libraries/bootstrap.min.js"></script>
    <script type="text/javascript" src="../../../assets/js/plugins/loaders/blockui.min.js"></script>
    <!-- /core JS files -->

    <!-- Theme JS files -->
    <script type="text/javascript" src="../../../assets/js/plugins/forms/styling/uniform.min.js"></script>
    <script type="text/javascript" src="../../../assets/js/plugins/forms/selects/bootstrap_select.min.js"></script>
    <script type="text/javascript" src="../../../assets/js/plugins/uploaders/fileinput.min.js"></script>

    <script type="text/javascript" src="../../../assets/js/core/app.js"></script>
    <script type="text/javascript" src="../../../assets/js/pages/login.js"></script>
    <script type="text/javascript" src="../../../assets/js/pages/form_bootstrap_select.js"></script>
    <script type="text/javascript" src="../../../assets/js/pages/uploader_bootstrap.js"></script>
    <!-- /theme JS files -->

    <!-- Image CSS files -->
    <link href="dist/css/bootstrap-imageupload.css" rel="stylesheet">
    <!-- /image CSS files -->

</head>

<body style="padding-top: 100px; padding-bottom: 100px;">

<!-- Main navbar -->
<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-header">
        <a class="navbar-brand" href="../../../"><img src="../../../assets/images/onlinelogomaker-010418-1811-1347.png" alt=""></a>

        <ul class="nav navbar-nav pull-right visible-xs-block">
            <li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
        </ul>
    </div>

    <div class="navbar-collapse collapse" id="navbar-mobile">
        <ul class="nav navbar-nav navbar-right">
            <li>
                <a href="../../../../">
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
                <form action="create.php" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-lg-6 col-lg-offset-3">
                            <div class="panel registration-form">
                                <div class="panel-body">
                                    <div class="text-center">
                                        <img src="../../../assets/images/onlinelogomaker-010418-1811-1347.png" alt="" height="120" width="240">
                                        <!--											<div class="icon-object border-success text-success"><i class="icon-plus3"></i></div>-->
                                        <h5 class="content-group-lg">Final Registration <small class="display-block">Fill all required fields</small></h5>
                                    </div>


                                    <div class="row">


                                        <div class="col-md-6">
                                            <label>Upload profile image</label>
                                            <input type="file" class="file-input" name="usn_user_pic" accept=".jpeg, .jpg, .png, .gif" data-show-caption="false" data-show-upload="false" data-browse-class="btn btn-primary btn-lg btn-icon" data-remove-class="btn btn-danger btn-lg btn-icon">
                                            <span class="help-block">Accepted formats: gif, png, jpg. Max file size 2Mb</span>
                                        </div>


                                        <input type="text" name="usn_var_id" value="<?php echo $_SESSION['var_id'] ?>" hidden>
                                        <input type="text" name="usn_username" value="<?php echo $_SESSION['username'] ?>" hidden>
                                    </div>

                                        <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group has-feedback">
                                                <input type="text" class="form-control" name="usn_fname" placeholder="First name" required>
                                                <div class="form-control-feedback">
                                                    <i class="icon-user-check text-muted"></i>
                                                </div>
                                                <span class="help-block">*First name</span>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group has-feedback">
                                                <input type="text" class="form-control" name="usn_lname" placeholder="Last name">
                                                <div class="form-control-feedback">
                                                    <i class="icon-user-check text-muted"></i>
                                                </div>
                                                <span class="help-block">*Last name</span>
                                            </div>
                                        </div>
                                    </div>


                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group has-feedback">
                                                    <input type="text" class="form-control" name="usn_father_name" placeholder="Father name">
                                                    <div class="form-control-feedback">
                                                        <i class="icon-user-check text-muted"></i>
                                                    </div>
                                                    <span class="help-block">*Father name</span>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group has-feedback">
                                                    <input type="text" class="form-control" name="usn_mother_name" placeholder="Mother name">
                                                    <div class="form-control-feedback">
                                                        <i class="icon-user-check text-muted"></i>
                                                    </div>
                                                    <span class="help-block">*Mother name</span>
                                                </div>
                                            </div>
                                        </div>




                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <select class="bootstrap-select" name="usn_sex" data-width="100%">
                                                    <option value="" selected>Sex</option>
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                </select>
                                                <span class="help-block">*Sex</span>
                                            </div>
                                        </div>


                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <select class="bootstrap-select" name="usn_marital_status" data-width="100%">
                                                        <option value="" selected>Marital status</option>
                                                        <option value="Unmarried">Unmarried</option>
                                                        <option value="Married">Married</option>
                                                        <option value="Widowed">Widowed</option>
                                                        <option value="Divorced">Divorced</option>
                                                    </select>
                                                    <span class="help-block">*Marital status</span>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="row">

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <select class="bootstrap-select" name="usn_department" data-width="100%">
                                                        <option value="" selected>Department</option>
                                                        <option value="Bachelor of Computer Science and Engineering">Bachelor of Computer Science and Engineering</option>
                                                        <option value="Bachelor of Electrical and Electronics Engineering">Bachelor of Electrical and Electronics Engineering</option>
                                                        <option value="Bachelor of Science in Textile Engineering">Bachelor of Science in Textile Engineering</option>
                                                        <option value="Bachelor of Business Administration">Bachelor of Business Administration </option>
                                                        <option value="Master of Business Administration">Master of Business Administration</option>
                                                        <option value="Master of Business Administration (For Executive)">Master of Business Administration (For Executive)</option>
                                                        <option value="BSS(Hons.) in Socail Welfare Policy and Social Work Practice">BSS(Hons.) in Socail Welfare Policy and Social Work Practice</option>
                                                        <option value="Bachelor of Law (Hons)">Bachelor of Law (Hons)</option>
                                                        <option value="Bachelor of Law (Pass)">Bachelor of Law (Pass)</option>
                                                        <option value="Bachelor of Arts in English (Hons.)">Bachelor of Arts in English (Hons.)</option>
                                                        <option value="Master of Arts in English">Master of Arts in English </option>
                                                    </select>
                                                    <span class="help-block">*Department</span>
                                                </div>
                                            </div>


                                    <div class="col-md-6">
                                        <div class="form-group has-feedback">
                                            <input class="form-control" type="date" name="usn_birth_date" placeholder="Birth Date">
                                            <span class="help-block">*Birth Date</span>
                                        </div>
                                    </div>
                                    </div>

                                        <div class="row">

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <select class="bootstrap-select" name="usn_blood_type" data-width="100%">
                                                        <option value="" selected>Blood group</option>
                                                        <option value="A(+Ve)">A(+Ve)</option>
                                                        <option value="A(-Ve)">A(-Ve)</option>
                                                        <option value="B(+Ve)">B(+Ve)</option>
                                                        <option value="B(-Ve)">B(-Ve)</option>
                                                        <option value="O(+Ve)">O(+Ve)</option>
                                                        <option value="O(-Ve)">O(-Ve)</option>
                                                        <option value="AB(+Ve)">AB(+Ve)</option>
                                                        <option value="AB(-Ve)">AB(-Ve)</option>
                                                    </select>
                                                    <span class="help-block">*Blood group</span>
                                            </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group has-feedback">
                                                    <input type="text" class="form-control" name="usn_skills" placeholder="Skills">
                                                    <div class="form-control-feedback">
                                                        <i class="icon-user-tie text-muted"></i>
                                                    </div>
                                                    <span class="help-block">*Skills</span>
                                                </div>
                                            </div>

                                        </div>


                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                <label>Profile visibility</label>

                                                <div class="radio">
                                                    <input type="radio" name="usn_visibility"
                                                           class="styled" checked="checked" value="true_all">
                                                    <label>
                                                        Visible to everyone
                                                    </label>
                                                </div>

                                                <div class="radio">
                                                    <input type="radio" name="usn_visibility"
                                                           class="styled" value="true_con">
                                                    <label>
                                                        Visible to my connections only
                                                    </label>
                                                </div>

                                                <div class="radio">
                                                    <input type="radio" name="usn_visibility"
                                                           class="styled" value="false">
                                                    <label>
                                                        Visible to me only
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


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
                                        <a href="../../../" ><button type="submit" class="btn btn-link"><i class="icon-arrow-left13 position-left"></i> Skip</button></a>
                                        <button type="submit" class="btn bg-teal-400 btn-labeled btn-labeled-right ml-10"><b><i class="icon-plus3"></i></b> Add Info</button>
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

<!-- Image JS files -->
<script src="dist/js/bootstrap-imageupload.js"></script>
<!-- /image JS files -->

<!-- Image viewing script-->
<script>
    var $imageupload = $('.imageupload');
    $imageupload.imageupload();
</script>
<!-- /image viewing script-->

</body>
</html>
<?php
}
else{
    header('Location:../../../');
}
}else{
    header('Location:../../../views/user/home');
}
?>

